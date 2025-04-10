<?php
class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('auth/register');
    }

    public function signup_auth()
    {
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

                $this->session->set_flashdata('error', 'Email already exist');
                redirect(base_url('index.php/signup'), array());
            } else {

                //Validate Phone
                $phone = $this->input->post('phone');

                if ($this->UserModel->getUserByPhone($phone)) {

                    $this->session->set_flashdata('error', 'Phone number already in use');
                    redirect(base_url('index.php/signup'));
                } else {

                    //Validate Username
                    $username = $this->input->post('username');

                    if ($this->UserModel->getUserByUsername($username)) {
                        $this->session->set_flashdata('error', 'Username not available.');
                        redirect(base_url('index.php/signup'));
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

                            $this->session->set_flashdata('success', 'Account Creation is successful');
                            redirect(base_url('index.php/auth/login/index'));
                        } else {

                            $this->session->set_flashdata('error', 'Internal Sever Error, please try after some time');
                            redirect(base_url('index.php/auth/register/index'));
                        }
                    }
                }
            }
        } else {
            $this->load->view('auth/register');
        }
    }
}
