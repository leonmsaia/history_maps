<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MapView extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index() {
		// Initials Vars

		// Models Loading
		$this->load->model('Map_model');

		// Classes Init
		$data['projects_data'] = $this->Map_model->get_all_projects_list();

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'ViewMap/allProjects';

		// User Activity Information
		if ($this->ion_auth->logged_in()) {
			$user_id = getMyID();
			$this->load->model('User_model');
			$data['user_information'] = $this->User_model->get_user_by_id($user_id);
		}

		// Page Information
		$data['title'] = 'Listado de Proyectos';

		// Data for Rendering

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function project($project_code) {

		// Initials Vars
		$selected_project = $project_code;
		$selected_map_id = 1;

		// Models Loading
		$this->load->model('Map_model');

		// Classes Init
		$data['map_project_data'] = $this->Map_model->get_map_project_class_by_code($selected_project);
		$data['map_unit_list_data'] = $this->Map_model->get_map_unit_list_class($selected_map_id);
		$data['map_unit_list_assets_poi'] = $this->Map_model->get_map_assets_poi_by_map_id($selected_map_id);
		$data['map_unit_list_assets_components'] = $this->Map_model->get_map_assets_components_by_map_id($selected_map_id);
		$data['map_author_data'] = $this->Map_model->get_map_author_by_project_code($project_code);


		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'ViewMap/viewmap';

		// User Activity Information
		if ($this->ion_auth->logged_in()) {
			$user_id = getMyID();
			$this->load->model('User_model');
			$data['user_information'] = $this->User_model->get_user_by_id($user_id);
		}

		// Page Information
		$data['title'] = 'Ver Mapa';

		// Data for Rendering

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function projectEdit($project_code) {
		if ($this->ion_auth->logged_in()) {

				// Initials Vars
				$selected_project = $project_code;
				$selected_map_id = 1;

				// Models Loading
				$this->load->model('Map_model');

				// Classes Init
				$data['map_project_data'] = $this->Map_model->get_map_project_class_by_code($selected_project);
				$data['map_unit_list_data'] = $this->Map_model->get_map_unit_list_class($selected_map_id);
				$data['map_unit_list_assets_poi'] = $this->Map_model->get_map_assets_poi_by_map_id($selected_map_id);
				$data['map_author_data'] = $this->Map_model->get_map_author_by_project_code($selected_map_id);

				// Template Information
				$data['layout'] = 'basic';
				$data['page'] = 'ViewMap/editmap';

				// User Activity Information

					$user_id = getMyID();
					$this->load->model('User_model');
					$data['user_information'] = $this->User_model->get_user_by_id($user_id);



				// Page Information
				$data['title'] = 'Editar Mapa';

				// Data for Rendering
				$this->load->view('layout/' . $data['layout'], $data);

		}
	}

	public function savenewpoi() {

		// Sanitization of Variables
		$project_code = '';
		$map_assets_poi_map_id = '';
		$map_assets_poi_title = '';
		$map_assets_poi_txt = '';
		$map_assets_poi_lat = '';
		$map_assets_poi_lng = '';
		$map_assets_poi_ico = '';
		$map_assets_poi_youtube = '';
		$map_assets_poi_download_path = '';
		$map_assets_poi_status = '';

		// Get Data from Form
		if (!empty($_POST['project_code'])) {
			$project_code = $_POST['project_code'];
		}
		if (!empty($_POST['map_assets_poi_title'])) {
			$map_assets_poi_title = $_POST['map_assets_poi_title'];
		}
		if (!empty($_POST['map_assets_poi_txt'])) {
			$map_assets_poi_txt = $_POST['map_assets_poi_txt'];
		}
		if (!empty($_POST['map_assets_poi_map_id'])) {
			$map_assets_poi_map_id = $_POST['map_assets_poi_map_id'];
		}
		if (!empty($_POST['map_assets_poi_lat'])) {
			$map_assets_poi_lat = $_POST['map_assets_poi_lat'];
		}
		if (!empty($_POST['map_assets_poi_lng'])) {
			$map_assets_poi_lng = $_POST['map_assets_poi_lng'];
		}
		if (!empty($_POST['map_assets_poi_ico'])) {
			$map_assets_poi_ico = $_POST['map_assets_poi_ico'];
		}
		if (!empty($_POST['map_assets_poi_youtube'])) {
			$map_assets_poi_youtube = $_POST['map_assets_poi_youtube'];
		}
		if (!empty($_POST['map_assets_poi_download_path'])) {
			$map_assets_poi_download_path = $_POST['map_assets_poi_download_path'];
		}
		if (!empty($_POST['map_assets_poi_status'])) {
			$map_assets_poi_status = 1;
		}

		// Prepare Data Collection
		$dataAdvance = array(
			'map_assets_poi_map_id' => $map_assets_poi_map_id,
			'map_assets_poi_title' => $map_assets_poi_title,
			'map_assets_poi_txt' => $map_assets_poi_txt,
			'map_assets_poi_lat' => $map_assets_poi_lat,
			'map_assets_poi_lng' => $map_assets_poi_lng,
			'map_assets_poi_ico' => $map_assets_poi_ico,
			'map_assets_poi_youtube' => $map_assets_poi_youtube,
			'map_assets_poi_download_path' => $map_assets_poi_download_path,
			'map_assets_poi_status' => $map_assets_poi_status
		);

		// Insert Data
		$this->db->insert('map_assets_poi', $dataAdvance);

		redirect('/project/' . $project_code . '/action/edit');
	}

	public function saveeditpoi() {

		$poi_id = $_POST['map_assets_poi_id'];
		$project_code = $_POST['project_code'];

		// Sanitization of Variables
		$map_assets_poi_title = '';
		$map_assets_poi_txt = '';
		$map_assets_poi_lat = '';
		$map_assets_poi_lng = '';
		$map_assets_poi_ico = '';
		$map_assets_poi_youtube = '';
		$map_assets_poi_download_path = '';
		$map_assets_poi_status = '';

		// Get Data from Form
		if (!empty($_POST['map_assets_poi_title'])) {
			$map_assets_poi_title = $_POST['map_assets_poi_title'];
		}
		if (!empty($_POST['map_assets_poi_txt'])) {
			$map_assets_poi_txt = $_POST['map_assets_poi_txt'];
		}
		if (!empty($_POST['map_assets_poi_lat'])) {
			$map_assets_poi_lat = $_POST['map_assets_poi_lat'];
		}
		if (!empty($_POST['map_assets_poi_lng'])) {
			$map_assets_poi_lng = $_POST['map_assets_poi_lng'];
		}
		if (!empty($_POST['map_assets_poi_ico'])) {
			$map_assets_poi_ico = $_POST['map_assets_poi_ico'];
		}
		if (!empty($_POST['map_assets_poi_youtube'])) {
			$map_assets_poi_youtube = $_POST['map_assets_poi_youtube'];
		}
		if (!empty($_POST['map_assets_poi_download_path'])) {
			$map_assets_poi_download_path = $_POST['map_assets_poi_download_path'];
		}
		if (!empty($_POST['map_assets_poi_status'])) {
			$map_assets_poi_status = 1;
		}

		// Prepare Data Collection
		$dataAdvance = array(
			'map_assets_poi_title' => $map_assets_poi_title,
			'map_assets_poi_txt' => $map_assets_poi_txt,
			'map_assets_poi_lat' => $map_assets_poi_lat,
			'map_assets_poi_lng' => $map_assets_poi_lng,
			'map_assets_poi_ico' => $map_assets_poi_ico,
			'map_assets_poi_youtube' => $map_assets_poi_youtube,
			'map_assets_poi_download_path' => $map_assets_poi_download_path,
			'map_assets_poi_status' => $map_assets_poi_status
		);

		// Insert Data
		$this->db->where('map_assets_poi_id', $poi_id);
		$this->db->update('map_assets_poi', $dataAdvance);

		redirect('/project/' . $project_code . '/action/edit');
	}

	public function deletepoi() {
		$poi_id = $_POST['map_assets_poi_id'];
		$project_code = $_POST['project_code'];
		$status_deleted = 3;

		// Prepare Data Collection
		$dataAdvance = array(
			'map_assets_poi_status' => $status_deleted
		);

		// Insert Data
		$this->db->where('map_assets_poi_id', $poi_id);
		$this->db->delete('map_assets_poi');

		redirect('/project/' . $project_code . '/action/edit');
	}

}
