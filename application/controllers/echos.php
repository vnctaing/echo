<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controlleur pour les echos
*/
class Echos extends CI_Controller
{
  public function index(){
    $this->create();
  }

  // Methode qui permet de créer un echo
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
        'gkey' => $key,
        'expires_at' => date('Y-m-d H:i:s', time() + $this->input->post('expired_at') * 60)
        );
      /** Appelle la méthode add_echo de Echo_model
      en passant en paramètre le tableau $data **/
      if($this->echo_model->add_echo($data)){
        // Si il réussit, la méthode add_echo retournera un booléen
        $this->load->helper('url');
        /** anchor() permet de generer une balise HTML <a href></a>, elle prends deux paramètres :
        Le premier est l'adresse vers lequel il dirige
        Le deuxieme est ce qu'il y a entre <a></a>
        base_url() retourne la base de l'url : www.localhost.com/echos/read/$key
        **/
        $echo_url = anchor(base_url("/echos/read/$key") , base_url("echos/read/$key"));
        //$echo_url = <a href="http://site.com/echos/read/$key">http://site.com/echos/read/$key</a>"
        //Prépare la flash notice, qui apparait dans la vue echos/new
        $this->session->set_flashdata('add_success', $echo_url);
        redirect('echos/create');
      }
    }
  }

  //METHODE POUR ACCEDER AU CONTENU D'UN ECHO
  public function read($key){
    // Si on ne rentre pas de troisieme segment avec la méthod read, on redirige vers new
    if( ! $this->uri->segment(3)){
      redirect('echos/create');
    }
    //Sinon, on retrouve un echo avec la cle passe en parametre.
    else{
      $this->load->model('echo_model');
      //Pour simplifier, key est
      $key = $this->uri->segment(3);
      if($data['echo'] = $this->echo_model->getEcho($key)){
      //Les informations retournees par le modele sont transmises a la vue
        $this->load->view('echos/show', $data);
      }else{
        echo 'Echo inexistant';
      }
    }
  }


  //METHODE POUR RESONNER UN ECHO
  public function update($key){
    $this->load->model('echo_model');
    // Le modele retourne un tableau d'objets
    $data['echo'] = $this->echo_model->getEcho($key);
    // On stock dans $oldExpirationDate , l'ancienne date d'expiration en time UNIX
    // Car c'est plus facile a manipuler pour rajouter du temps
    $oldExpirationDate = strtotime($data['echo'][0]->expires_at);
    // Rajoute 15 minutes a la durée de vie, convertit time UNIX => date
    $newExpirationDate = date('Y-m-d H:i:s', $oldExpirationDate + 15*60);
    $data = array(
      'expires_at' => $newExpirationDate,
    );
    if($this->echo_model->updateLifetime($key,$data)){
    $this->session->set_flashdata('echo_success', 'Durée de vie allongée de 15 min ! ');
    redirect("echos/read/$key");
    }else{
      echo 'fail';
    }
  }


}

