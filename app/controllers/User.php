<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function login() {

		// Template Information
		$data['layout'] = 'special_blank';
		$data['page'] = 'User/login';

		// Page Information
		$data['title'] = 'Iniciar Sesion';

		// Data for Rendering

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function register() {

		// Template Information
		$data['layout'] = 'special_blank';
		$data['page'] = 'User/register';

		// Page Information
		$data['title'] = 'Registrarse';

		// Data for Rendering

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function forget() {

		// Template Information
		$data['layout'] = 'special_blank';
		$data['page'] = 'User/forget';

		// Page Information
		$data['title'] = 'Recuperar Contraseña';

		// Data for Rendering

		$this->load->view('layout/' . $data['layout'], $data);
	}

	// Actions for Users
	public function loginAction(){
		$identity = $_POST['logmail'];
		$password = $_POST['logpass'];
		if(isset($_POST['logrem'])){
		  $remember = 1;
		}else{
		  $remember = 0;
		}
		$this->ion_auth->login($identity, $password, $remember);
		if ($this->ion_auth->login($identity, $password, $remember)){
			redirect('Home','refresh');
		}else{
			redirect('User/login','refresh');
		}
	}

	public function logUserOut() {
		if ($this->ion_auth->logged_in()) {
			$this->ion_auth->logout();
			redirect('Home','refresh');
		}else{
			redirect('Home','refresh');
		}
	}

}
