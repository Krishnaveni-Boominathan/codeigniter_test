<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
//cannot access any class directly by main path

class Dashboard extends CI_Controller
 {
    public function index()
 {

        $this->load->view( 'department' );

    }
}
?>