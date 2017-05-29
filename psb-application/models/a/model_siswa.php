<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_siswa extends CI_Model{
   function index($data){
      $query = 'SELECT * FROM calonsantri
         JOIN (SELECT * FROM gelombang WHERE gel_ta = (SELECT MAX(gel_ta) FROM gelombang)) AS gelombang ON gel_id = gel_CalonSantri WHERE 1 > 0';
      if($data[0] > 0) $query = $query.' '.' AND gel_id = '.$data[0].' ';
      //if($data[1] != 'semua') $query = $query.' '.' ';
      if(strlen($data[1]) > 0) $query = $query.' '.' AND (noPendaftaran LIKE "%'.$data[1].'%" OR NamaLengkap LIKE "%'.$data[1].'%" OR NamaPanggilan LIKE "%'.$data[1].'%")';
      $query = $query.' '.' ORDER BY noPendaftaran ASC';
      return $this->db->query($query, to_null($data));
   }
   function cek_gel_id($data){
      $query = 'SELECT * FROM gelombang WHERE gel_id = ?';
      return $this->db->query($query, to_null($data));
   }
   function cek_gel_max(){
      $query = 'SELECT * FROM gelombang ORDER BY gel_id DESC LIMIT 1';
      return $this->db->query($query);
   }
   function cek_gel_ta(){
      $query = 'SELECT * FROM gelombang WHERE gel_ta = (SELECT MAX(gel_ta) FROM gelombang)';
      return $this->db->query($query);
   }
   function delete($data){
      $query = 'DELETE FROM calonsantri WHERE noPendaftaran = ?';
      $query = $this->db->query($query, to_null($data));
      return $this->db->affected_rows() > 0;
   }
   function add_siswa($data){
      $query = 'INSERT INTO calonsantri SET noPendaftaran = ?, gel_CalonSantri = ?, email = ?, password = ?, NamaLengkap = ?, NamaPanggilan = ?, Jenis_Kelamin = ?, TempatLahir = ?, TanggalLahir = ?, Anak_Ke = ?, Jml_Saudara_Kandung = ?, Jml_Saudara_Tiri = ?, Jml_Saudara_Angkat = ?, Anak_Yatim_Piatu = ?, Bahasa = ?, Alamat = ?, No_telp = ?, Alamat_Saudara_Solo = ?, Golongan_Darah = ?, Penyakit_Pernah_Diderita = ?, Kelainan_Jasmani = ?, Lulusan_Dari = ?, Diterima_Univ = ?, Fakultas = ?, Jurusan = ?';
      $query = $this->db->query($query, to_null($data));
      return $this->db->affected_rows() > 0;
   }
   function edit_siswa($data){
      $query = 'UPDATE calonsantri SET gel_CalonSantri = ?, email = ?, password = ?, NamaLengkap = ?, NamaPanggilan = ?, Jenis_Kelamin = ?, TempatLahir = ?, TanggalLahir = ?, Anak_Ke = ?, Jml_Saudara_Kandung = ?, Jml_Saudara_Tiri = ?, Jml_Saudara_Angkat = ?, Anak_Yatim_Piatu = ?, Bahasa = ?, Alamat = ?, No_telp = ?, Alamat_Saudara_Solo = ?, Golongan_Darah = ?, Penyakit_Pernah_Diderita = ?, Kelainan_Jasmani = ?, Lulusan_Dari = ?, Diterima_Univ = ?, Fakultas = ?, Jurusan = ? WHERE noPendaftaran = ?';
      $query = $this->db->query($query, to_null($data));
      return $this->db->affected_rows() > 0;
   }
   function cek_siswa_id($data){
      $query = 'SELECT * FROM calonsantri WHERE noPendaftaran = ?';
      return $this->db->query($query, to_null($data));
   }
   function cek_siswa_max(){
      $query = 'SELECT MAX(noPendaftaran) AS noPendaftaran FROM calonsantri JOIN (SELECT * FROM gelombang ORDER BY gel_id DESC LIMIT 1) AS gelombang ON gel_kode = LEFT(siswa_no_pendaftaran, 4) LIMIT 1';
      return $this->db->query($query);
   }
}