<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );


class Designation extends CI_Controller
 {
    public function __construct(){
        parent::__construct();
        $this->load->model('Designation_model');
    }
    public function index()
 {
        $query = $this->db->query( 'SELECT * FROM `designation`' );
        $data[ 'result' ] = $query->result_array();
        $this->load->view( 'view_designation', $data );

    }


    public function add_designation()
    {
        $this->load->model('Department_model');
      $this->load->model('Designation_model');
      $data['departments'] = $this->Department_model->get_departments();
      $data['designations'] = $this->Designation_model->get_designations();
      
        // $query = $this->db->query( 'SELECT * FROM `department`' );
        // $data['result']= $query->result_array();
           $this->load->view( 'add_designation',$data);
       }
   
       public function insert()
       {
              $dept_name = $_POST[ 'department' ];
              $desg_name = $_POST[ 'designation' ];
              $query = $this->db->query( "INSERT INTO `designation`(`department_name`,`designation_name`)
                   VALUES ('$dept_name','$desg_name')" );
              if ( $query ) {
                  $this->session->set_flashdata( 'inserted', 'yes' );
                  redirect( 'designation' );
              } else {
                  $this->session->set_flashdata( 'inserted', 'no' );
                  redirect( 'designation' );
              }
      
          }

          public function edit($id)
          {
             $data['data'] = $this->Designation_model->find_record_by_id($id);
             $this->load->model('Department_model');
             $this->load->model('Designation_model');
             $data['departments'] = $this->Department_model->get_departments();
             $data['designations'] = $this->Designation_model->get_designations();
             $this->load->view('edit_designation', $data);
          }
          public function update($id){
          {
             $data1 = array(
               "department_name" => $this->input->post('department'),
                       "designation_name" => $this->input->post('designation_name')
             );
            $this->Designation_model->update($data1, $id);
       
             redirect(base_url('index.php/designation'));
          }

        }

    public function deletedesg()
 {
        print_r( $_POST );

        $delete_id = $_POST[ 'delete_id' ];
        $query = $this->db->query( "DELETE FROM `designation` WHERE  `id`='$delete_id'" );
        if ( $query ) {
            echo 'deleted';
        } else {
            echo 'notdeleted';
        }
    }

    // public function active_status_user($id){
    //     if($status == '1') {
    //               $data = array('status' => '0');
    //               $this->db->where('id', $id);
    //               $result = $this->db->update('designation',$data);
    //               redirect('designation');
    //           } else {
    //               $data = array('status' => '1');
    //               $this->db->where('id',$id);
    //               $result = $this->db->update('designation',$data);
    //               redirect('designation');
    //           }
    //         }
    public function active_status_user($id){
        if(isset($_GET['id'])){
          $data = array('status' => '1');
          $id = $_GET['id'];
          $this->db->where('id', $id);
          $result = $this->db->update('designation',$data);
          // $sql = "UPDATE `designation` SET `status=1 WHERE id='$id'";
          // if($sql){
            redirect('designation');
          }
        else{
          $data = array('status' => '0');
          $this->db->where('id', $id);
          $result = $this->db->update('designation',$data);
          // $sql = "UPDATE `designation` SET `status=1 WHERE id='$id'";
          // if($sql){
            redirect('designation');
          }
        }


        public function deactive_status_user($id){
          if(isset($_GET['id'])){
            $data = array('status' => '0');
            $id = $_GET['id'];
            $this->db->where('id', $id);
            $result = $this->db->update('designation',$data);
            // $sql = "UPDATE `designation` SET `status=1 WHERE id='$id'";
            // if($sql){
              redirect('designation');
            }
          else{
            $data = array('status' => '1');
            $this->db->where('id', $id);
            $result = $this->db->update('designation',$data);
            // $sql = "UPDATE `designation` SET `status=1 WHERE id='$id'";
            // if($sql){
              redirect('designation');
            }
          }
      }
          

?>