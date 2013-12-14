<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller 
{
	public function show_modify()
	{
		is_user_login($this);

		$sql = "select * from user where uid = ".$GLOBALS['USER']['id'];
		$user_result = $this->db->query($sql);

		$data['result'] = $user_result->result_array()[0];

		$this->load->view('user_modify', $data);
	}

	public function modify()
	{
		is_user_login($this);

		$last_name = $this->input->post('last_name');
		$first_name = $this->input->post('first_name');

		$sql = "UPDATE  `user` SET  `first_name` =  '".$first_name."',`last_name` ='".$last_name."' WHERE  `user`.`uid` =".$GLOBALS['USER']['id'];
		$user_result = $this->db->query($sql);

		redirect(base_url().'user', 'refresh');

	}
}