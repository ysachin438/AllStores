<?php
class ProductController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('ProductModel', 'UserModel'));
        $this->load->helper('validate');
    }
    public function index($pid)
    {
        if (verifyadmin()) {

            $data['item'] = $this->ProductModel->getItemById($pid);
            $this->load->view('product/editItem', $data);

        } else {

            $this->session->set_flashdata('error', 'Please login first');
            redirect(base_url('index.php/login'));
        }
    }
    public function getItem($pid)
    {
        if (verifyadmin()) {

            $item = $this->ProductModel->getItemById($pid);
            $this->load->view('showItem', $item);
        } else {

            $this->session->set_flashdata('error', 'Please login first');
            redirect(base_url('index.php/login'));
        }
    }

    public function getAllItem()
    {
        if ($this->validate->verifyadmin()) {

            $item = $this->ProductModel->getItems();
            $this->load->view('showItem', $item);
        } else {

            $this->session->set_flashdata('error', 'Please login first');
        }
    }
    public function addItem()
    {
        if (verifyadmin()) {
            // Validate Details
            $this->form_validation->set_rules('item_name', 'Item Name', 'required|max_length[50]');
            $this->form_validation->set_rules('item_price', 'Item Price', 'required|numeric');
            $this->form_validation->set_rules('item_desc', 'Item Description', 'required|min_length[20]|max_length[200]');
            $this->form_validation->set_rules('item_quantity', 'Item Quantity', 'required|numeric|is_natural');

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

                    $this->session->set_flashdata('success', 'Item added successfully');
                    redirect(base_url('index.php/admin'));
                } else {

                    $this->session->set_flashdata('error', 'Internal Error, try after some time');
                    redirect(base_url('index.php/admin'));
                }
            } else {

                $this->load->view('product/addItem');
            }
        } else {

            $this->session->set_flashdata('error', 'Please Login');
            $this->load->view('login');
        }
    }
    public function editItem($pid)
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
                    $this->session->set_flashdata('success', 'Product Details updated successfully');
                    redirect(base_url('index.php/admin'));
                } else {
                    $this->session->set_flashdata('error', 'Internal Error, Updatioon Failed');
                    redirect(base_url('index.php/admin'));
                }
            } else {

                $this->session->set_flashdata('error', 'Item does not exist');
                redirect(base_url('index.php/login'));
            }
        } else {
            $this->session->set_flashdata('error', 'Please login first');
        }
    }


    public function deleteItem($pid)
    {
        if (verifyadmin()) {

            $item = $this->ProductModel->getItemById($pid);

            if ($item) {

                if ($this->ProductModel->deleteItemById($pid)) {

                    $this->session->set_flashdata('success', 'Product removed successfully');
                    redirect(base_url('index.php/login'));

                } else {

                    $this->session->set_flashdata('error', 'Internal Server errror');
                    redirect(base_url('index.php/login'));
                }

            } else {

                $this->session->set_flashdata('error', 'Item does not exist');
                redirect(base_url('index.php/login'));
            }

        } else {

            $this->session->set_flashdata('error', 'Please login first');
        }
    }
}
