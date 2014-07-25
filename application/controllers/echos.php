<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controlleur pour les echos
*/
class Echos extends CI_Controller
{
  public function index(){
    $this->create();
  }

  // Methode qui permet de creer un echo
  public function create(){
    $this->load->view('echos/new');
    $this->load->library(array('form_validation', 'encrypt'));
    $this->form_validation->set_rules('content', 'Contenu', 'trim|required|xss_clean');
    if($this->form_validation->run()){
      // Charge le modèle /model/echo_model.php
      $this->load->model('echo_model');
      // On génere un id qui est hashé à l'écho
      $key = md5(uniqid());
      $data = array(
        'content' => $this->input->post('content'), // L'input qui vient de la vue
        'gkey' => $key);
      /** Appelle la methode add_echo de Echo_model
      en passant en parametre le tableau $data **/
      if($this->echo_model->add_echo($data)){
        // Si il réussit, la méthode add_echo retournera un booléen
        $this->session->set_flashdata('add_success',
          'Pour accéder à votre écho :
          <a href="' .base_url(). 'echos/read/'.$key.'">'
          .base_url().'echos/read/'.$key.
          '</a>');
        redirect('echos/create');
      }
    }
  }


  public function read($key){
    // Si on rentre pas de troisieme segment avec la méthod read, on redirige vers new
    if( ! $this->uri->segment(3)){
      redirect('echos/new');
    }

    //Sinon, on retrouve un echo avec la cle passe en parametre.
    else{
      $this->load->model('echo_model');
      //Pour simplifier, key est
      $key = $this->uri->segment(3);
      $data['echo'] = $this->echo_model->get_echo($key);
      //Les informations retournees par le modele sont transmises a la vue
      $this->load->view('echos/show', $data);
    }
  }

  public function update(){

  }

  public function delete(){

  }
}

