<?php

class Echo_model extends CI_Model{

  //The parameter is passed from the function echos/create containing
  public function add_echo($data){
    $query = $this->db->insert('echos', $data);
    // Create a SQL request : INSERT TO `echos` (nom de la table)
    return $query;
  }

  /**Cette méthode retourne dans un tableau,
  un objet echo avec une cle en parametre
  **/
  public function get_echo($key){
    return $this->db
        ->where('gkey', $key)
        ->get('echos')
        ->result();
  }



}