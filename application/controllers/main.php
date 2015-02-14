<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Le controleur Main est le controleur qui s'occupe de l'inscription et de la connexion

class Main extends CI_Controller {
	// La methode index est appele par default
	public function __construct(){      
	    parent::__construct();
	    $this->load->view('partials/navbar');
  	}

	public function index()
	{
		$this->login();
	}

/*
| -------------------------------------------------------------------
| LOADING VIEWS
| -------------------------------------------------------------------
*/
	public function login(){
		$this->load->view('main/login');
	}

	public function signup(){
		$this->load->view('main/signup');
	}

	//Restricted page, reserved for registered users
	public function members(){
		if ($this->session->userdata('is_logged_in')){
			$this->load->model('echo_model');
			$user = $this->session->userdata('user');
			$data['echos'] = $this->echo_model->getUserEcho($user);
			$this->load->view('main/members',$data);
		}
		else{
			$this->restricted();
		}
	}

	public function restricted(){
		$this->load->view('main/restricted');
	}

/*
| -------------------------------------------------------------------
| LOGIN / SIGNUP
| -------------------------------------------------------------------
*/

	//L'email
	public function register_user($key){
		$this->load->model('model_users');
		//Si la clef rentrer dans l'url est valide alors, il peut se connecter
		if($this->model_users->is_key_valid($key)){
			if($this->model_users->activate_user($key)){
				$this->session->set_flashdata('confirmSignup', 'Votre compte a été activé, veuillez vous connecter.');
				redirect('main/login');
			}
			else{
				echo 'Clef inexistante';
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('main/login');
	}

	public function delete(){
		$this->load->model('model_users');
		$user = $this->session->userdata('user');
		$this->model_users->deleteUser($user);
		$this->logout();
	}
/*
| -------------------------------------------------------------------
| Validations
| -------------------------------------------------------------------
|
|	 Toutes les validations de connexion/inscription
*/
	public function login_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_users');
			$email = $this->input->post('email');
			$user = $this->model_users->getUserFromEmail($email);
			$user = $user[0]->name;
			$data = array(
				'email' => $email,
				'is_logged_in' => 1,
				'user' => $user
				);
			$this->session->set_userdata($data);
			$this->members('main/members',$data);
		}
		else{
			$this->load->view('main/login');
		}
	}

	//Valide une connexion ( est appele dans la methode login_validation )
	public function validate_credentials(){
		$this->load->model('model_users');
		$this->load->library('encrypt');
		if($this->model_users->can_log_in()){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			return false;
		}
	}

	public function signup_validation(){
		$this->load->library(array('form_validation', 'encrypt'));
		//Toutes les regles pour que le formulaire soit valide
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('cpassword', 'Mot de passe', 'trim|required|matches[password]');
		$this->form_validation->set_message('is_unique', "Cette adresse e-mail est déjà utilisée.");
		// Quand set_rules retournent des booleens true, alors run() retourne true 
		if($this->form_validation->run()){
			$key = md5(uniqid());
			//Contenu du mail
			$this->load->library('email');
			$this->load->model('model_users');
			$this->email->from('echo.teammmi@gmail.com', 'Echo');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Confirmer votre inscription.');
			$message = "<p> Bienvenue sur Echo !</p>";
			$message .= "<p><a href='".base_url()."main/register_user/$key'> Valider ici votre inscription</a>";
			$this->email->message($message);
			if($this->email->send()){
				//Les informations a inserer dans la bdd
				$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->encrypt->sha1($this->input->post('password')),
					'name' => $this->input->post('name'),
					'keyhash' => $key,
					'active_user' => 0
					);
				$this->model_users->add_user($data);
				//Prepare un message pour la confirmation de mail
				$this->session->set_flashdata('feedback', 'Un email a été envoyé');
				redirect('main/login');
			}
			else{
					echo 'Le mail a pas ete envoye';
				}
			}

		else{
			$this->load->view('main/signup');
			}
		}
	}
