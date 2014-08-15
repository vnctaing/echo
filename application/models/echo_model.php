<?php

class Echo_model extends CI_Model{

  //The parameter is passed from the function echos/create containing
  public function add_echo($data){
    $query = $this->db->insert('echos', $data);
    // Génère une requête SQL : INSERT TO `echos` (nom de la table)
    return $query;
  }

  /**Cette méthode retourne dans un tableau,
  un objet echo avec une cle en parametre
  **/
  public function getEcho($key){
    return $this->db
        ->where('gkey', $key)
        ->get('echos')
        ->result();
  }

  public function updateLifetime($key,$data){
    return $this->db
                ->where('gkey',$key)
                ->set('expires_at', $data['expires_at'])
                ->update('echos');
  }


  public function getExpirationDate($key){
    return $this->db->select('expires_at')
    ->where('gkey',$key)
    ->get('echos')
    ->result();
  }
}