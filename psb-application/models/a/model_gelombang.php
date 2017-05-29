<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_gelombang extends CI_Model{
   function index(){
      $query = 'SELECT * FROM gelombang ORDER BY gel_id DESC';
      return $this->db->query($query);
   }
   function delete($data){
      $query = 'DELETE FROM gelombang WHERE gel_id = ?';
      $query = $this->db->query($query, to_null($data));
      return $this->db->affected_rows() > 0;
   }
   function add($data){
	  $query = $this->index();
		if ($query->num_rows == 0){ 
			$query = 'INSERT INTO gelombang SET gel_id = 1, gel_ta = ?, gel_kode = ?, gel_nama = ?, gel_tanggal_mulai = ?, gel_tanggal_selesai = ?, gel_keterangan = ?';
		}
		else{
			$query = 'INSERT INTO gelombang SET gel_ta = ?, gel_kode = ?, gel_nama = ?, gel_tanggal_mulai = ?, gel_tanggal_selesai = ?, gel_keterangan = ?';
        }
      $query = $this->db->query($query, to_null($data));
      return $this->db->affected_rows() > 0;
   }
   function edit($data){
      $query = 'UPDATE gelombang SET gel_ta = ?, gel_nama = ?, gel_tanggal_mulai = ?, gel_tanggal_selesai= ?, gel_keterangan = ? WHERE gel_id = ?';
      $query = $this->db->query($query, to_null($data));
      return $this->db->affected_rows() > 0;
   }
   function cek_gel_id($data){
      $query = 'SELECT * FROM gelombang WHERE gel_id = ?';
      return $this->db->query($query, to_null($data));
   }
   function cek_gel_kode(){
      $query = ' SELECT MAX(gel_kode) as gel_kode FROM gelombang';
      return $this->db->query($query);
   }
}