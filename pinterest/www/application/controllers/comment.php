<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment extends CI_Controller {

	public function add($pid, $bid)
	{
		is_user_login($this);

		$commnet = $this->input->post('commnet');
		$sql= "INSERT INTO `Comment` (`uid`, `pid`, `bid`, `content`) VALUES ('".$GLOBALS['USER']['id']."', '".$pid."', '".$bid."', '".$commnet."')";
		$this->db->query($sql);
		redirect(base_url().'picture/id/'.$pid."/".$bid, 'refresh');
	}
}