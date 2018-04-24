<?php
	 class Auctions_model extends CI_Model
	 {
	 	
	 	public function __construct()
	 	{
	 		$this->load->library('session');
	 		$this->load->database();
	 	}

	 	public function get_auctions()
	 	{
	 		$query = $this->db->get('auction');
	 		return $query->result_array();
	 	}

	 	public function get_auction($id)
	 	{
	 		if(!is_null($id))
	 		{
	 			$query = $this->db->get_where('auction',array('ID' => $id));
	 			return $query->row_array();
	 		}
	 	}

	 	public function register()
	 	{
	 		$this->load->helper('url');

	 		$name = url_title($this->input->post('registerName'),'dash', TRUE);
	 		$username = url_title($this->input->post('registerUsername'),'dash', TRUE);
	 		$password = url_title($this->input->post('registerPassword'),'dash', TRUE);

	 		$data = array('name' => $name, 
	 			'username' => $username,
	 			'password' => $password);

	 		return $this->db->insert('user',$data);
	 	}

	 	public function login($lgusarname,$lgpass)
	 	{ 
	 		$this->load->helper('url');
	 		log_message('error',"Im in model login");
	 		$name = url_title($lgusarname,'dash',TRUE);
	 		$password = url_title($lgpass,'dash',TRUE);

	 		$query =  $this->db->query("SELECT * FROM `user` WHERE `username` = '$name' AND `password` = '$password'");
	 		$row = $query->row();
	 		if(isset($row))
	 		{
	 			return $row;
	 		}
	 		else
	 		{
	 			return false;
	 		}
	 	}

	 	public function create($title,$description,$startPrice,$reservePrice,$duration)
	 	{
	 		$today = date("Y-m-d");
	 		log_message('error',$title);
	 		log_message('error',$today);
	 		$data = array('title' => $title,
	 						'userID' => $_SESSION['userID'],
	 						'img' => '/waitasecond/assets/images/maglia.png',
	 						'description' => $description,
	 						'startPrice' => $startPrice,
	 						'reservePrice' => $reservePrice,
	 						'current' => date('Y-m-d',strtotime($today)),
	 						'duration' => date('Y-m-d',strtotime($duration)));
	 		log_message('error',date('Y-m-d',strtotime($duration)));
	 		return $this->db->insert('auction', $data);
	 	}
	 } 
?>