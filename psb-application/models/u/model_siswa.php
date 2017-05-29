<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_siswa extends CI_Model{
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
   function add_siswa($data){
      $query = 'INSERT INTO siswa SET siswa_gel = ?, siswa_no_pendaftaran = ?, siswa_nama = ?, siswa_nama_panggilan = ?, siswa_jenis_kelamin = ?, siswa_tempat_lahir = ?, siswa_tanggal_lahir = ?, siswa_sekolah_asal = ?, siswa_sekolah_alamat = ?, siswa_agama = ?, siswa_suku = ?, siswa_anak_ke = ?, siswa_jumlah_saudara = ?, siswa_alamat = ?, siswa_prov = ?, siswa_kabupaten = ?, siswa_kecamatan = ?, siswa_kode_pos = ?, siswa_alamat_pos = ?, siswa_telepon = ?, siswa_hp = ?, siswa_email = ?, siswa_gol_darah = ?, siswa_tinggi_badan = ?, siswa_berat_badan = ?, siswa_penyakit = ?, siswa_tanggal_daftar = ?, siswa_tanggal_ulang = ?, siswa_status = ?, siswa_keterangan = ?';
      $query = $this->db->query($query, to_null($data));
      return $this->db->affected_rows() > 0;
   }
   function cek_siswa_id($data){
      $query = 'SELECT * FROM siswa WHERE siswa_id = ?';
      return $this->db->query($query, to_null($data));
   }
   function cek_siswa_max(){
      $query = 'SELECT MAX(siswa_no_pendaftaran) AS siswa_no_pendaftaran FROM siswa JOIN (SELECT * FROM gelombang ORDER BY gel_id DESC LIMIT 1) AS gelombang ON gel_kode = LEFT(siswa_no_pendaftaran, 4) LIMIT 1';
      return $this->db->query($query);
   }
}