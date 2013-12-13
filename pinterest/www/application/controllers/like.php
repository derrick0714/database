<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Like extends CI_Controller {

	public function add( $pid, $bid, $uid)
	{
		$sql = "select * from `Like` where uid ='".$uid."' and pid='".$pid."' and bid = '".$bid."'";
		$result = $this->db->query($sql);
		if($result->num_rows())
		{
			echo "<script> alert('You have already liked it picture in this board!');</script>";

		}
		else{
			$sql = "insert into `Like` (`uid`, `pid`, `bid`) VALUES ('".$uid."', '".$pid."', '".$bid."')";
			$result = $this->db->query($sql);
		}
		redirect(base_url().'board/id/'.$bid, 'refresh');
	}
}