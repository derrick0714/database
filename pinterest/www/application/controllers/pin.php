<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pin extends CI_Controller {

public function pin_url($bid = null){
	is_user_login($this);

	$defalut_bid = -1;
	if($bid != null)
		$defalut_bid = $bid;

	$sql = "select * from Board where uid = ".$GLOBALS['USER']['id']." order by timestamp desc";
	$board_result = $this->db->query($sql);
	

	$data['board_result'] = $board_result;
	$data['defalut_bid'] = $defalut_bid;
	$data['repin'] = false;
	$data['pid'] = 0;

	$this->load->view('pin_url', $data);
}

public function repin($pid){
	is_user_login($this);

	$defalut_bid = -1;

	$sql = "select * from Board where uid = ".$GLOBALS['USER']['id']." order by timestamp desc";
	$board_result = $this->db->query($sql);

	//look the picture info
	$sql = "select * from Picture where pid=".$pid;
	$pic_result = $this->db->query($sql);
	$data['pic_url'] = $pic_result->result_array()[0]['store_url'];

	$data['board_result'] = $board_result;
	$data['defalut_bid'] = $defalut_bid;
	$data['repin'] = true;
	$data['pid'] = $pid;

	$this->load->view('pin_url', $data);
}

public function create()
{
	is_user_login($this);

	$url = $this->input->post('url');
	$desc = $this->input->post('desc');
	$bid = $this->input->post('board');
	$tags = $this->input->post('tags');
	$repin = $this->input->post('repin');
	$pid = $this->input->post('pid');


	if($repin == false)
	{
		//get next pic id;
		$result = $this->db->query("SHOW TABLE STATUS LIKE 'Picture'");
		$pid = $result->result_array()[0]['Auto_increment'];  

		//add a pic 
		$sql = "INSERT INTO `Picture` (`pid`, `pdesc`, `store_url`, `scource_url`, `tags`) VALUES (".$pid." , '".$desc."', '".$url."', '".$url."', '".$tags."')";
		$this->db->query($sql);
	}

	//pin to board
	$sql = "INSERT INTO Pin (`pid`, `bid`) VALUES (".$pid.", ".$bid.")";
	$this->db->query($sql);

	redirect(base_url()."board/id/".$bid, 'refresh');
}
public function delete($pid, $bid)
{
	is_user_login($this);

	$sql="delete from Pin where pid =".$pid." and bid=".$bid;
	$this->db->query($sql);
	redirect(base_url()."board/id/".$bid, 'refresh');
}
}
