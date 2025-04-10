<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (! function_exists('verifyadmin')) {
    function verifyadmin(): bool
    {
        $CI = &get_instance();
        if ($CI->session->userdata('logged_in')) {

            $user = $CI->UserModel->getUserById($CI->session->userdata('id'));

            if ($user && $user->role == 'admin') {
                return true;
            } else {
                $CI->session->sess_destroy(); // Destroy the session
                $CI->session->set_flashdata('error', 'You do not have admin privileges.');
                return false;
            }
        } else {
            if (session_status() == PHP_SESSION_ACTIVE) {
            }
        }

        return false;
    }
}

if (! function_exists('verifyUser')) {
    function verifyUser(): bool
    {
        $CI = &get_instance();
        if ($CI->session->userdata('logged_in')) {

            $user = $CI->UserModel->getUserById($CI->session->userdata('id'));

            if ($user && $user->role == 'user') {
                return true;
            } else {
                $CI->session->set_flashdata('error', 'You do not have User privileges.');
                return false;
                $CI->load->view('auth/login');
            }
        } else {
            if (session_status() == PHP_SESSION_ACTIVE) {
                $CI->session->sess_destroy(); // Destroy the session
            }
        }

        return false;
    }
}
?>
