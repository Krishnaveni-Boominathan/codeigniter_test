<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
//cannot access any class directly by main path

class LoginController extends CI_Controller
 {
    public function index()
 {

        $this->load->view( 'login_view' );
    }

    public function login_post()
 {
        print_r( $_POST );
        if ( isset( $_POST ) ) {
            // $data = array(
            $username = $_POST[ 'username' ];
            $password = $_POST[ 'password' ];
            $query = $this->db->query( "SELECT * FROM administrator WHERE username='$username' AND password='$password'" );
            if ( $query->num_rows() ) {
                $result = $query->result_array();
                // print_r( $result );
                die();
                $this->session->set_userdata( 'id', $result[ 0 ][ 'id' ] );
                redirect( 'Dashboard' );
            } else {
                $this->session->set_flashdata( 'error', 'Invalid credentiald' );
                redirect( 'logincontroller' );
            }
            // );
        } else {
            die( 'Invalid input' );
        }

        // $this->EmpModel->insert( $data );

        // redirect( base_url( 'index.php/empcontroller' ) );
    }

    public function logout()
 {
        session_destroy();
        redirect( 'logincontroller' );
    }
}
?>