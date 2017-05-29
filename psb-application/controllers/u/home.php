<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
   function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
      $this->load->model('u/model_home');
      $this->load->helper('text');
      if(!is_login()) $this->output->cache(5);
   }
   function index(){
      $data['url'] = array('u', __CLASS__, __FUNCTION__);
      $data['judul'] = 'Beranda';
      $data['notice'] = array('', '');
      //post
      $query = $this->model_home->index();
      if($query->num_rows == 0) $data['notice'] = array('yellow', 'NOTICE : Belum ada tulisan!');
      $query = $query->result_array();
      foreach ($query as $key=>$row){
         if(is_login() AND is_admin()) $query[$key]['post_edit'] = anchor('a/post/edit/'.encode($row['post_id']), 'Edit');
         else $query[$key]['post_edit'] = '';
         $query[$key]['post_link'] = 'u/post/read/'.$row['post_link'];
         $query[$key]['post_isi'] = word_limiter(strip_tags($row['post_isi']), 35);
         $query[$key]['post_tanggal'] = date('d M Y', strtotime($row['post_tanggal']));
      }
      $data['post'] = $query;
      
      $this->load->view(view('u', 'view_home'), $data);
   }
}