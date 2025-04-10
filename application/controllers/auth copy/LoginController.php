<?php
class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
            $this->load->view('login');
        }
    }

    public function login()
    {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload login view with errors
            $this->load->view('login');
        } else {
            // Get input values
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $userrole = $this->input->post('userrole');

            // Check if user exists
            $userId = $this->UserModel->getUserByUsername($username);
            if (isset($userId) && $userId->uid) {
                if ($this->UserModel->matchUser($userId->uid, $password)) {
                    // Create a session
                    if ($userrole == $userId->role) {
                        $data = array(
                            'id' => $userId->uid,
                            'username' => $username,
                            'userrole' => $userrole,
                            'logged_in' => TRUE
                        );
                        $this->session->set_userdata($data);

                        if ($userrole == 'admin') {
                            redirect(base_url('index.php/admin'));
                        } else {
                            redirect(base_url('index.php/user'));
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Invalid user');
                            redirect(base_url('index.php/login'));
                        }
                } else {
                    // Invalid password
                    $this->session->set_flashdata('error', 'Invalid Password');
                    $this->load->view('login');
                }
            } else {
                // User not found
                $this->session->set_flashdata('error', 'User Not Found  ');
                $this->load->view('login');
            }
        }
    }
}
