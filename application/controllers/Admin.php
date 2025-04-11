<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('validate');
    }

    public function index()
    {
        if (verifyadmin()) {

            $data['view'] = 'admin/dashboard';
            $data['title'] = 'Admin Dashboard';
            $today_date = date('Y-m-d 00:00:00');
            
            $data['total_users'] = $this->UserModel->countTotalUsers();
            $data['new_users'] = $this->UserModel->countNewUsers($today_date);

            $data['total_items'] = $this->ProductModel->countTotalItems();
            $data['new_items'] = $this->ProductModel->countNewItems($today_date);

            $this->load->view('main', $data);
        } else {

            set_toast_message('error', 'Please Login');
            $this->load->view('auth/login');
        }
    }

    // -----------------------------------  U S E R  -- O N L Y  -----------------------------------

    public function getAllUser()
    {

        if (verifyadmin()) {

            $data['users'] = $this->UserModel->getAllUsers();

            $data['view'] = 'admin/User_Management/get_all_users';
            $data['title'] = 'Admin | Users';
            $this->load->view('main', $data);
        } else {

            set_toast_message('error', 'Please Login');
            $this->load->view('auth/login');
        }
    }

    public function createNewUser()
    {
        if (verifyadmin()) {
            $data['view'] = 'admin/User_Management/create_new_user';
            $data['title'] = 'New User';
            $this->load->view('main', $data);
        } else {

            set_toast_message('error', 'Please Login');
            $this->load->view('auth/login');
        }
    }

    public function createNewUserAuth()
    {
        if (verifyadmin()) {
            //Validate Form
            $this->form_validation->set_rules('fname', 'Full Name', 'required|max_length[50]');
            $this->form_validation->set_rules('username', 'Username', 'required|alpha_dash');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|exact_length[10]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[20]');

            if ($this->form_validation->run()) {

                // Validate Email
                $email = $this->input->post('email');

                if ($this->UserModel->getUserByEmail($email)) {

                    print_r($this->UserModel->getUserByEmail($email));
                    set_toast_message('error', 'Email already exist');
                    redirect(base_url('index.php/admin/createNewUser'), array());
                } else {

                    //Validate Phone
                    $phone = $this->input->post('phone');

                    if ($this->UserModel->getUserByPhone($phone)) {

                        set_toast_message('error', 'Phone number already in use');
                        redirect(base_url('index.php/admin/createNewUser'));
                    } else {

                        //Validate Username
                        $username = $this->input->post('username');

                        if ($this->UserModel->getUserByUsername($username)) {
                            set_toast_message('error', 'Username not available.');
                            redirect(base_url('index.php/admin/createNewUser'));
                        } else {

                            $values = array(
                                'fname' => $this->input->post('fname'),
                                'email' => $this->input->post('email'),
                                'phone' => $this->input->post('phone'),
                                'username' => $this->input->post('username'),
                                'role' => 'user',
                                'e_key' => $this->encryption->encrypt($this->input->post('password')),
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s')
                            );
                            //  --Add User --
                            if ($this->UserModel->addUser($values)) {
                                set_toast_message('success', 'User Created Successfully!');
                            } else {
                                set_toast_message('error', "Failed to create new User");
                            }
                            redirect(base_url('index.php/admin/createNewUser'));
                        }
                    }
                }
            } else {
                set_toast_message('error', 'Please enter valid inputs');
                redirect(base_url('index.php/admin/createNewUser'));
            }
        } else {

            set_toast_message('error', 'Invalid action, please login');
            $this->load->view('auth/login');
        }
    }

    public function editUser($id)
    {
        if (verifyadmin()) {
            $data['view'] = 'admin/User_Management/user_edit_form';
            $data['title'] = 'Admin | User Update';
            $data['user'] = $this->UserModel->getUserById($id);
            $this->load->view('main', $data);
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }

    public function editUserAuth($id)
    {
        if (verifyadmin()) {

            $user = $this->UserModel->getUserById($id);
            if ($user) {
                //Validate Inputs

                $values = [];
                if (!empty($this->input->post('fname'))) {
                    $this->form_validation->set_rules('fname', 'Full Name', 'required|max_length[50]');
                    if ($this->form_validation->run()) {
                        $values['fname'] = $this->input->post('fname');
                    }
                }
                if (!empty($this->input->post('email'))) {
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                    if ($this->form_validation->run()) {
                        $values['email'] = $this->input->post('email');
                    }
                }
                if (!empty($this->input->post('phone'))) {
                    $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|exact_length[10]');
                    if ($this->form_validation->run()) {
                        $values['phone'] = $this->input->post('phone');
                    }
                }
                if (!empty($this->input->post('username'))) {
                    $this->form_validation->set_rules('username', 'Username', 'required|alpha_dash');
                    if ($this->form_validation->run()) {
                        $values['username'] = $this->input->post('username');
                    }
                }
                $values['updated_at'] = date('Y-m-d H:i:s');

                // Update Details
                if ($this->UserModel->updateUserById($id, $values)) {
                    set_toast_message('success', 'User Details updated successfully');
                    redirect(base_url('index.php/admin/getAllUser'));
                } else {
                    set_toast_message('error', 'Internal Error, Updatioon Failed');
                    redirect(base_url('index.php/admin/getAllUser'));
                }
            } else {
                set_toast_message('error', 'User does not exist');
                redirect(base_url('index.php/auth/login'));
            }
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }

    public function deleteUser($id)
    {
        if (verifyadmin()) {
            if ($this->UserModel->deleteUserById($id)) {
                set_toast_message('success', 'User deleted successfully');
            } else {
                set_toast_message('error', 'Unable to delete user');
            }
            redirect(base_url('index.php/admin/getAllUser'));
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }
    // ------------------------ P R O D U C T -- O N L Y ----------------------------------------

    public function getAllProducts()
    {
        if (verifyadmin()) {

            $data['items'] = $this->ProductModel->getAllProducts();
            $data['view'] = 'admin/Product_Management/get_all_products';
            $data['title'] = 'Admin | Products';
            $this->load->view('main', $data);
        } else {

            set_toast_message('error', 'Please Login');
            $this->load->view('auth/login');
        }
    }
    public function registerProduct()
    {
        if (verifyadmin()) {
            $data['view'] = 'admin/Product_Management/add_new_product';
            $data['title'] = 'Admin | Register Product';
            $this->load->view('main', $data);
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }

    public function registerProductAuth()
    {
        if (verifyadmin()) {
            // Validate Details
            $this->form_validation->set_rules('item_name', 'Item Name', 'required|max_length[50]');
            $this->form_validation->set_rules('item_price', 'Item Price', 'required|numeric');
            $this->form_validation->set_rules('item_desc', 'Item Description', 'required|min_length[20]|max_length[200]');
            $this->form_validation->set_rules('item_quantity', 'Item Quantity', 'required|numeric');

            if ($this->form_validation->run()) {

                $values = array(
                    'name' => $this->input->post('item_name'),
                    'price' => $this->input->post('item_price'),
                    'desc' => $this->input->post('item_desc'),
                    'quantity' => $this->input->post('item_quantity'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );

                if ($this->ProductModel->addItem($values)) {

                    set_toast_message('success', 'Item added successfully');
                    redirect(base_url('index.php/admin/registerProduct'));
                } else {

                    set_toast_message('error', 'Internal Error, try after some time');
                    redirect(base_url('index.php/admin/registerProduct'));
                }
            } else {
                set_toast_message('error', 'Enter valid inputs only');
                redirect(base_url('index.php/admin/registerProduct'));
            }
        } else {

            set_toast_message('error', 'Please Login');
            redirect(base_url('index.php/auth/login/index'));
        }
    }

    public function editItem($pid)
    {
        if (verifyadmin()) {
            $data['view'] = 'admin/Product_Management/product_edit_form';
            $data['title'] = 'Admin | Product Update';
            $data['item'] = $this->ProductModel->getItemById($pid);
            $this->load->view('main', $data);
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }

    public function editItemAuth($pid)
    {
        if (verifyadmin()) {

            $item = $this->ProductModel->getItemById($pid);

            if ($item) {
                //Validate Inputs
                $this->form_validation->set_rules('item_name', 'Product Name', 'required|max_length[50]');
                $this->form_validation->set_rules('item_desc', 'Product Description', 'required|max_length[300]');
                $this->form_validation->set_rules('item_price', 'Product Price', 'required|numeric');
                $this->form_validation->set_rules('item_quantity', 'Product Quantity', 'required|numeric');

                $values = [];
                if (!empty($this->input->post('item_name'))) {
                    $values['name'] = $this->input->post('item_name');
                }
                if (!empty($this->input->post('item_price'))) {
                    $values['price'] = $this->input->post('item_price');
                }
                if (!empty($this->input->post('item_quantity'))) {
                    $values['quantity'] = $this->input->post('item_quantity');
                }
                if (!empty($this->input->post('item_desc'))) {
                    $values['desc'] = $this->input->post('item_desc');
                }
                $values['updated_at'] = date('Y-m-d H:i:s');

                // Update Details
                if ($this->ProductModel->updateItem($pid, $values)) {
                    set_toast_message('success', 'Product Details updated successfully');
                    redirect(base_url('index.php/admin/getAllProducts'));
                } else {
                    set_toast_message('error', 'Internal Error, Updatioon Failed');
                    redirect(base_url('index.php/admin/getAllProducts'));
                }
            } else {
                set_toast_message('error', 'Item does not exist');
                redirect(base_url('index.php/auth/login'));
            }
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }



    public function logout()
    {
        if ($this->session->userdata('logged_in')) {

            $this->session->sess_destroy();
        } else {

            set_toast_message('error', 'Login First');
        }
        redirect(base_url('index.php/login'));
    }

    public function deleteItem($pid)
    {
        if (verifyadmin()) {
            if ($this->ProductModel->deleteItemById($pid)) {
                set_toast_message('success', 'Item deleted successfully');
            } else {
                set_toast_message('error', 'Unable to delete item');
            }
            redirect(base_url('index.php/admin/getAllProducts'));
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }

    // ----------------------------------------C A R T -- O N L Y ---------------------------------

    public function viewCart($id)
    {
        if (verifyadmin()) {
            $data['view'] = 'admin/Cart_Management/view_cart';
            $data['title'] = 'Admin | Cart';
            $data['items'] = $this->Add2CartModel->getCartItemsById($id);
            $data['user'] = $this->UserModel->getUserById($id);

            $this->load->view('main', $data);
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }

    public function getAllUserCart()
    {
        if (verifyadmin()) {
            $data['view'] = 'admin/Cart_Management/get_all_userCart';
            $data['title'] = 'Admin | User-Cart';
            $data['users'] = $this->Add2CartModel->getAllUserCart();
            $this->load->view('main', $data);
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }

    public function deleteCartItemById($uid, $pid)
    {
        if (verifyadmin()) {
            if ($this->UserModel->getUserById($uid)) {
                if ($this->Add2CartModel->deleteCartItem($uid, $pid)) {
                    set_toast_message('success', 'Item Removed Successfully');
                    redirect(base_url('index.php/admin/viewCart/' . $uid));
                } else {
                    set_toast_message('error', 'Internal error, try after some time');
                    redirect(base_url('index.php/admin/viewCart/' . $uid));
                }
            } else {
                set_toast_message('error', 'User does not exist');
                redirect(base_url('index.php/admin/viewCart/' . $uid));
            }
        } else {
            set_toast_message('error', 'Invalid action');
            redirect(base_url('index.php/auth/login'));
        }
    }
}
