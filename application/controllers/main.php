<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
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

}
