<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_home extends CI_Model {
   function index() {
      $query = 'SELECT * FROM post LEFT JOIN users ON user_id = post_user ORDER BY post_id DESC';
      return $this->db->query($query);
   }
   function cek_gel_ta_max() {
      $query = 'SELECT * FROM gelombang WHERE gel_ta = (SELECT MAX(gel_ta) FROM gelombang LIMIT 1)';
      return $this->db->query($query);
   }

}