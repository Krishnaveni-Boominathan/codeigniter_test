<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
//cannot access any class directly by main path

class Payroll extends CI_Controller
 {
    public function index()
 {
        $query = $this->db->query( 'SELECT * FROM `department`' );
        $data[ 'result' ] = $query->result_array();
        $this->load->view( 'viewdept', $data );

    }

    public function add_department()
 {
        $this->load->view( 'add_department' );
    }
    

    public function do_insert()
 {
        $dept_name = $_POST[ 'dept_name' ];
        $query = $this->db->query( "INSERT INTO `department`(`department_name`)
             VALUES ('$dept_name')" );
        if ( $query ) {
            $this->session->set_flashdata( 'inserted', 'yes' );
            redirect( 'payroll' );
        } else {
            $this->session->set_flashdata( 'inserted', 'no' );
            redirect( 'payroll' );
        }

    }

    public function editdept( $id )
 {
        $query = $this->db->query( "SELECT `department_name` FROM `department` WHERE `id`='$id'" );
        $data[ 'result' ] = $query->result_array();
        $data[ 'id' ] = $id;
        $this->load->view( 'editdept', $data );

    }

    public function editdept_post()
 {

        $dept_name = $_POST[ 'dept_name' ];
        $id = $_POST[ 'id' ];
        $query = $this->db->query( "UPDATE `department` SET `department_name`='$dept_name' WHERE `id`='$id'" );
        if ( $query ) {
            $this->session->set_flashdata( 'updated', 'yes' );
            redirect( 'payroll' );
        } else {
            $this->session->set_flashdata( 'updated', 'no' );
            redirect( 'payroll' );
        }
    }

    public function deletedept()
 {
        print_r( $_POST );

        $delete_id = $_POST[ 'delete_id' ];
        $query = $this->db->query( "DELETE FROM `department` WHERE  `id`='$delete_id'" );
        if ( $query ) {
            echo 'deleted';
        } else {
            echo 'notdeleted';
        }
    }
    public function active_status_user($id){
        if(isset($_GET['id'])){
          $data = array('status' => '1');
          $id = $_GET['id'];
          $this->db->where('id', $id);
          $result = $this->db->update('department',$data);
          // $sql = "UPDATE `department` SET `status=1 WHERE id='$id'";
          // if($sql){
            redirect('payroll');
          }
        else{
          $data = array('status' => '0');
          $this->db->where('id', $id);
          $result = $this->db->update('department',$data);
          // $sql = "UPDATE `department` SET `status=1 WHERE id='$id'";
          // if($sql){
            redirect('payroll');
          }
        }
        public function deactive_status_user($id){
          if(isset($_GET['id'])){
            $data = array('status' => '0');
            $id = $_GET['id'];
            $this->db->where('id', $id);
            $result = $this->db->update('department',$data);
            // $sql = "UPDATE `department` SET `status=1 WHERE id='$id'";
            // if($sql){
              redirect('payroll');
            }
          else{
            $data = array('status' => '1');
            $this->db->where('id', $id);
            $result = $this->db->update('department',$data);
            // $sql = "UPDATE `department` SET `status=1 WHERE id='$id'";
            // if($sql){
              redirect('payroll');
            }
          }
}
?>