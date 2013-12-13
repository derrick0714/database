<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fellow extends CI_Controller {
	//fellow bid
	public function add(){
		$bid = $this->input->post('bid');
		$sid = $this->input->post('sid');
		//insert into fellowstream table

		$sql = "INSERT INTO `FellowStream` (`sid`, `bid`) VALUES ('".$sid ."', '".$bid."')";
		$this->db->query($sql);
		redirect(base_url().'board/id/'.$bid, 'refresh');
	}

	//show fellow board
	public function fellow_board($bid)
	{
		is_user_login($this);


		//look at stream info 
		$sql = "select * from Stream where uid=".$GLOBALS['USER']['id'];
		$stream_result = $this->db->query($sql);
		$data['stream_result'] = $stream_result;

		$data['bid'] = $bid;

		$this->load->view('stream_fellow', $data);
	}

	public function delete($bid, $sid)
	{
		is_user_login($this);

		$sql = "delete from FellowStream where bid='".$bid."' and sid='".$sid."'" ;
		$this->db->query($sql);

		redirect(base_url().'stream/id/'.$sid, 'refresh');
	}

}