<?php
/**
*
*/
class Preview extends CI_controller
{

public function index(){
  $this->load->helper('html');
  $this->load->view('/preview/preview');
}

public function email_validation(){
  $this->load->library('form_validation');// Charge la librairie pour fixer les regles des formulaires
  $this->form_validation->set_rules('email', 'Adresse E-mail', 'trim|required|valid_email|xss_clean|is_unique[newsletter_users.email]');

  if ($this->form_validation->run()){
    $this->load->model('model_newsletter');
    if ($this->model_newsletter->add_newsletter_users()){
      echo "Vous serez informé par e-mail du lancement d'Echo !";
    }
  }
}



}

 ?>