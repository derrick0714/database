<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Board extends CI_Controller {

	public function create()
	{
		is_user_login($this);

		$name = $this->input->post('Name');
		$desc = $this->input->post('Desc');
		if($this->input->post('Public')=="on")
			$public = 1;
		else
			$public= 0;


		$sql = "INSERT INTO  Board (`bname` ,`bdesc` ,`uid` ,`public`) VALUES ('".$name ."',  '".$desc."',  ".$GLOBALS['USER']['id'].",  ".$public.")";
		$result = $this->db->query($sql);

		redirect(base_url().'user/id', 'refresh');
	}
	public function id( $bid = NULL )
	{
		is_user_login($this);


		$sql = "select * from Board where bid = ".$bid;
		$board_result = $this->db->query($sql);

		$sql = "select * from Picture Pic, Pin P Where P.pid = Pic.pid and P.bid = ".$bid." order by timestamp desc";
		$pin_result = $this->db->query($sql);

		//if it is isself
		$uid = $board_result->result_array()[0]['uid'];
		$isself = false;
		$isfellow = false;

		if( $uid == $GLOBALS['USER']['id'] )
		{
			$isself = true;
		}
		else
		{
			$isself = false;
			//if fellow this board
			$sql = "select * from FellowStream FS, Stream S where FS.sid = S.sid and S.uid = '".$GLOBALS['USER']['id']."' and FS.bid='".$bid."'";
			$result_if_fellow=$this->db->query($sql);
			if($result_if_fellow->num_rows() >0)
				$isfellow = true;
		}

		//get like count
		$sql = "select count(*) as num,pid from `Like` where bid = '".$bid."' group by pid";
		$like_result = $this->db->query($sql);
		foreach ($like_result->result() as $row)
		{
			$data['like'][$row->pid] = $row->num;
		}
		
		//get owner
		$sql = "select * from `user` where uid = ".$uid;
		$owner_result = $this->db->query($sql);
		$data['onwer'] = $owner_result->result();



		$data['title']= 'Pinterest | Board';
		$data['user'] = $GLOBALS['USER'];
		$data['isself'] = $isself;
		$data['board'] = $board_result->result_array()[0];
		$data['pin_result'] = $pin_result;
		$data['isfellow'] = $isfellow;

		load_template($this,'board',$data);
	}

	public function show_modify( $bid )
	{
		$sql = "select * from Board where bid = ".$bid." order by timestamp desc";
		$board_result = $this->db->query($sql);

		$data['result'] = $board_result->result_array()[0];

		$this->load->view('board_modify', $data);
	}

	public function modify( $bid )
	{

		$name = $this->input->post('Name');
		$desc = $this->input->post('Desc');
		$public = $this->input->post('Public');
		if($public == 'on')
			$public = true;
		else
			$public =false;

		$sql ="UPDATE `Board` SET  `bname` =  '".$name."', `bdesc` = '".$desc."', `public` =  '".$public."' WHERE `bid` =".$bid;
		$this->db->query($sql);

		//redriect to user page 
		redirect(base_url().'user/id', 'refresh');
	}

	public function delete( $bid )
	{
		$last_name = $this->input->post('LastName');
		$first_name = $this->input->post('FirstName');
		$email = $this->input->post('Email');
		$password = $this->input->post('Password');
		$sql = $sql = "delete from Board where bid = '".$bid."'";
		$this->db->query($sql);
		//redriect to user page 
		redirect(base_url().'user/id', 'refresh');
	}
}



/* End of file Singup.php */
/* Location: ./application/controllers/Singup.php */