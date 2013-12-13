<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Firend extends CI_Controller 
{
	public function request($from_id, $to_id)
	{
		is_user_login($this);
		$this->change_status($from_id, $to_id,0);

		redirect(base_url().'user/id/'.$to_id, 'refresh');
	}

	public function change_status($from_id, $to_id, $status)
	{
		$sql = "select * from FriendShip where follower_id=".$from_id." and following_id=".$to_id;
		
		$result = $this->db->query($sql);
		//exsits, then change
		if($result->num_rows() > 0 )
		{
			$sql="UPDATE `FriendShip` SET  `status` =  '".$status."' WHERE  `follower_id` =".$from_id." AND `following_id` =".$to_id;
		}
		else //else add
		{
			$sql ="INSERT INTO `FriendShip` (`follower_id`, `following_id`, `status`) VALUES ('".$from_id."', '".$to_id."', '".$status."')";
		}
		$this->db->query($sql);
	}
	public function accept($to_id)
	{
		is_user_login($this);
		$this->change_status($GLOBALS['USER']['id'], $to_id,1);
		$this->change_status($to_id, $GLOBALS['USER']['id'],1);
		redirect(base_url().'firend/show/'.$to_id, 'refresh');
	}

	public function decline($to_id)
	{
		is_user_login($this);
		$this->change_status($GLOBALS['USER']['id'], $to_id,2);
		$this->change_status($to_id, $GLOBALS['USER']['id'],2);
		redirect(base_url().'firend/show/'.$to_id, 'refresh');
	}

	public function delete($to_id)
	{
		is_user_login($this);
		$this->change_status($GLOBALS['USER']['id'], $to_id,2);
		$this->change_status($to_id, $GLOBALS['USER']['id'],2);
		redirect(base_url().'firend/show/'.$to_id, 'refresh');
	}

	public function show($uid)
	{
		is_user_login($this);
		//friend
		$sql= "select * from FriendShip F, user where F.following_id=".$GLOBALS['USER']['id']." and F.follower_id = user.uid and status= '1'";
		$friend_result =$this->db->query($sql);

		//request
		$sql= "select * from FriendShip F, user where F.following_id=".$GLOBALS['USER']['id']." and F.follower_id = user.uid and status= '0'";
		$request_result =$this->db->query($sql);

		$data['title']= 'Pinterest | Friend';
		$data['friend_result'] = $friend_result;
		$data['request_result'] = $request_result;

		load_template($this,'friend',$data);
	}
}