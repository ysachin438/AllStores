<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if (verifyadmin()) {
            $data['view'] = 'admin/dashboard';
            $data['title'] = 'Admin | Dashboard';
            $today_date = date('Y-m-d 0:0:0');
            
            $data['total_users'] = $this->UserModel->countTotalUsers();
            $data['new_users'] = $this->UserModel->countNewUsers($today_date);
            
            $data['total_items'] = $this->ProductModel->countTotalItems();
            $data['new_items'] = $this->ProductModel->countNewItems($today_date);

            $this->load->view('main', $data);
        } else {
            $this->load->view('auth/login');;
        }
    }

    public function login_auth()
    {
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload login view with errors
            $this->load->view('auth/login');
        } else {
            // Get input values
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Check if user exists
            $user = $this->UserModel->getUserByEmail($email);
            if (isset($user) && $user->uid) {
                if ($this->UserModel->matchUser($user->uid, $password)) {
                    // Create a session
                    $data = array(
                        'id' => $user->uid,
                        'email' => $email,
                        'userrole' => $user->role,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);

                    $this->session->set_flashdata('success', "Login Successful...");

                    if ($user->role === 'admin') {
                        redirect(base_url('index.php/admin/index'));
                    } else {
                        redirect(base_url('index.php/auth/login/index'));
                    }
                } else {
                    // Invalid password
                    $this->session->set_flashdata('error', 'Invalid Password');
                    redirect(base_url('index.php/auth/login/index'));
                }
            } else {
                // User not found
                $this->session->set_flashdata('error', 'User Not Found  ');
                redirect(base_url('index.php/auth/login/index'));
            }
        }
    }
}
