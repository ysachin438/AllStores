<?php 
class Logout extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
    }
    public function index() {
        if($this->session->userdata('logged_in')){

            if (session_status() == PHP_SESSION_ACTIVE) {
                $this->session->sess_destroy(); // Destroy the session
            }
        }
        redirect(base_url('index.php/auth/login/index'));
    }
}
?>