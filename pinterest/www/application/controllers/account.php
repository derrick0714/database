<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account extends CI_Controller {

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
	public function login()
	{
		$this->load->view('login');
	}

	public function logout()
	{
		delete_cookie('email');
		delete_cookie('password');
		//delete_cookie();
		$data['message']= "loggin out... please wait";
		$this->load->view('login_result', $data);
	}

	public function submit()
	{
		$last_name = $this->input->post('LastName');
		$first_name = $this->input->post('FirstName');
		$email = $this->input->post('Email');
		$password = $this->input->post('Password');

		//loopup Duplicate entry
		$sql = "select * from `user` where email ='".$email."'";
		$result = $this->db->query($sql);
		if($result->num_rows >= 1)
		{
			//redriedt to homepage
			$data['message']= "Your have to change an email address! Redreicting to Log in page!!";
		}
		else{
			//insert to database
			$sql = "INSERT INTO `user` ( `upwd`, `first_name`, `last_name`, `email`) VALUES ( MD5('".$password."') , '".$first_name."', '".$last_name."', '".$email."')";
			$result = $this->db->query($sql);

			//set cookie
			my_set_cookie($this, $email, $password);

			//redriedt to homepage
			$data['message']= "Sign up successfully! Redreicting to home page!!";
		}
		$this->load->view('login_result', $data);

	}
	public function after_login()
	{
		$email = $this->input->post('Email');
		$password =$this->input->post('Password');
		if( !verify_user($this, $email,  md5($password)))
		{
			$data['message']= "log in failed! Please login again!!";
			
		}
		else
		{
			$data['message']= "log in successfully! Redreicting to home page!!";
			//set cookie
			my_set_cookie($this, $email, $password);
		}

		$this->load->view('login_result', $data);
		//redriedt to homepage
		
	}
	





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */