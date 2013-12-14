<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		//default show all follow stream
		$this->stream(0);
	}

	public function stream($sid)
	{
		is_user_login($this);

		//discover whole site
		$sql="";
		$sql1="select Picture.pdesc, Picture.pid, Board.bid, Board.bname, user.uid, user.first_name, Picture.store_url ";
		if($sid == -1)
		{
			$sql = $sql1." from  Pin, Picture, user, Board where Pin.pid = Picture.pid and Board.uid =user.uid and Pin.bid = Board.bid group by Pin.pid, Pin.bid order by Pin.timestamp desc";
		}
		//all stream
		else if($sid == 0){
			$sql = $sql1." from  Pin, Picture, user, Board,Stream, FellowStream where FellowStream.sid = Stream.sid and FellowStream.bid = Board.bid and Board.uid =user.uid and Pin.bid = Board.bid and Pin.bid = Board.bid and Pin.pid = Picture.pid and Stream.uid = ".$GLOBALS['USER']['id']." group by Pin.pid, Pin.bid order by Pin.timestamp desc";
		}//certain stream 
		else{
			$sql = $sql1." from  Pin, Picture, user, Board,Stream, FellowStream where FellowStream.sid = Stream.sid and FellowStream.bid = Board.bid and Board.uid =user.uid and Pin.bid = Board.bid and Pin.bid = Board.bid and Pin.pid = Picture.pid and Stream.sid = ".$sid." group by Pin.pid, Pin.bid order by Pin.timestamp desc";
		}
		$data['result'] = $this->db->query($sql);

		//list stearm
		$sql = "select * from Stream where uid =".$GLOBALS['USER']['id'];
		$data['streams']= $this->db->query($sql);


		$data['title']= 'Pinterest';
		$data['user'] = $GLOBALS['USER'];

		load_template($this,'index',$data);
	}

	public function search()
	{
		is_user_login($this);
		$key = $this->input->post('keyword');
		//
		$sql1="select Picture.pdesc, Picture.pid, Board.bid, Board.bname, user.uid, user.first_name, Picture.store_url ";
		$sql = $sql1." from  Pin, Picture, user, Board where  Pin.pid = Picture.pid and Board.uid =user.uid and Pin.bid = Board.bid and (Picture.tags like '%".$key."%' or Picture.pdesc like '%".$key."%' ) group by Pin.pid, Pin.bid order by Pin.timestamp desc";

		$data['result'] = $this->db->query($sql);



		//list stearm
		$sql = "select * from Stream where uid =".$GLOBALS['USER']['id'];
		$data['streams']= $this->db->query($sql);


		$data['title']= 'Pinterest|search';
		$data['user'] = $GLOBALS['USER'];
		$data['keywords'] = $key;

		load_template($this,'index',$data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */