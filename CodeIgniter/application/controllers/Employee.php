<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //cannot access any class directly by main path 
class Employee extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Employee_model');
    }
     public function index(){
        $query = $this->db->query( 'SELECT * FROM `employee`' );
        $data[ 'result' ] = $query->result_array();
       $this->load->view('view_employee',$data);
     }
     public function create(){
      $this->load->model('Department_model');
      $this->load->model('Designation_model');
      $data['departments'] = $this->Department_model->get_departments();
      $data['designations'] = $this->Designation_model->get_designations();
      
       $this->load->view('employee',$data);
        // $this->load->view('employee');
     }

     public function store(){
        $data = array(
            "employee_name" => $this->input->post('emp_name'),
            "salary" => $this->input->post('salary'),
            "date_of_joining" => $this->input->post('doj'),
            "department_name" => $this->input->post('department'),
            "designation_name" => $this->input->post('designation')
        );

        $this->Employee_model->insert($data);
       
        redirect(base_url('index.php/employee'));
     }
     public function edit($id)
   {
      $data['data'] = $this->Employee_model->find_record_by_id($id);
      $this->load->model('Department_model');
      $this->load->model('Designation_model');
      $data['departments'] = $this->Department_model->get_departments();
      $data['designations'] = $this->Designation_model->get_designations();
      
      $this->load->view('update_employee', $data);
   }
   public function update($id)
   {
      $data1 = array(
        "employee_name" => $this->input->post('emp_name'),
                "salary" => $this->input->post('salary'),
                "date_of_joining" => $this->input->post('doj'), 
                "department_name" => $this->input->post('department'),
                "designation_name" => $this->input->post('designation')
      );

      $this->Employee_model->update($data1, $id);

      redirect(base_url('index.php/employee'));
   }

    //  public function edit($id){
    //     $query = $this->db->query( "SELECT * FROM `employee` WHERE `id`='$id'" );
    //     $data[ 'data' ] = $query->result_array();
    //     $data[ 'id' ] = $id;
    //     // $this->load->view('update_employee',$data);
    //     // $data['data']=$this->Employee_model->find_record_by_id($id);
    //     $this->load->view('update_employee',$data);
    //  }
    //  public function update(){
    //     // $employee_name = $_POST['emp_name'];
    //     // $salary = $_POST['salary'];
    //     // $date_of_joining = $_POST['doj'];
    //     // $dept_name = $_POST[ 'department' ];
    //     // $desg_name = $_POST[ 'designation' ];
    //     //     $id = $_POST[ 'id' ];
    //     //     $query = $this->db->query( "UPDATE `employee` SET `employee_name`='$employee_name',`salary`='$salary',`date_of_joining`='$date_of_joining',`department_name`='$dept_name'AND `designation_name`='$desg_name' WHERE `id`='$id'" );
    //     //     if ( $query ) {
    //     //         $this->session->set_flashdata( 'updated', 'yes' );
    //     //         redirect( 'employee' );
    //     //     } else {
    //     //         $this->session->set_flashdata( 'updated', 'no' );
    //     //         redirect( 'employee' );
    //     //     }
    //     $data1 = array(
    //         "employee_name" => $this->input->post('emp_name'),
    //         "salary" => $this->input->post('salary'),
    //         "date_of_joining" => $this->input->post('doj'), "department_name" => $this->input->post('department'),
    //         "designation_name" => $this->input->post('designation')
    //     );

    //     $this->Employee_model->update($data1, $id);
       
    //     redirect(base_url('index.php/employee'));
    //  }
     public function delete()
 {
        print_r( $_POST );

        $delete_id = $_POST[ 'delete_id' ];
        $query = $this->db->query( "DELETE FROM `employee` WHERE  `id`='$delete_id'" );
        if ( $query ) {
            echo 'deleted';
        } else {
            echo 'notdeleted';
        }
    }
    //  public function active_status_user($id){
    //   if($status == '1') {
    //             $data = array('status' => '0');
    //             $this->db->where('id', $id);
    //             $result = $this->db->update('designation',$data);
    //             redirect('employee');
    //         } else {
    //             $data = array('status' => '1');
    //             $this->db->where('id',$id);
    //             $result = $this->db->update('designation',$data);
    //             redirect('employee');
    //         }
    //       }
    public function active_status_user($id){
        if(isset($_GET['id'])){
          $data = array('status' => '1');
          $id = $_GET['id'];
          $this->db->where('id', $id);
          $result = $this->db->update('employee',$data);
          // $sql = "UPDATE `employee` SET `status=1 WHERE id='$id'";
          // if($sql){
            redirect('employee');
          }
        else{
          $data = array('status' => '0');
          $this->db->where('id', $id);
          $result = $this->db->update('employee',$data);
          // $sql = "UPDATE `employee` SET `status=1 WHERE id='$id'";
          // if($sql){
            redirect('employee');
          }
        }
        public function deactive_status_user($id){
          if(isset($_GET['id'])){
            $data = array('status' => '0');
            $id = $_GET['id'];
            $this->db->where('id', $id);
            $result = $this->db->update('employee',$data);
            // $sql = "UPDATE `employee` SET `status=1 WHERE id='$id'";
            // if($sql){
              redirect('employee');
            }
          else{
            $data = array('status' => '1');
            $this->db->where('id', $id);
            $result = $this->db->update('employee',$data);
            // $sql = "UPDATE `employee` SET `status=1 WHERE id='$id'";
            // if($sql){
              redirect('employee');
            }
          }
     
          public function getdesignationsbydepartment(){
            $department_name = $_POST['department'];
            $response = array();
            if(isset($_POST['department'])){
              $query = $this->db->query( "SELECT * FROM `designation` WHERE  `department_name`='$department_name'");
              $response = $query->result_array();
              echo json_encode($response); 
           
            }
            // $postData = $this->input->post('department');

            // // load model 
            // $this->load->model('Employee_model');
            
            // // get data 
           // $data = $this->Employee_model->get_designations_by_department($postData);
           
          }      
}
?>