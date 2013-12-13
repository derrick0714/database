<?php
$USER = array();
function verify_user($p, $email, $password)
{
	if(!$email || !$password )
		return false;

	$sql = "SELECT * FROM user WHERE email = '".$email."' AND upwd = '".$password."'";

	$result = $p->db->query($sql);
	if($result->num_rows == 1)
	{
		$row = $result->result_array()[0];
		$GLOBALS['USER']['email'] = $email;
		$GLOBALS['USER']['id']= $row['uid'];
		$GLOBALS['USER']['first_name']= $row['first_name'];
		$GLOBALS['USER']['last_name']= $row['last_name'];
		$GLOBALS['USER']['pic_url']= $row['pic_url'];
		return true;
	}
	else
		return false;

}

function is_user_login($p)
{
	
	$email = get_cookie("email");
	$password = get_cookie("password");

	if(!verify_user($p, $email ,$password))
	{
		redirect(base_url().'account/login', 'refresh');
	}
}

function my_set_cookie($p, $email, $password)
{
	//set cookie
	$cookie = array(
		'name'   => 'email',
		'value'  => $email,
		'expire' => '36000',
		);
	$p->input->set_cookie($cookie);

	$cookie = array(
		'name'   => 'password',
		'value'  => md5($password),
		'expire' => '36000',
		);
	$p->input->set_cookie($cookie);
	
}

?>