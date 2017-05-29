<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view(view('u', 'header')); ?>
<link rel="stylesheet" type="text/css" href="<?php echo view_external('dhtmlx', 'dhtmlxCalendar/codebase/dhtmlxcalendar.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo view_external('dhtmlx', 'dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_web.css')?>">
<script src="<?php echo view_external('dhtmlx', 'dhtmlxCalendar/codebase/dhtmlxcalendar.js') ?>"></script>
<script>function doOnLoad(){var e=new dhtmlXCalendarObject(["calendar"]);e.setSkin("dhx_web"),e.hideTime(),e.setDateFormat("%d-%m-%Y"),e.setPosition("bottom")}</script>
<?php $this->load->view(view('u', 'sidebar')); ?>
<div class="layout-cell content"><article class="post article">
<div class="postmetadataheader"><h2 class="postheader"><?php echo $judul; ?></h2></div>
<div class="postcontent postcontent-0 clearfix">
<?php $this->load->view(view('u', 'notice')); ?>
<?php echo form_open($post);?>
<div class="content-layout"><div class="content-layout-row"><div class="layout-cell layout-item-0" style="width: 50%;" >
         <?php // data siswa////////////////////////////////////////////////////////////////////////////////////////
            echo '<h4>Data Siswa</h4>';
            $template = array( 'table_open'         => '<table>',
               'cell_start'         => '<td class = "layout-item-table-1">', // class = "layout-item-table-1"
               'cell_end'           => '</td>',
               'cell_alt_start'     => '<td class = "layout-item-table-1">',
               'cell_alt_end'       => '</td>',
               'table_close'         => '</table>');
            $this->table->set_template($template);
            //
            $attrib = array('name' => 'data_nama',
                              'value' => set_value('data_nama', $data_nama),
                              'class' => css_form_class(form_error('data_nama')),
                              'style' => 'width: 90%; max-width: 300px;',
                              'maxlength' => 50);
            $this->table->add_row('<div style = "width: 150px">'.'Nama Lengkap'.'</div>', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_nama', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: Siti Dewi, Novita, dll.</font>');
            //
            $attrib = array('name' => 'data_nama_panggilan',
                              'value' => set_value('data_nama_panggilan', $data_nama_panggilan),
                              'class' => css_form_class(form_error('data_nama_panggilan')),
                              'style' => 'width: 90%; max-width: 300px;',
                              'maxlength' => 10);
            $this->table->add_row('Nama Panggilan', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_nama_panggilan', ' <font style="color: red">', '</font>'));
            //
            $radio_l = array('name' => 'data_jenis_kelamin',
                              'value' => encode('Laki-Laki'),
                              'checked' => set_radio('data_jenis_kelamin', 'Laki-Laki', $data_jenis_kelamin_l));
            $radio_p = array('name' => 'data_jenis_kelamin',
                              'value' => encode('Perempuan'),
                              'checked' => set_radio('data_jenis_kelamin', 'Perempuan', $data_jenis_kelamin_p));
            $this->table->add_row('Jenis Kelamin',form_radio($radio_l).'Laki-Laki'.form_radio($radio_p).'Perempuan'.form_error('data_jenis_kelamin', ' <font style="color: red">', '</font>'));
            //
            $attrib = array('name' => 'data_tempat_lahir',
                              'value' => set_value('data_tempat_lahir', $data_tempat_lahir),
                              'class' => css_form_class(form_error('data_tempat_lahir')),
                              'style' => 'width: 90%; max-width: 300px;',
                              'maxlength' => 15);
            $this->table->add_row('Tempat Lahir', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_tempat_lahir', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: Kulon Progo, Sleman, dll.</font>');
            //
            $attrib = array('name' => 'data_tanggal_lahir',
                              'value' => set_value('data_tanggal_lahir', $data_tanggal_lahir),
                              'class' => css_form_class(form_error('data_tanggal_lahir')),
                              'style' => 'width: 90%; max-width: 80px;',
                              'id' => 'calendar',
                              'maxlength' => 10);
            $this->table->add_row('Tanggal Lahir', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_tanggal_lahir', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: 31-12-1995, 02-03-1996, dll.</font>');
            //
            $attrib = array('name' => 'data_anak_ke',
                              'value' => set_value('data_anak_ke', $data_anak_ke),
                              'class' => css_form_class(form_error('data_anak_ke')),
                              'style' => 'width: 90%; max-width: 80px;',
                              'maxlength' => 2);
            $this->table->add_row('Anak Ke-', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_anak_ke', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: 1, 2, 3, dll.</font>');
			//
            $attrib = array('name' => 'data_jml_sdr_kandung',
                              'value' => set_value('data_jml_sdr_kandung', $data_jml_sdr_kandung),
                              'class' => css_form_class(form_error('data_jml_sdr_kandung')),
                              'style' => 'width: 90%; max-width: 80px;',
                              'maxlength' => 2);
            $this->table->add_row('Jumlah Saudara Kandung', form_input($attrib).form_error('data_jml_sdr_kandung', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: 1, 2, 3, dll.</font>');
			//
            $attrib = array('name' => 'data_jml_sdr_tiri',
                              'value' => set_value('data_jml_sdr_tiri', $data_jml_sdr_tiri),
                              'class' => css_form_class(form_error('data_jml_sdr_tiri')),
                              'style' => 'width: 90%; max-width: 80px;',
                              'maxlength' => 2);
            $this->table->add_row('Jumlah Saudara Tiri', form_input($attrib).form_error('data_jml_sdr_tiri', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: 1, 2, 3, dll.</font>');
			//
            $attrib = array('name' => 'data_jml_sdr_angkat',
                              'value' => set_value('data_jml_sdr_angkat', $data_jml_sdr_angkat),
                              'class' => css_form_class(form_error('data_jml_sdr_angkat')),
                              'style' => 'width: 90%; max-width: 80px;',
                              'maxlength' => 2);
            $this->table->add_row('Jumlah Saudara Angkat', form_input($attrib).form_error('data_jml_sdr_angkat', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: 1, 2, 3, dll.</font>');
			//
            $radio_bukan = array('name' => 'data_yatim_piatu', 'value' => encode('bukan'), 'checked' => set_radio('data_yatim_piatu', 'bukan', $data_yatim_piatu_bukan));
            $radio_yatim = array('name' => 'data_yatim_piatu', 'value' => encode('yatim'), 'checked' => set_radio('data_yatim_piatu', 'yatim', $data_yatim_piatu_yatim));
            $radio_piatu = array('name' => 'data_yatim_piatu', 'value' => encode('piatu'), 'checked' => set_radio('data_yatim_piatu', 'piatu', $data_yatim_piatu_piatu));
            $radio_yatimpiatu = array('name' => 'data_yatim_piatu', 'value' => encode('yatim piatu'), 'checked' => set_radio('data_yatim_piatu', 'yatim piatu', $data_yatim_piatu_yatimpiatu));
            
            $this->table->add_row('Anak Yatim Piatu',
                     form_radio($radio_bukan).'Bukan'.
                     form_radio($radio_yatim).'Yatim'. 
                     form_radio($radio_piatu).'Piatu'.
                     form_radio($radio_yatimpiatu).'Yatim Piatu'.
                     form_error('data_yatim_piatu', ' <font style="color: red">', '</font>'));
            
			//
            $attrib = array('name' => 'data_bahasa',
                              'value' => set_value('data_bahasa', $data_bahasa),
                              'class' => css_form_class(form_error('data_bahasa')),
                              'style' => 'width: 90%; max-width: 300px;',
                              'maxlength' => 35);
            $this->table->add_row('Bahasa sehari-hari', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_bahasa', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: Jawa, Aceh, Bali, dll.</font>');
            //
            $attrib = array('name' => 'data_alamat',
                              'value' => set_value('data_alamat', $data_alamat),
                              'class' => css_form_class(form_error('data_alamat')),
                              'style' => 'width: 90%; max-width: 300px; height: 45px;',
                              'maxlength' => 100);
            $this->table->add_row('Alamat Rumah', form_textarea($attrib).'<font style="color: red;"> * </font>'.form_error('data_alamat', ' <font style="color: red">', '</font>'));
            //
            $attrib = array('name' => 'data_telepon',
                              'value' => set_value('data_telepon', $data_telepon),
                              'class' => css_form_class(form_error('data_telepon')),
                              'style' => 'width: 90%; max-width: 150px;',
                              'maxlength' => 12);
            $this->table->add_row('Nomor Telp / HP', form_input($attrib).form_error('data_telepon', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: 0274555666, dll.</font>');
            //
            $attrib = array('name' => 'data_alamat_sdr',
                              'value' => set_value('data_alamat_sdr', $data_alamat_sdr),
                              'class' => css_form_class(form_error('data_alamat_sdr')),
                              'style' => 'width: 90%; max-width: 300px; height: 45px;',
                              'maxlength' => 100);
            $this->table->add_row('Alamat Saudara di Solo', form_textarea($attrib).'<font style="color: red;"> * </font>'.form_error('data_alamat_sdr', ' <font style="color: red">', '</font>'));
            //
            $radio_none = array('name' => 'data_gol_darah', 'value' => encode('none'), 'checked' => set_radio('data_gol_darah', 'none', $data_gol_darah_none));
            $radio_a = array('name' => 'data_gol_darah', 'value' => encode('u'), 'checked' => set_radio('data_gol_darah', 'u', $data_gol_darah_a));
            $radio_b = array('name' => 'data_gol_darah', 'value' => encode('b'), 'checked' => set_radio('data_gol_darah', 'b', $data_gol_darah_b));
            $radio_o = array('name' => 'data_gol_darah', 'value' => encode('o'), 'checked' => set_radio('data_gol_darah', 'o', $data_gol_darah_o));
            $radio_ab = array('name' => 'data_gol_darah', 'value' => encode('ab'), 'checked' => set_radio('data_gol_darah', 'ab', $data_gol_darah_ab));
            $this->table->add_row('Golongan Darah',
                     form_radio($radio_a).'A'.
                     form_radio($radio_b).'B'.
                     form_radio($radio_o).'O'.
                     form_radio($radio_ab).'AB'.
                     form_radio($radio_none).'Tidak Tahu'.
                     form_error('data_gol_darah', ' <font style="color: red">', '</font>'));
			//
            $attrib = array('name' => 'data_penyakit',
                              'value' => set_value('data_penyakit', $data_penyakit),
                              'class' => css_form_class(form_error('data_penyakit')),
                              'style' => 'width: 90%; max-width: 300px; height: 45px;',
                              'maxlength' => 50);
            $this->table->add_row('Riwayat Penyakit', form_textarea($attrib).form_error('data_penyakit', ' <font style="color: red">', '</font>'));
            //
            $attrib = array('name' => 'data_kelainan',
                              'value' => set_value('data_kelainan', $data_kelainan),
                              'class' => css_form_class(form_error('data_kelainan')),
                              'style' => 'width: 90%; max-width: 300px; height: 45px;',
                              'maxlength' => 25);
            $this->table->add_row('Keterangan Jasmani', form_textarea($attrib).form_error('data_kelainan', ' <font style="color: red">', '</font>'));
            
			//
			$attrib = array('name' => 'data_sekolah_asal',
                              'value' => set_value('data_sekolah_asal', $data_sekolah_asal),
                              'class' => css_form_class(form_error('data_sekolah_asal')),
                              'style' => 'width: 90%; max-width: 300px;',
                              'maxlength' => 30);
            $this->table->add_row('Asal Sekolah', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_sekolah_asal', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: SMP N 1 Mungkid, dll.</font>');
            
			//
            $attrib = array('name' => 'data_univ',
                              'value' => set_value('data_univ', $data_univ),
                              'class' => css_form_class(form_error('data_univ')),
                              'style' => 'width: 90%; max-width: 300px;',
                              'maxlength' => 40);
            $this->table->add_row('Universitas', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_univ', ' <font style="color: red">', '</font>'));
            //
            $attrib = array('name' => 'data_fak',
                              'value' => set_value('data_fak', $data_fak),
                              'class' => css_form_class(form_error('data_fak')),
                              'style' => 'width: 90%; max-width: 300px;',
                              'maxlength' => 5);
            $this->table->add_row('Fakultas', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_fak', ' <font style="color: red">', '</font>'));
            //
            $attrib = array('name' => 'data_jur',
                              'value' => set_value('data_jur', $data_jur),
                              'class' => css_form_class(form_error('data_jur')),
                              'style' => 'width: 90%; max-width: 80px;',
                              'maxlength' => 45);
            $this->table->add_row('Jurusan', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_jur', ' <font style="color: red">', '</font>').'<br>'.'<font style="font-style: italic; color: #C1C1C1">Contoh: 55651, 55611, dll.</font>');
            
            
            echo '<h4>Pembuatan Akun</h4>';
            //
			$attrib = array('name' => 'data_email',
                              'value' => set_value('data_email', $data_email),
                              'class' => css_form_class(form_error('data_email')),
                              'style' => 'width: 90%; max-width: 150px;',
                              'maxlength' => 40);
            $this->table->add_row('E-Mail', form_input($attrib).'<font style="color: red;"> * </font>'.form_error('data_email', ' <font style="color: red">', '</font>'));
			//
			$attrib = array('name' => 'data_pass',
                              'value' => set_value('data_pass', $data_pass),
                              'class' => css_form_class(form_error('data_pass')),
                              'style' => 'width: 90%; max-width: 150px;',
                              'maxlength' => 20);
            $this->table->add_row('Password', form_password($attrib).'<font style="color: red;"> * </font>'.form_error('data_pass', ' <font style="color: red">', '</font>'));
			echo $this->table->generate();
         ?>
      </div>
      </div></div>
<div class="content-layout"><div class="content-layout-row"><div class="layout-cell layout-item-0" style="width: 50%" ></div><div class="layout-cell layout-item-0" style="width: 50%" >
      <p><?php echo form_submit('save', $simpan, 'class = "button" onclick = "return confirm ('."'Apa semua data sudah benar?'".')"'); 
      //echo anchor($back, 'Kembali', 'class = "button"');?></p> 
</div></div></div>
<?php echo form_close();?>
</div></article></div><?php $this->load->view(view('u', 'footer')); ?>