<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class media extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('media');
	}
}
?>