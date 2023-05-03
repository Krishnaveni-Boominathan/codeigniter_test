<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
//cannot access any class directly by main path

class ViewController extends CI_Controller
 {
    public function index()
 {

        $query = $this->db->query( 'SELECT * FROM `employee` WHERE `status`=1' );
        $data[ 'employees' ] = $query->result_array();
        $this->load->view( 'list', $data );

    }

}
?>