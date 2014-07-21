<?php
/**
*
*/
class Model_users extends CI_Model
{
  public function can_log_in(){
    $this->db->where('email', $this->input->post('email'));
    $this->db->where('password', md5($this->input->post('password')));
    $query = $this->db->get('users');
    return ($query->num_rows() == 1);
  }

  public function is_key_valid($key){
    $this->db->where('gkey', $key);
    $query = $this->db->get('users');
    return($query->num_rows() == 1);
  }

  public function add_user($data){
    $query = $this->input->insert('users', $data);
  }

  public function activate_user($id){
      $data = array(
          'activate_user' => 1;
        );
      $did_activate_user = $this->db->update('users', $data, array('id')=> $id);
    if($did_activate_user){
      return $data['email'];
    }
    else{
      return false;
    }
  }
}
