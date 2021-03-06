<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){      
	    parent::__construct();
  	}

	public function index()
	{
		$this->load->view('partials/navbar');
		$this->load->view('welcome_message');
	}

	public function expired(){
		$this->load->model('echo_model');
		$key = $this->uri->segment(1);
		if ( $data['echo'] = $this->echo_model->getEcho($key)){
			$this->load->view('partials/navbar');
			$this->load->view('echos/show', $data);
		}
		else{
			$this->load->view('welcome/404_error');
		}
	}

	public function cgu(){
		$this->load->view('partials/navbar');
		$this->load->view('welcome/CGU');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */