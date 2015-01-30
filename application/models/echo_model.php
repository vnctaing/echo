<?php

class Echo_model extends CI_Model{

  //The parameter is passed from the function echos/create containing
  public function add_echo($data){
    return $this->db->insert('echos', $data); 
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

  public function deleteExpiratedPosts(){
    $this->db->where('expires_at >', now() );
    $this->db->delete('echos');
  }

  public function isEncrypted($key){
    $query = $this->db
        ->where('gkey', $key)
        ->where('encryptOpt',1)
        ->get('echos')
        ->result();
    if($query){return true;}
    else{return false;}
  }

  public function isSecretKeyValid($key,$inputkey){
    $query = $this->db
      ->where('secretkey', $inputkey)
      ->where('gkey', $key)
      ->get('echos')
      ->result();
      if($query){return true;}
      else{return false;}

  }
  public function addResonneur($ip){
    $this->db->set('ip_adress',$ip );
    $this->db->insert('resonneurs');
  }

  public function addResonneurEcho($key,$ip){
    $this->db->set('ip_adress',$ip );
    $this->db->set('gkey',$key );
    $this->db->insert('echos_resonneurs');
  }

  public function isIpUsed($key,$ip){
    $query = $this->db
      ->where('ip_adress', $ip)
      ->where('gkey', $key)
      ->get('echos_resonneurs')
      ->result();
      if($query){return true;}
      else{return false;}
  }

}