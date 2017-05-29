<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Siswa extends CI_Controller{
   function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
      $this->load->model('u/model_siswa');
      //if(!is_login()) $this->output->cache(5); // jadi eror kalau ada form
   }
   function index($notice = FALSE){ //add
      if($this->session->userdata('cek_siswa_id')) redirect('u/siswa/nopend');
      $data['doOnLoad'] = TRUE;
      $data['url'] = array('u', __CLASS__, __FUNCTION__);
      //$data['judul'] = 'Pendaftaran Siswa'; // pindah bawah
      $data['notice'] = array('', '');
      $data['post'] = 'u/siswa/index';
      $data['simpan'] = 'Simpan';
      $data['back'] = 'u/siswa/index';
      $cek_gel_max = $this->model_siswa->cek_gel_max();
      $cek_gel_max = $cek_gel_max->row_array();
      
      // judul
      $data['judul'] = 'Pendaftaran Siswa - '.$cek_gel_max['gel_ta'].' - '.$cek_gel_max['gel_nama'];
      // tanggal pendaftaran
      if((($this->compareDate($cek_gel_max['gel_tanggal_mulai'], date('d-m-Y',time()))) == 1 OR ($this->compareDate($cek_gel_max['gel_tanggal_mulai'], date('d-m-Y',time()))) == 0) AND (($this->compareDate($cek_gel_max['gel_tanggal_selesai'], date('d-m-Y',time()))) == -1 OR ($this->compareDate($cek_gel_max['gel_tanggal_selesai'], date('d-m-Y',time()))) == 0)) redirect('u/siswa/close');
      // data siswa
      $data['data_nama'] = '';
      $data['data_nama_panggilan'] = '';
      $data['data_jenis_kelamin_l'] = TRUE;
      $data['data_jenis_kelamin_p'] = FALSE;
      $data['data_tempat_lahir'] = '';
      $data['data_tanggal_lahir'] = date('d-m-Y', time() - (16 * 360 * 86400));
      $data['data_anak_ke'] = '';
      $data['data_jml_sdr_kandung'] = '';
	  $data['data_jml_sdr_tiri'] = '';
	  $data['data_jml_sdr_angkat'] = '';
      $data['data_kecamatan'] = '';
      $data['data_yatim_piatu_bukan'] = TRUE;
      $data['data_yatim_piatu_yatim'] = FALSE;
	  $data['data_yatim_piatu_piatu'] = FALSE;
      $data['data_yatim_piatu_yatimpiatu'] = FALSE;
      $data['data_bahasa'] = '';
	  $data['data_alamat'] = '';
	  $data['data_telepon'] = '';
      $data['data_alamat_sdr'] = '';
      $data['data_gol_darah_none'] = TRUE;
      $data['data_gol_darah_a'] = FALSE;
      $data['data_gol_darah_b'] = FALSE;
      $data['data_gol_darah_o'] = FALSE;
      $data['data_gol_darah_ab'] = FALSE;
      $data['data_penyakit'] = '';
      $data['data_kelainan'] = '';
      $data['data_sekolah_asal'] = '';
      $data['data_univ'] = '';
	  $data['data_fak'] = '';
	  $data['data_jur'] = '';
      // orang akun
      $data['data_email'] = '';
	  $data['data_pass'] = '';
      // data siswa
      $this->form_validation->set_rules('data_nama', ' ', 'trim|required|max_length[50]|xss_clean');
      $this->form_validation->set_rules('data_nama_panggilan', ' ', 'trim|max_length[10]|xss_clean');
      $this->form_validation->set_rules('data_jenis_kelamin', ' ', 'trim|xss_clean|decode[]|is_equal[Laki-Laki, Perempuan]');
      $this->form_validation->set_rules('data_tempat_lahir', ' ', 'trim|required|max_length[15]|xss_clean');
      $this->form_validation->set_rules('data_tanggal_lahir', ' ', 'trim|required|max_length[10]|xss_clean|is_date');
	  $this->form_validation->set_rules('data_anak_ke', ' ', 'trim|numeric|max_length[2]|less_than[99]|xss_clean');
	  $this->form_validation->set_rules('data_jml_sdr_kandung', ' ', 'trim|numeric|max_length[2]|less_than[99]|xss_clean');
	  $this->form_validation->set_rules('data_jml_sdr_tiri', ' ', 'trim|numeric|max_length[2]|less_than[99]|xss_clean');
	  $this->form_validation->set_rules('data_jml_sdr_angkat', ' ', 'trim|numeric|max_length[2]|less_than[99]|xss_clean');
	  $this->form_validation->set_rules('data_yatim_piatu', ' ', 'trim|xss_clean|decode[]|is_equal[bukan, yatim, piatu, yatim piatu]');
      $this->form_validation->set_rules('data_bahasa', ' ', 'trim|max_length[35]|xss_clean');
	  $this->form_validation->set_rules('data_alamat', ' ', 'trim|max_length[100]|xss_clean');
	  $this->form_validation->set_rules('data_alamat_sdr', ' ', 'trim|max_length[100]|xss_clean');
	  $this->form_validation->set_rules('data_gol_darah', ' ', 'trim|xss_clean|decode[]|is_equal[a, b, ab, o, none]');
	  $this->form_validation->set_rules('data_penyakit', ' ', 'trim|max_length[50]|xss_clean');
	  $this->form_validation->set_rules('data_kelainan', ' ', 'trim|max_length[25]|xss_clean');
	  $this->form_validation->set_rules('data_sekolah_asal', ' ', 'trim|required|max_length[30]|xss_clean');
	  $this->form_validation->set_rules('data_univ', ' ', 'trim|max_length[40]|xss_clean');
	  $this->form_validation->set_rules('data_fak', ' ', 'trim|max_length[5]|xss_clean');
	  $this->form_validation->set_rules('data_email', ' ', 'trim|max_length[40]|xss_clean');
	  $this->form_validation->set_rules('data_pass', ' ', 'trim|max_length[20]|xss_clean');
      
	  
	  if($this->form_validation->run()){
         $siswa_gel = $cek_gel_max['gel_id'];
         $cek_siswa_max = $this->model_siswa->cek_siswa_max();
         if($cek_siswa_max->num_rows() == 0) $siswa_no_pendaftaran = ($cek_gel_max['gel_kode'] * 10000) + 1;
         else{
            $cek_siswa_max = $cek_siswa_max->row_array();
            $siswa_no_pendaftaran = ($cek_gel_max['gel_kode'] * 10000) + (substr($cek_siswa_max['siswa_no_pendaftaran'], 4, 4) + 1);
         }
         // siswa
         $siswa_nama = $this->input->post('data_nama', TRUE);
         $siswa_nama_panggilan = $this->input->post('data_nama_panggilan', TRUE);
         $siswa_jenis_kelamin = $this->input->post('data_jenis_kelamin', TRUE);
         $siswa_tempat_lahir = $this->input->post('data_tempat_lahir', TRUE);
         $siswa_tanggal_lahir = date('Y-m-d', strtotime($this->input->post('data_tanggal_lahir', TRUE)));
         $siswa_anak_ke = $this->input->post('data_anak_ke', TRUE);
		 $siswa_jml_sdr_kandung = $this->input->post('data_jml_sdr_kandung', TRUE);
		 $siswa_jml_sdr_tiri = $this->input->post('data_jml_sdr_tiri', TRUE);
		 $siswa_jml_sdr_angkat = $this->input->post('data_jml_sdr_angkat', TRUE);
		 $siswa_yatim_piatu = $this->input->post('data_yatim_piatu', TRUE);
		 $siswa_bahasa = $this->input->post('data_bahasa', TRUE);
		 $siswa_alamat = $this->input->post('data_alamat', TRUE);
		 $siswa_telepon = $this->input->post('data_telepon', TRUE);
		 $siswa_alamat_sdr = $this->input->post('data_alamat_sdr', TRUE);
		 $siswa_gol_darah = $this->input->post('data_gol_darah', TRUE);
		 $siswa_penyakit = $this->input->post('data_penyakit', TRUE);
		 $siswa_kelainan = $this->input->post('data_kelainan', TRUE);
		 $siswa_sekolah_asal = $this->input->post('data_sekolah_asal', TRUE);
		 $siswa_univ = $this->input->post('data_univ', TRUE);
		 $siswa_fak = $this->input->post('data_fak', TRUE);
		 $siswa_jur = $this->input->post('data_jur', TRUE);
		 $siswa_email = $this->input->post('data_email', TRUE);
		 $siswa_pass = $this->input->post('data_pass', TRUE);
		 
		 $query_siswa = $this->model_siswa->add_siswa(array($siswa_gel, $siswa_no_pendaftaran, $siswa_nama, $siswa_nama_panggilan, $siswa_jenis_kelamin, $siswa_tempat_lahir, $siswa_tanggal_lahir, $siswa_sekolah_asal, $siswa_sekolah_alamat, $siswa_agama, $siswa_suku, $siswa_anak_ke, $siswa_jumlah_saudara, $siswa_alamat, $siswa_prov, $siswa_kabupaten, $siswa_kecamatan, $siswa_kode_pos, $siswa_alamat_pos, $siswa_telepon, $siswa_hp, $siswa_email, $siswa_gol_darah, $siswa_tinggi_badan, $siswa_berat_badan, $siswa_penyakit, $siswa_tanggal_daftar, $siswa_tanggal_ulang, $siswa_status, $siswa_keterangan));
         $siswa_id = $this->db->insert_id();
         
         redirect('u/siswa/nopend');
      }
      else{
         if(css_notice(validation_errors())) $data['notice'] = array('red', 'ERROR : Data tidak lengkap');
      }
      if($notice == 'addtrue') $data['notice'] = array('green', 'SUCCES : Tambah data berhasil!');
      $this->load->view(view('u', 'view_siswa_data'), $data);
   }
   function close(){
      $data['url'] = array('u', __CLASS__, __FUNCTION__);

      $data['judul'] = 'Pendaftaran Siswa';
      $data['notice'] = array('red', 'Pendaftaran belum dibuka');
      $this->load->view(view('u', 'view_siswa_close'), $data);
   }
   function nopend(){
      if(!$this->session->userdata('cek_siswa_id')) redirect('u/siswa/index');
      $data['url'] = array('u', __CLASS__, __FUNCTION__);
      $data['judul'] = 'Berhasil Mendaftar';
      $data['notice'] = array('green', 'Anda telah berhasil mendaftar! Silahkan simpan Nomer Pendaftaran dan segera lakukan verifikasi data!');
      $data['back'] = 'u/siswa/daftar';
      $cek_siswa_id = $this->session->userdata('cek_siswa_id');
      $data['siswa_no_pendaftaran'] = $cek_siswa_id['siswa_no_pendaftaran'];
      $data['siswa_nama'] = $cek_siswa_id['siswa_nama'];
      $data['siswa_tanggal_lahir'] = date('d-m-Y', strtotime($cek_siswa_id['siswa_tanggal_lahir']));
      $this->load->view(view('u', 'view_siswa_nopend'), $data);
   }
   function daftar(){
      $this->session->unset_userdata('cek_siswa_id');
      redirect('u/siswa/index');
   }
   function compareDate($date1, $date2){
	list($day, $month, $year) = explode('-', $date1);
	$date1 = sprintf('%4d%2d%2d', $year, $month, $day);
	list($day, $month, $year) = explode('-', $date2);
	$date2 = sprintf('%4d%2d%2d', $year, $month, $day);
	if($date2>$date1) return 1;
	elseif($date2 == $date1) return 0;
	else return -1;
   }
}