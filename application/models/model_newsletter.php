<?php
/**
*
*/
class Model_newsletter extends CI_Model
{
  public function add_newsletter_users(){
    $data = array(
      'email' => $this->input->post('email')
       );
    $query = $this->db->insert('newsletter_users',$data);

    if($query){
      return true;
    }
    else{
      return false;
    }
  }
}

 ?>