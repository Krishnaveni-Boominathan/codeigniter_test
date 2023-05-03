<?php

class Employee_model extends CI_Model {
    public function get_designations_by_department( $postData )
 {
        // $response = array();

        $this->db->select( 'id,designation_name' );
        $this->db->where( 'department_name', $postData[ 'department' ] );
        $query = $this->db->get( 'designation' );
        // $response = $q->result_array();

        // return $response;
        // $this->db->where( 'department', $department );
        // $query = $this->db->get( 'designation' );

        return $query->result();
    }

    public function insert( $data ) {
        $result = $this->db->insert( 'employee', $data );
        return $result;
    }

    public function update( $data1, $id ) {
        $result = $this->db->update( 'employee', $data1, array( 'id' => $id ) );
        //$result = $this->db->where( 'id', $id )->update( 'employee', $data );
        return $result;
    }

    public function delete( $id ) {
        $result = $this->db->delete( 'employee', [ 'id' => $id ] );
        return $result;
    }

    public function get_records() {
        $result = $this->db->get( 'employee' );
        return $result->result();
    }

    public function find_record_by_id( $id ) {
        $result = $this->db->get_where( 'employee', [ 'id' => $id ] )->row();
        return $result;
    }
}
?>