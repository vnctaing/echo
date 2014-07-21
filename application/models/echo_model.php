<?php

class Echo_model extends CI_Model{

  //The parameter is passed from the function echos/create containing
  public function add_echo($data){
    $query = $this->db->insert('echos', $data);
    // Create a SQL request : INSERT TO `echos`
    return $query;
  }

  public function get_echo($key){
    $this->db->where('key',$key)
    $query = $this->db->get('echos');
    return($query->num_rows() == 1);
  }

}