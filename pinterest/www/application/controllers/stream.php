<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stream extends CI_Controller {

	public function show_create(){
		is_user_login($this);


		$this->load->view('stream_create');
	}
	public function create(){
		is_user_login($this);

		$name = $this->input->post('Name');
		$desc = $this->input->post('Desc');


		$sql = "INSERT INTO  Stream (`sname` ,`sdesc` ,`uid` ) VALUES ('".$name ."',  '".$desc."',  ".$GLOBALS['USER']['id'].")";
		$result = $this->db->query($sql);

		redirect(base_url().'stream', 'refresh');
	}

	public function index(){

		is_user_login($this);

		$sql = "select * from Stream where uid = ".$GLOBALS['USER']['id']." order by timestamp desc";
		$stream_result = $this->db->query($sql);

		$sql = "select * from user where uid = ".$GLOBALS['USER']['id'];
		$result = $this->db->query($sql);
		$data['user'] = $result->result_array()[0];

		$data['title']= 'Pinterest | Stream';
		$data['stream_query'] = $stream_result;


		load_template($this,'stream',$data);
	}

	public function id($sid){

		is_user_login($this);

		$sql = "select * from Stream where sid = ".$sid;
		$stream_result = $this->db->query($sql);


		$sql = "select * from user u, Board B, FellowStream F Where u.uid = B.uid and B.bid = F.bid and F.sid = ".$sid." order by F.timestamp desc";
		$data['fellow_reslut'] = $this->db->query($sql);

		
		//get owner
		$sql = "select * from `user` where uid = ".$GLOBALS['USER']['id'];
		$owner_result = $this->db->query($sql);
		$data['onwer'] = $owner_result->result();

		$data['title']= 'Pinterest | Stream';
		$data['user'] = $GLOBALS['USER'];

		$data['stream'] = $stream_result->result_array()[0];


		load_template($this,'stream_detail',$data);
	}





}
?>
