<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Council extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('table');
		$this->load->library('session');
		$this->load->model('CouncilModel');
		$this->load->helper("auth_helper");


	}

	public function index()
	{
		$header_data = array(
			"title" => "Council Login",
			"previous_page_title" => "register",
			"previous_page_link" => base_url("index.php/council/register")
		);

		$this->load->view('header', $header_data);
		$this->load->view('council_login');
		$this->load->view('footer');
	}

	public function login()
	{
		$this->index();
	}

	public function register()
	{
		$header_data = array(
			"title" => "Council Register",
			"previous_page_title" => "Login",
			"previous_page_link" => base_url("index.php/council/login")
		);

		$this->load->view('header', $header_data);
		$this->load->view('council_register');
		$this->load->view('footer');
	}

	public function dashboard()
	{
		// $this->check_if_is_allowed();

		$header_data = array(
			"title" => "Council Dashboard"
		);

		$this->load->view('header', $header_data);
		$this->load->view('council_dashboard');
		$this->load->view('footer');
	}

	public function products() {
		$header_data = array(
			"title" => "SME Products",
			"previous_page_title" => "Dashboard",
			"previous_page_link" => base_url("index.php/council/dashboard")
		);

		$products = $this->CouncilModel->get_all_products();

		$this->load->view('header', $header_data);
		$this->load->view('council_products', array("products" => $products));
		$this->load->view('footer');
	}

	public function edit_product($product_id = null) {

		$header_data = array(
			"title" => "Edit Product",
			"previous_page_title" => "Dashboard",
			"previous_page_link" => base_url("index.php/council/dashboard")
		);
	
		if ($product_id) {
			$product = $this->CouncilModel->get_product($product_id);
			if ($product) {
				$this->load->library('form_validation');
				$this->form_validation->set_rules('sme_name', 'SME Name', 'required');
	
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('header', $header_data);
					$this->load->view('edit_product', array('product' => $product));
					$this->load->view('footer');
				} else {
					$sme_name = $this->input->post('sme_name');
					if ($this->CouncilModel->edit_product($product_id, $sme_name)) {
						redirect(base_url("index.php/council/edit_product/$product_id"));
					} else {
						$this->session->set_flashdata('error', 'Failed to update SME name!!!');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}
			} else {
				show_404();
			}
		} else {
			$products = $this->CouncilModel->get_all_products();
			$this->load->view('header', $header_data);
			$this->load->view('council_products', array("products" => $products));
			$this->load->view('footer');
		}
	}
	
	
	
	///////////////////////////////////////////////////////////////////////
	// Methods for handling form submissions
	///////////////////////////////////////////////////////////////////////
	
	public function handle_login() {
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		// echo $username . " - " . $password;

		if ( ! $this->CouncilModel->authenticate_login($username, $password)) {
			$this->session->set_flashdata('error', 'Invalid Credentials !!!');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			redirect(base_url("index.php/council/dashboard"));
		}
	}

	public function handle_signup() {
		$name = $this->input->post("name");
		$password = $this->input->post("password");
		$area = $this->input->post("area");
	
		if ( ! $this->CouncilModel->signup($name,$password,$area)) {
			$this->session->set_flashdata('error', 'Local council already exists, try logging in!');
			redirect(base_url("index.php/council/login"));
		} else {
			redirect(base_url("index.php/council/dashboard"));
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

		if (AuthHelper::is_allowed($current_role, "council")) {
			return true;
		} else {
			redirect(base_url("index.php/council/login"));	
		}
	}
}
