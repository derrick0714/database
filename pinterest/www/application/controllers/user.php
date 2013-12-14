<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	public function id( $uid = NULL )
	{

		is_user_login($this);

		//if it is self
		if($uid == NULL)
			$uid =$GLOBALS['USER']['id'];
		if( $uid == $GLOBALS['USER']['id'] )
		{
			$data['self'] = true;
			
		}
		else
		{
			$data['self'] = false;
		}

		$sql = "select * from FriendShip where follower_id = ".$GLOBALS['USER']['id']." and status = '1'";
		$friends_result = $this->db->query($sql);
		$data['friend_num'] = $friends_result->num_rows();

		$sql = "select * from Board where uid = ".$uid." order by timestamp desc";
		$board_result = $this->db->query($sql);

		//look up cover
		$sql = "select Board.bid as bid, store_url from Picture, Pin, Board where Picture.pid = Pin.pid and Pin.bid = Board.bid and Board.uid =".$uid." group by Board.bid";
		$pic_result = $this->db->query($sql);
		foreach ($pic_result->result() as $row){
			$data['cover'][$row->bid] = $row->store_url;
		}

		$sql = "select * from user where uid = ".$uid;
		$result = $this->db->query($sql);
		$data['user'] = $result->result_array()[0];
		$data['uid'] = $uid;

		//all pins
		$sql = "select * from Pin, Board where Pin.bid = Board.bid and  uid = ".$uid;
		$result = $this->db->query($sql);
		$data['pins'] = $result->num_rows();

		//all likes
		$sql = "select * from `Like` where uid = ".$uid;
		$result = $this->db->query($sql);
		$data['likes'] = $result->num_rows();


		$data['title']= 'Pinterest | Board';
		$data['board_query'] = $board_result;


		load_template($this,'user',$data);
	}

	public function index(){
		$this->id();
	}

}