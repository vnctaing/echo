<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controlleur pour les echos
*/
class Echos extends CI_Controller
{
  public function index(){
    $this->create();
  }

  public function create(){
    $this->load->view('echos/new');
    $this->load->library(array('form_validation', 'encrypt'));
    $this->form_validation->set_rules('echo', 'Echo', 'trim|required|xss_clean');
    if($this->form_validation->run()){
      $this->load->model('echo_model'); // Charge le modèle /model/echo_model.php
      $key = $this->encrypt->encode(uniqid());
      $data = array(
        'echo' => $this->input->post('echo'), // L'input qui vient de la vue
      );
      $this->echo_model->add_echo($data);// Call the add method from the echo_model model with $data as a parameter

    }
  }

  public function read($key){
    $this->load->model('echo_model');
  }

  public function update(){

  }

  public function delete(){

  }
}

