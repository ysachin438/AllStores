<?php 
class RegisterController extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->library('encryption');
        $config = array(
            'cipher' => 'aes-256',
            'mode'   => 'cbc',
            'key'    =>  hex2bin('7a4e0aabd6bd2d6b38a0c51245854576b9289fbbf20992eeafd7d778f0fafc2ae0a0954f2f7143dfd098db7f003c3c06cfd3b00fb9140f506f5c4ce1195fdb55'), // 256 bits
            'iv'     => '1234567890123456' // 16 bytes for AES-256
        );
        $this->encryption->initialize($config);
    }
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $user = $this->UserModel->getUserById($this->session->userdata('userId'));
            if ($user && $user->role == $this->session->userdata('userrole')) {
                redirect(base_url('index.php/' . $user->role));
            } else {
                $this->session->set_flashdata('error', 'Please Login');
                $this->load->view('login');
            }
        } else {
            $this->session->sess_destroy();
            $this->load->view('signup');
        }
    }

    public function signup()
    {
        //Validate Form
        $this->form_validation->set_rules('fname', 'Full Name', 'required|max_length[30]');
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_dash');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run()) {
            // Validate Email
            $email = $this->input->post('email');
            if ($this->UserModel->getUserByEmail($email)) {
                print_r($this->UserModel->getUserByEmail($email));
                die('Ended');
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
                            'role'=>$this->input->post('userrole'),
                            'e_key' => $this->encryption->encrypt($this->input->post('password')),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        //  --Add User --
                        if ($this->UserModel->addUser($values)) {
                            $this->session->set_flashdata('success', 'Account Creation is successful');
                            redirect(base_url('index.php/login'));
                        } else {
                            $this->session->set_flashdata('error', 'Internal Sever Error, please try after some time');
                            redirect(base_url('index.php/signup'));
                        }
                    }
                }
            }
        } else {
            $this->load->view('signup');
        }
    }
}
?>