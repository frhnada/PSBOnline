<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view(view('a', 'header'));?>
<script src="<?php echo view_external('highcharts', 'js/highcharts.js'); ?>"></script>
<script src="<?php echo view_external('highcharts', 'js/modules/exporting.js'); ?>"></script>
<?php $this->load->view(view('a', 'sidebar'));?>
<div class="content-layout-wrapper layout-item-1">
   <div class="content-layout layout-item-2">
      <div class="content-layout-row">
         <div class="layout-cell" style="width: 50%" >
            <?php if(count($cek_gel_ta_max) > 0) { ?>
            <div style="width: 95%; margin-top: 5px; margin-bottom: 5px;
            border-top: 1px dotted #7993AF; border-bottom: 1px dotted #7993AF; border-left: 1px dotted #7993AF; border-right: 1px dotted #7993AF;
            padding-top: 7px; padding-bottom: 7px; padding-left: 7px; padding-right: 7px;">
                <?php echo '<b>Gelombang Tahun '.$cek_gel_ta_max[0]['gel_ta'].' :</b>';
                  echo '<ul>';
                  foreach ($cek_gel_ta_max as $key=>$row){
                     if(is_admin()) $link = ' - '.anchor('a/gelombang/edit/'.encode($row['gel_id']), 'Edit');
                     else $link = '';
                     echo '<li>'.$row['gel_nama'].$link.'</li>';
                  }
                  echo '</ul>';
                  if(is_admin()) echo anchor('a/gelombang/add', 'Tambah').' | '.anchor('a/gelombang/index', 'Selengkapnya');
               ?>
            </div>
            <?php } ?>
         </div>
         <div class="layout-cell" style="width: 50%" >
            <?php  if(is_admin()) {?>
              <div style="width: 95%; margin-top: 5px; margin-bottom: 5px;
              border-top: 1px dotted #7993AF; border-bottom: 1px dotted #7993AF; border-left: 1px dotted #7993AF; border-right: 1px dotted #7993AF;
              padding-top: 7px; padding-bottom: 7px; padding-left: 7px; padding-right: 7px;">
                 <?php echo '<b>Pengguna :</b>';
                    echo '<br>';
                    foreach($cek_users as $key=>$row) {
                       if($key == 0) $batas = '';
                       else $batas = ', ';
                       if($this->encrypt->decode($this->session->userdata('user_id')) == $row['user_id']) echo $batas.'<b><font style="color: green;">'.$row['user_username'].'</font></b>';
                       else echo $batas.$row['user_username'];
                    }
                    echo '<br>';
                 ?>
              </div>
            <?php } ?>
         </div>
      </div>
   </div>
</div>
<?php $this->load->view(view('a', 'footer'));?>