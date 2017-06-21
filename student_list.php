<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Student extends REST_Controller {

	function __construct($config = 'rest') {
    	parent::__construct($config);
    	$this->load->database();
    }

    // Menampilkan daftar siswa
    function student(){
    	$id = $this->get('id');
    	if ($id == '') {
    		$data = $this->db->get('student')->result();
    	}
    	else{
    		$this->db->where('id', $id);
    		$data = $this->db->get('student')->result();    		
    	}
    	$this->response($data, 200);
    }
}
?>
