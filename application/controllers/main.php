<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// The main controller aims at managing actions in order to signup or signin in Echo

class Main extends CI_Controller {
	// This is the default method called when there is no method precised in the url
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
			$this->load->view('main/members');
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
	public function login_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		if ($this->form_validation->run()){
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => 1
				 );
			$this->session->set_userdata($data);
			redirect('main/members');
		}
		else{
			$this->load->view('main/login');
		}
	}

	//Method
	public function register_user($key){
		$this->load->model('model_users');
		//Verify the validiy of the key before validating the user
		if ($this->model_users->is_key_valid($key)){
			if($this->model_users->activate_user($id)){
				$data = array(
					'is_logged_in'=> 1 );
				$this->session->set_userdata($data);
				redirect('main/members');
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
/*
| -------------------------------------------------------------------
| Validations
| -------------------------------------------------------------------
|
|	 This is a callback from login validations
*/
	public function validate_credentials(){
		$this->load->model('model_users');
		if($this->model_users->can_log_in()){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			return false;
		}
	}

	public function signup_validation(){
		$this->load->library('form_validation');
		//Setting all rules for email,password fields in signup form
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('cpassword', 'Mot de passe', 'trim|required|matches[password]');
		$this->form_validation->set_message('is_unique', "Cette adresse e-mail est déjà utilisée.");
		// When all set_rules methods below return true, then the run method return true
		if($this->form_validation->run()){
			$key = md5(uniqid());
			//Creating the mail
			$this->load->library('email');
			$this->load->model('model_users');
			$this->email->from('echo.teammmi@gmail.com', 'Echo');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Confirmer votre inscription.');
			$message = "<p> Bienvenue sur Echo !</p>";
			$message .= "<p><a href='".base_url()."main/register_user/$key'> Valider ici votre inscription</a>";
			$this->email->message($message);
			if($this->email->send()){
				//Insert the user in the database
				$data = array(
					'email' => $this->input->post('name'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'gkey' => $key,
					'activate_user' => 0
					);
				$this->model_users->add_user($data);
				//Set a flash message for mail confirmation
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
