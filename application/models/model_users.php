<?php
/**
*
*/
class Model_users extends CI_Model
{
  public function can_log_in(){
    $this->db->where('email', $this->input->post('email'));
    $this->db->where('active_user', 1);
    $this->db->where('password', $this->encrypt->sha1($this->input->post('password')));
    $query = $this->db->get('users');
    return ($query->num_rows() == 1);
  }

  public function is_key_valid($key){
    $this->db->where('keyhash', $key);
    $query = $this->db->get('users');
    return($query->num_rows() == 1);
  }

  public function add_user($data){
    $this->db->insert('users', $data);
  }

  public function activate_user($key){
      $data = array(
          'active_user' => 1
        );
      $did_activate_user = $this->db->update('users', $data, array('keyhash'=> $key));
    if($did_activate_user){
      return true;
    }
    else{
      return false;
    }
  }
}
