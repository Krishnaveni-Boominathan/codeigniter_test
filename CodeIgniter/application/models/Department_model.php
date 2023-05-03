<?php

class Department_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_departments() {
        $query = $this->db->get( 'department' );
        return $query->result();
    }

    public function get_records() {
        $result = $this->db->get( 'department' );
        return $result->result();
    }

    public function insert( $data ) {
        $result = $this->db->insert( 'department', $data );
        return $result;
    }
}
?>