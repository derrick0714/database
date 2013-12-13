<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Picture extends CI_Controller {

	public function id( $pid, $bid )
	{

		is_user_login($this);

		//iffriends

		//get picture info
		$sql = "select * from Picture where pid = ".$pid;
		$result = $this->db->query($sql);

		//commnet
		$sql = "select * from user, Comment where user.uid = Comment.uid and Comment.pid ='".$pid."' and Comment.bid='".$bid."' order by timestamp desc";
		$commnet_result = $this->db->query($sql);

		$data['title']= 'Pinterest | Picture';
		$data['result'] = $result->result_array()[0];
		$data['bid'] = $bid;
		$data['commnet_result']= $commnet_result;

		load_template($this,'picture',$data);
	}



}