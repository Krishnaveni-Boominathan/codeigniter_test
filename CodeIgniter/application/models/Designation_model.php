<?php
class Designation_model extends CI_Model {
public function get_designations() {
    
        $query = $this->db->get('designation');
        return $query->result();
    }
 public function update($data1,$id){
    $result = $this->db->update('designation', $data1, array('id' => $id));
    //$result = $this->db->where('id', $id)->update('designation',$data);
    return $result;
}

public function find_record_by_id($id){
    $result = $this->db->get_where('designation', ['id' => $id])->row();
    return $result;
}
}


    // public function getDesignation($postData) {
    //     $response = array();
    //     $this->db->select('id,designation_name');
    //     $this->db->where('department_name', $postData['department_name']);
    //     $q = $this->db->get('designation');
    //     $response = $q->result_array();
    
    //     return $response;
    //     // $this->db->where('department_name', $department);
    //     // $query = $this->db->get('designation');  
    //     // return $query->result();
    //  }
?>
