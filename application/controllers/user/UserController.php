<?php
class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (verifyUser()) {

            $data['user'] = $this->UserModel->getUserById($this->session->userdata('userId'));
            $data['items'] = $this->ProductModel->getAllProducts();
            $this->load->view('dashboard/user', $data);
            $this->load->view('products/availableproducts');
        } else {

            $this->session->set_flashdata('error', 'Please login first');
            redirect(base_url('index.php/login'));
        }
    }

    public function getUser($uid)
    {
        if (verifyUser()) {

            $item = $this->UserModel->getUserById($uid);
            $this->load->view('showUser', $item);
        } else {

            $this->session->set_flashdata('error', 'Please login first');
            redirect(base_url('index.php/login'));
        }
    }

    public function add2cart($pid)
    {
        if (verifyUser()) {
            $uid = $this->session->userdata('userId');
            if ($this->Add2CartModel->addItem($uid, $pid)) {
                $this->session->set_flashdata('success', 'Added to cart Successfully');
            } else {
                $this->session->set_flashdata('error', 'Internal error, failed to add cart');
            }
            redirect(base_url('index.php/user'));
        }
    }
}
