<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
   function __construct(){
      parent::__construct();
      if(!is_login()) redirect('a/login/index/loginfalse/'.encode(uri_string()));
      date_default_timezone_set('Asia/Jakarta');
      $this->load->model('a/model_home');
   }
   function index(){
      $data['url'] = array('a', __CLASS__, __FUNCTION__);
      $data['notice'] = array('', '');
      $data['judul'] = 'Beranda';
      //gel tahun terakhir
      $cek_gel_ta_max = $this->model_home->cek_gel_ta_max();
      $data['cek_gel_ta_max'] = $cek_gel_ta_max->result_array();      
      //user
      $cek_users = $this->model_home->cek_users();
      $data['cek_users'] = $cek_users->result_array();
      $this->load->view(view('a', 'view_home'), $data);
   }
}