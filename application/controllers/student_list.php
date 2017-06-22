<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Student extends REST_Controller {

	function __construct($config = 'rest') {
    	parent::__construct($config);
    	$this->load->database();
    }

    // show data mahasiswa
    function get_student() {
        $student_id = $this->get('nim');
        if ($student_id == '') {
            $student = $this->db->get('student')->result();
        } 
        else {
            $this->db->where('nim', $student_id);
            $student = $this->db->get('student')->result();
        }
        $this->response($student, 200);
    }

    // Menambahkan daftar siswa
    function post_student(){
    	$data = array(
    		'id' => $this->post('id'),
    		'name' => $this->post('name'),
    		'email' => $this->post('email'), 
    		'class_id' => $this->post('class_id'), 
    		'created_at' => $this->post('created_at'), 
    		'updated_at' => $this->post('updated_at') 
    	);
    	$add_student = $this->db->insert('student', $data);
    	if($add_student){
    		$this->response($data, 200);
    	}
    	else{
    		$this->response(array('status' => 'fail', 502));
    	}
    }

    // Mengedit daftar siswa
    function put_student(){
    	$student_id = $this->put('id');
    	$data = array(
    		'id' => $this->post('id'),
    		'name' => $this->post('name'),
    		'email' => $this->post('email'), 
    		'class_id' => $this->post('class_id'), 
    		'updated_at' => $this->post('updated_at')
    	);
    	$this->db->where('id', $student_id);
    	$update = $this->db->update('school', $data);
    	if($update){
    		$this->response($data, 200);
    	}
    	else{
    		$this->response(array('status' => 'fail', 502));    			
    	}
    }
    function delete_student(){
    	$student_id = $this->delete('id');
    	$this->db->where('id', $id);
    	$delete = $this->db->delete('school');
    	if($delete){
    		$this->response(array('status' => 'success', 201));
    	}
    	else{
    		$this->response(array('status' => 'fail', 502));    			
    	}
    }
}
?>