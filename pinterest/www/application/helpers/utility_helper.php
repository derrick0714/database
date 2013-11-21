<?php

define("CSS", base_url().'assets/css');
define("JS", base_url().'assets/js');
define("IMGS", base_url().'assets/imgs');
define("ICO", base_url().'assets/ico');

function load_template( $p, $name, $data= null){

	$p->load->view('header', $data);
	$p->load->view( $name, $data);
	$p->load->view('footer', $data);
}

?>