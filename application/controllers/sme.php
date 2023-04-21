<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sme extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->library('table');
	}

	public function index()
	{
		$header_data = array(
			"title" => "SME Login",
			"previous_page_title" => "register",
			"previous_page_link" => "/smart-counties-r-us/index.php/main/register"
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_login');
		$this->load->view('footer');
	}

	public function login()
	{
		$this->index();
	}

	public function register()
	{
		$header_data = array(
			"title" => "SME Register",
			"previous_page_title" => "Login",
			"previous_page_link" => "/smart-counties-r-us/index.php/main/login"
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_register');
		$this->load->view('footer');
	}

	public function dashboard()
	{
		$header_data = array(
			"title" => "SME Dashboard"
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_dashboard');
		$this->load->view('footer');
	}

	public function add_product() 
	{
		$header_data = array(
			"title" => "SME Add Product",
			"previous_page_title" => "Dashboard",
			"previous_page_link" => "/smart-counties-r-us/index.php/sme/dashboard"
		);

		$this->load->view('header', $header_data);
		$this->load->view('sme_add_product');
		$this->load->view('footer');
	}
}
