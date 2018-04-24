<?php
	/**
	 * 
	 */
	 class Auctions extends CI_Controller
	 {
	 	public function __construct()
	 	{
	 		parent::__construct();
	 		$this->load->model('auctions_model');
	 		$this->load->helper('url');

	 	}
	 	public function index()
	 	{
	 		if($this->session->userdata('logged_in'))
	 		{
	 		}
	 		else
	 		{
	 			$this->session->set_userdata('logged_in', 'false');
	 		}
	 		$data['auctions'] = $this->auctions_model->get_auctions();

	 		$this->load->view('templates/header');
	 		$this->load->view('templates/navbar');
	 		$this->load->view('templates/homepage/slider');
	 		$this->load->view('auction/index',$data);
	 		$this->load->view('templates/footer');
	 	}

	 	public function auctions($id)
	 	{
	 		$data['auctions'] = $this->auctions_model->get_auction($id);
	 		$this->load->view('templates/header');
	 		$this->load->view('templates/navbar');
	 		$this->load->view('auction/auctions', $data);
	 		$this->load->view('templates/footer');
	 	}

	 	public function register()
	 	{
	 		$this->load->helper('form');
	 		$this->load->library('form_validation');

	 		$name = $this->input->post('name');
	 		$username = $this->input->post('username');
	 		$password = $this->input->post('password');

	 		$this->form_validation->set_rules('registerName','Name', 'required');
	 		$this->form_validation->set_rules('registerUsername','Username', 'required');
	 		$this->form_validation->set_rules('registerPassword','Password', 'required');

	 		if($this->form_validation->run() === FALSE)
	 		{
	 			$this->load->view('templates/header');
	 			$this->load->view('auction/register');
	 		}
	 		else
	 		{
	 			if(!$this->auctions_model->register($name,$username,$password))
	 			{
	 				echo "Something went wrong";
	 			}
	 			else
	 			{
	 				$this->index();
	 			}
	 		}
	 	}

	 	public function login()
	 	{
	 		$username = $this->input->post('username');
	 		$password = $this->input->post('password');

 			if($this->auctions_model->login($username,$password) !== FALSE)
			{
				$result = $this->auctions_model->login($username,$password);

				$this->session->set_userdata('logged_in', 'true');
				$this->session->set_userdata('name', $result->name);
				$this->session->set_userdata('userID',$result->ID);
				$this->index();
			}
			else
			{
				$this->session->set_userdata('logged_in', 'false');
			}
	 	}

	 	public function logout()
	 	{
	 		unset($_SESSION['logged_in'],
	 				$_SESSION['name'],
	 				$_SESSION['userID']);
	 		$this->index();
	 	}

	 	public function create()
	 	{
	 		$title = $this->input->post('title');
	 		$description = $this->input->post('description');
	 		$startPrice = $this->input->post('startPrice');
	 		$reservePrice = $this->input->post('reservePrice');
	 		$duration = $this->input->post('duration');

 			$this->auctions_model->create($title,$description,$startPrice,$reservePrice,$duration);
	 	}
	 } 
?>