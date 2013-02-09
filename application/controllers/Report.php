<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
*/
class Report extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$data['report_data'] = array(
				'mark_level' 	=> $_POST['report_level'],
				'mark_class' 	=> $_POST['report_class'],
				'mark_room' 	=> $_POST['report_room'],
				'mark_subject' 	=> $_POST['report_subject'],
				'mark_test' 	=> $_POST['report_test'],
				'mark_skill' 	=> $_POST['report_skill'],
				'mark_student' 	=> $_POST['report_student']
		);

		$this->load->view('report', $data);
		
		
	}



}
?>