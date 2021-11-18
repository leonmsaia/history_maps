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

	public function registerUserAction() {
		if ($this->ion_auth->logged_in()) {
			redirect('Home','refresh');
		}else{
			$regName = $_POST['first_name'];
			$regLastname = $_POST['last_name'];
			$regMail = $_POST['email'];
			$regPass = $_POST['password'];
			$additional_data = array(
				'first_name' => $regName,
				'last_name' => $regLastname,
				'username' => $regMail
			);
			$group = array('2');
			$this->ion_auth->register($regMail, $regPass, $regMail, $additional_data, $group);
			redirect('user/login', 'refresh');
		}
	}

	// User Profile Configurations

	public function user_configuration() {
		if ($this->ion_auth->logged_in()) {
			// Initials Vars

			// Models Loading


			// Classes Init

			// Template Information
			$data['layout'] = 'general';
			$data['page'] = 'User/configuration';

			// User Activity Information
			$user_id = getMyID();
			$this->load->model('User_model');
			$data['user_information'] = $this->User_model->get_complete_user_by_id($user_id);

			// Page Information
			$data['title'] = 'Ver Mapa';

			// Data for Rendering

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home', 'refresh');
		}
	}

	public function user_profile_save_common()
	{
			if ($this->ion_auth->logged_in()) {
					// Prepare Values
					$user_id = getMyID();
					$username = $_POST['username_val'];
					$first_name = $_POST['first_name_val'];
					$last_name = $_POST['last_name_val'];
					$birth_date = $_POST['birth_val'];
					$company = $_POST['company_val'];
					$bio = $_POST['bio_val'];
					$email = $_POST['email_val'];
					$phone = $_POST['phone_val'];
					$twitter = $_POST['twitter_val'];
					$linkedin = $_POST['linkedin_val'];
					$academia = $_POST['academia_val'];

					// Prepare Array 1
					$dataCommon = array(
						'username' => $username,
						'first_name' => $first_name,
						'last_name' => $last_name,
						'birth' => $birth_date,
						'email' => $email,
						'phone' => $phone
					);

					// Insert Data
					$this->db->where('id', $user_id);
					$this->db->update('users', $dataCommon);

					// Prepare Array 2
					$dataAssoc = array(
						'user_data_associated_bio' => $bio,
						'user_data_associated_twitter' => $twitter,
						'user_data_associated_linkedin' => $linkedin,
						'user_data_associated_academia' => $academia,
						'user_data_associated_company' => $company
					);

					// Insert Data
					$this->db->where('user_data_associated_user_id', $user_id);
					$this->db->update('user_data_associated', $dataAssoc);

					// Redirect
					redirect('user/config','refresh');
			}
	}

	public function user_profile($username) {
		if ($this->ion_auth->logged_in()) {
			// Initials Vars

			// Models Loading


			// Classes Init

			// Template Information
			$data['layout'] = 'general';
			$data['page'] = 'User/profile';

			// User Activity Information
			$user_id = getMyID();
			$this->load->model('User_model');
			$this->load->model('Map_model');
			$data['user_information'] = $this->User_model->get_user_by_username($username);
			$author_id = getUserIDByUsername($username);

			$data['all_projects_list'] = $this->Map_model->	get_all_projects_by_author($author_id);

			// Page Information
			$data['title'] = 'Ver Mapa';

			// Data for Rendering

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home', 'refresh');
		}
	}

	public function user_projects() {
		if ($this->ion_auth->logged_in()) {
			// Initials Vars

			// Models Loading


			// Classes Init

			// Template Information
			$data['layout'] = 'general';
			$data['page'] = 'User/my_projects';

			// User Activity Information
			$user_id = getMyID();
			$this->load->model('User_model');
			$this->load->model('Map_model');

			$username = getUsernameByUserID($user_id);
			$data['user_information'] = $this->User_model->get_user_by_username($username);

			$data['all_projects_list'] = $this->Map_model->	get_all_projects_by_author($user_id);

			// Page Information
			$data['title'] = 'Ver Mapa';

			// Data for Rendering

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home', 'refresh');
		}
	}

}
