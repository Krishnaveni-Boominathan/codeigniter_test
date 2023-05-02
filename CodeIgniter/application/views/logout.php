<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout extends CI_Controller
{
    //Function for logout
    public function index()
    {
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        return redirect('logincontroller');
    }
}
?>