<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Resident extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('table');
		$this->load->library('session');
		$this->load->model('ResidentModel');
		$this->load->helper("auth_helper");

	}

	public function index()
	{
		$header_data = array(
			"title" => "Resident Login",
			"previous_page_title" => "register",
			"previous_page_link" => base_url("index.php/resident/register")
		);

		$this->load->view('header', $header_data);
		$this->load->view('resident_login');
		$this->load->view('footer');
	}

	public function login()
	{
		$this->index();
	}

	public function register()
	{
		$header_data = array(
			"title" => "Resident Register",
			"previous_page_title" => "Login",
			"previous_page_link" => base_url("index.php/resident/login")
		);

		$this->load->view('header', $header_data);
		$this->load->view('resident_register');
		$this->load->view('footer');
	}

	public function dashboard()
	{
		// $this->check_if_is_allowed();

		$header_data = array(
			"title" => "Resident Dashboard"
		);

		$this->load->view('header', $header_data);
		$this->load->view('resident_dashboard');
		$this->load->view('footer');
	}

	public function vote($product_id) {
		$resident_id = $this->session->userdata('resident_id');
		$vote = $this->input->post('vote');
	
		$this->ResidentModel->vote($resident_id, $product_id, $vote);
	
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function products() {
		$header_data = array(
			"title" => "SME Products",
			"previous_page_title" => "Dashboard",
			"previous_page_link" => base_url("index.php/resident/dashboard")
		);
	
		$products = $this->SmeModel->all_products_for_this_sme();
	
		$this->load->view('header', $header_data);
		$this->load->view('sme_products', array('products' => $products));
		$this->load->view('footer');
	}
	



	///////////////////////////////////////////////////////////////////////
	// Methods for handling form submissions
	///////////////////////////////////////////////////////////////////////
	
	public function handle_login() {
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		// echo $username . " - " . $password;

		if ( ! $this->SmeModel->authenticate_login($username, $password)) {
			$this->session->set_flashdata('error', 'Invalid Credentials !!!');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			redirect(base_url("index.php/resident/dashboard"));
		}
	}

	

	///////////////////////////////////////////////////////////////////////
	// Private helper methods
	///////////////////////////////////////////////////////////////////////
	

	/**
	 * this private method is meant to be used inside of this
	 * controller only. It validates the user's role via AuthHelper
	 * if not valid, then this method redirects to login page for sme.
	 */
	private function check_if_is_allowed() {
		$current_role = $this->session->userdata("role");

		if (AuthHelper::is_allowed($current_role, "resident")) {
			return true;
		} else {
			redirect(base_url("index.php/resident/login"));	
		}
	}
}
