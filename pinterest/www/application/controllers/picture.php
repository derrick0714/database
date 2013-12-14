<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Picture extends CI_Controller {

	public function id( $pid, $bid )
	{

		is_user_login($this);

		
		//get picture info
		$sql = "select * from Picture where pid = ".$pid;
		$result = $this->db->query($sql);

		//get board info
		$sql = "select * from Board where bid = ".$bid;
		$bresult = $this->db->query($sql);
		$data['public'] = $bresult->result_array()[0]['public'];
		//commnet
		$sql = "select * from user, Comment where user.uid = Comment.uid and Comment.pid ='".$pid."' and Comment.bid='".$bid."' order by timestamp desc";
		$commnet_result = $this->db->query($sql);

		//iffriends
		//friend
		$data['friend'] = false;
		$sql= "select * from FriendShip F, Board where F.following_id=".$GLOBALS['USER']['id']." and F.follower_id = Board.uid and Board.bid=".$bid." and status= '1'";
		$friend_result =$this->db->query($sql);
		if($friend_result->num_rows())
		{
			$data['friend'] = true;
		}


		$data['title']= 'Pinterest | Picture';
		$data['result'] = $result->result_array()[0];
		$data['bid'] = $bid;
		$data['commnet_result']= $commnet_result;

		load_template($this,'picture',$data);
	}



}