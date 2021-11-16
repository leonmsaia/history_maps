<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index() {
		// Initials Vars

		// Models Loading
		$this->load->model('Map_model');

		// Classes Init
		$data['projects_data'] = $this->Map_model->get_all_projects_list();

		// User Activity Information
		if ($this->ion_auth->logged_in()) {
			$user_id = getMyID();
			$this->load->model('User_model');
			$data['user_information'] = $this->User_model->get_user_by_id($user_id);
		}

		// Template Information
		$data['layout'] = 'general';
		$data['page'] = 'General/MainSite';

		// Page Information
		$data['title'] = 'Listado de Proyectos';

		// Data for Rendering

		$this->load->view('layout/' . $data['layout'], $data);
	}




}
