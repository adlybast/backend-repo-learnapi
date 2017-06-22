<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Myclass extends REST_Controller {

	function __construct($config = 'rest') {
    	parent::__construct($config);
    	$this->load->database();
    }

    // show data mahasiswa
    function get_class() {
        $class_id = $this->get('id');
        if ($class_id == '') {
            $class = $this->db->get('class')->result();
        } 
        else {
            $this->db->where('id', $class_id);
            $class = $this->db->get('class')->result();
        }
        $this->response($class, 200);
    }

    // Menambahkan daftar siswa
    function post_class(){
    	$data = array(
    		'id' => $this->post('id'),
    		'name' => $this->post('name'), 
    		'capacity' => $this->post('capacity'), 
    		'created_at' => $this->post('created_at'), 
    		'updated_at' => $this->post('updated_at') 
    	);
    	$add_class = $this->db->insert('class', $data);
    	if($add_class){
    		$this->response($data, 200);
    	}
    	else{
    		$this->response(array('status' => 'fail', 502));
    	}
    }

    // Mengedit daftar siswa
    function put_class(){
    	$class_id = $this->put('id');
    	$data = array(
    		'id' => $this->post('id'),
    		'name' => $this->post('name'), 
    		'capacity' => $this->post('capacity'), 
    		'updated_at' => $this->post('updated_at')
    	);
    	$this->db->where('id', $class_id);
    	$update = $this->db->update('class', $data);
    	if($update){
    		$this->response($data, 200);
    	}
    	else{
    		$this->response(array('status' => 'fail', 502));    			
    	}
    }
    function delete_class(){
    	$class_id = $this->delete('id');
    	$this->db->where('id', $class_id);
    	$delete = $this->db->delete('class');
    	if($delete){
    		$this->response(array('status' => 'success', 201));
    	}
    	else{
    		$this->response(array('status' => 'fail', 502));    			
    	}
    }
}
?>