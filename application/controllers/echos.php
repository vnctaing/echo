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
      // Charge /model/echo_model.php
      $this->load->model('echo_model');
      // Génere un unique id hashé à l'écho
      $key = substr( md5(uniqid()), 0, 7) ;
      $content = $this->input->post('content');
      //$secretkey = hash ( "sha256", $this->input->post('secretkey') );
      $data = array(
        'content' => $this->input->post('content'), //$_POST['content']
        'gkey' => $key,
        'expires_at' => date('Y-m-d H:i:s', time() + $this->input->post('expired_at') * 60)
        );
      if($this->input->post('encrypt') ){
        $this->load->library('encrypt');
        $data['encryptOpt'] = $this->input->post('encrypt');
        $data['content'] = $this->encrypt->encode($content);
        $data['secretkey'] = $secretkey;
      }
      /** Appelle la méthode add_echo de Echo_model
      en passant en paramètre le tableau $data **/
      if( $this->echo_model->add_echo($data) ) {
        // Si il réussit, la méthode add_echo retournera un booléen
        $this->load->helper('url');
        $cookieData = array(
          'hasVotedFor' => array("key"), 
        );
        $this->session->set_userdata($cookieData);
        /** anchor(foo,bar) <=> <a href="foo">bar</a>, 
        base_url("/echos/read/$key") <=> www.localhost.com/echos/read/$key
        **/
        $echo_url = anchor(base_url("/$key") , base_url("/$key"));
        $message = '<h2>Félicitation ! <br>Votre echo est créé</h2>';
        //$echo_url = <a href="http://site.com/echos/read/$key">http://site.com/echos/read/$key</a>"
        //Prépare la flash notice, qui apparait dans la vue echos/new
        $this->session->set_flashdata('add_success', $message);

        redirect("/$key");
      }
    }
  }

  //METHODE POUR ACCEDER AU CONTENU D'UN ECHO
  public function read($key){
    // Si on ne rentre pas de troisieme segment avec la méthod read, on redirige vers new
    if( ! $this->uri->segment(3)){
      redirect('echos/create');
    }
    else{
      $this->load->model('echo_model');
      $this->load->library('encrypt');
        //Stocke dans un tableau, l'echo retrouvé.
      if($data['echo'] = $this->echo_model->getEcho($key)){        
        redirect("/$key", $data);
      }
      else{
        redirect('views/welcome/404_error');
      }
    }
  }

//METHODE POUR DECHIFFRER UN ECHO
  public function decrypt($key){
    $this->load->model('echo_model');
    $data['echo'] = $this->echo_model->getEcho($key);
    $inputkey = hash ( "sha256", $this->input->post('secretkey') );
    if($this->echo_model->isSecretKeyValid($key, $inputkey)){
      $this->load->library('encrypt');
      $data['echo'][0]->content = $this->encrypt->decode($data['echo'][0]->content);
      $this->load->view('echos/show', $data);
    }
    else{
      $flash_message =  "Bien essayé mais la clé n'est pas valide";
      $this->session->set_flashdata('invalid_key', $flash_message);
      redirect ("/$key");
    }
  }


//METHODE POUR RESONNER UN ECHO
  public function update($key){
    if($this->session->userdata($key) == 1)
    {
      $message = "Il semblerait que vous ayiez déjà résonné cet echo";
      $this->session->set_flashdata('errorDoubleRez', $message);
      redirect("/$key");
    }
    else
    {
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
        $cookieData = array(
          $key => 1, 
        );
        $this->session->set_userdata($cookieData);

        /*
        array_push($cookieData['keyList'], $key);
        $this->session->set_userdata($cookieData);
        */
        $this->session->set_flashdata('echo_success', '+ 15 min');
        redirect("/$key");
      }else{
        
      }
    }
  }


}

