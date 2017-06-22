<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class My_models extends REST_Controller{

	function __construct(){
		parent::__construct();
	}

    public function Get($table){
        $get_data=$this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $get_data->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }
 
    public function Insert($table,$data){
        $ins_data = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $ins_data; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function Update($table, $data, $where){
        $upd_data = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $upd_data;
    }
 
    public function Delete($table, $where){
        $del_data = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $del_data;
    }
}
?>