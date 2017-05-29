<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view(view('u', 'header')); ?><?php $this->load->view(view('u', 'sidebar')); ?>
<div class="layout-cell content">
   <article class="post article">
      <div class="postmetadataheader"><h2 class="postheader"><?php echo $judul; ?></h2></div>
      <div class="postcontent postcontent-0 clearfix">
         <?php $this->load->view(view('u', 'notice')); ?>
         <div class="content-layout-wrapper layout-item-1">
            <div class="content-layout">
                <div class="content-layout-row">
                  <div class="layout-cell layout-item-6" style="width: 70%" >
                      <?php foreach ($post as $key=>$row) {?>
                        <h2><?php echo anchor($row['post_link'], $row['post_judul'], 'style="font-size:18px;"');?></h2>
                        <label style="color: #FA681E; padding-top: 0px; padding-bottom: 0px; margin-top: 0px; margin-bottom: 0px;">
                           <?php echo 'Ditulis tanggal : '.$row['post_tanggal'].' '.$row['post_edit']?>
                        </label>
                        <p style="text-align: justify;"><?php echo $row['post_isi'].' '.anchor($row['post_link'], '(Selengkapnya)');?></p>
                      <?php }?>
                  </div>
                  <div class="layout-cell layout-item-0" style="width: 30%" >
                     
                    <?php if(count($cek_gel_ta_max) > 0){
                           echo '<b>Pendaftaran Tahun '.$cek_gel_ta_max[0]['gel_ta'].' :</b>';
                           echo '<ul>';
                           foreach ($cek_gel_ta_max as $key=>$row){
                              if(is_admin()) $link = ' - '.anchor('a/gelombang/edit/'.encode($row['gel_id']), 'Edit');
                              else $link = '';
                              echo '<li>'.$row['gel_nama'].$link.' : <br>'.date('d-m-Y', strtotime($row['gel_tanggal_mulai'])).' s.d. '.date('d-m-Y', strtotime($row['gel_tanggal_selesai'])).'</li>';
                           }
                           echo '</ul>';
                           if(is_admin()){
                              echo anchor('a/gelombang/add', 'Tambah').' | '. anchor('a/gelombang/index', 'Selengkapnya');
                              echo '<br><br>';
                           }
                        }
                     ?>
                     
                  </div>
                </div>
            </div>
         </div>
      </div>
   </article>
</div>
<?php $this->load->view(view('u', 'footer')); ?>