
<div class="main">
  	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="span9">
					<?php if ( $this->session->flashdata('pesan')): ?>
					<div class="alert <?= $this->session->flashdata('jenis') ?>">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?= $this->session->flashdata('pesan') ;?>
					</div>
					<?php endif;?>
				</div>
			</div>
			<div class="row">
				<div class="span9">
					<div class="menuku">
						<li><a href="<?= base_url('siswa/daftarulang');?>" class="btn btn-info">Pribadi</a></li>
						<li><a <?php if ($siswa['ekskul'] != '') {echo 'href="'.base_url('siswa/ortu').'"';} else {echo 'disabled onclick="return alert(\'lengkapi data pribadi terlebih dahulu\')"';} ;?>  class="btn btn-success">Orang Tua</a></li>
						<li><a <?php if ($siswa['nama_ayah_kandung'] != '') {echo 'href="'.base_url('siswa/ekonomi').'"';} else {echo 'disabled onclick="return alert(\'lengkapi data orang tua terlebih dahulu\')"';} ;?> class="btn btn-warning" >Ekonomi</a></li>
						<li><a <?php if ($siswa['terima_fisik_kip'] != '') {echo 'href="'.base_url('siswa/periodik').'"';} else {echo 'disabled onclick="return alert(\'lengkapi data ekonomi terlebih dahulu\')"';} ;?> class="btn btn-danger" >Periodik</a></li>
					</div>
					<div class="widget widget-nopad">
						<div class="widget-header"> <i class="icon-list-alt"></i>
							<h3> Kelengkapan Data Pribadi</h3>
						</div>
					<!-- /widget-header -->
					<div class="widget-content" style="padding: 10px">

				<div class="widget small-stats-container">
				<fieldset>
					<br>
					<!-- Tab Konten Halaman -->
					<div class="tab-content">
		<?= form_open('siswa/simpanekonomi', 'class="form-horizontal"') ;?>
			<fieldset>
				
				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="no_kks">No KKS </label>
					<div class="controls">
						<input type="number" class="span10" id="no_kks" name="no_kks" value="<?php echo $siswa['no_kks'] ?>" placeholder="Isikan nomor kartu keluarga sejahtera (jika ada)" >
						<div style="color: #FF8A7A; font-size: 7pt">
							Nomor Kartu Keluarga Sejahtera (jika memiliki). Nomor yang dimaksud adalah 6 digit kode yang tertera pada sisi belakang kiri atas kartu (di bawah lambang Garuda Pancasila)
						</div>
					</div> <!-- /controls -->			
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="terima_kps">Penerima KPS/KPH <span style="color: red">*</span></label>
					<div class="controls">
						<input required type="radio" id="terima_kps" name="terima_kps" value="Ya" <?php if ($siswa['terima_kps'] == 'Ya') {echo 'checked="checked"';} ?>> Ya 
						<input required style="margin-left: 20px" type="radio" id="terima_kps" name="terima_kps" value="Tidak" <?php if ($siswa['terima_kps'] == 'Tidak') {echo 'checked="checked"';} ?>> Tidak
						<div style="color: #FF8A7A; font-size: 7pt">
							Status peserta didik sebagai penerima manfaat KPS (Kartu Perlindungan Sosial)/PKH (Program Keluarga Harapan). Peserta didik dinyatakan sebagai penerima KPS/PKH apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KPS/PKH. Sebagai contoh, peserta didik tercantum pada KK dengan kepala keluarganya adalah kakek. Apabila kakek peserta didik tersebut pemegang KPS/PKH, maka peserta didik yang bersangkutan dinyatakan
							penerima KPS/PKH.
						</div>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="no_kps">No KPS  </label>
					<div class="controls">
						<input type="number" class="span10" id="no_kps" name="no_kps" value="<?php echo $siswa['no_kps'] ?>" placeholder="Isikan nomor kartu perlindungan sosial (jika ada)" >
						<div style="color: #FF8A7A; font-size: 7pt">
							*) Apabila Menerima. Nomor KPS atau PKH yang masih berlaku jika sebelumnya dipilih sebagai penerima KPS/PKH
						</div>
					</div> <!-- /controls -->			
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="usul_pip">Usul PIP <span style="color: red">*</span></label>
					<div class="controls">
						<input required type="radio" id="usul_pip" name="usul_pip" value="Ya" <?php if ($siswa['usul_pip'] == 'Ya') {echo 'checked="checked"';} ?>> Ya 
						<input required style="margin-left: 20px" type="radio" id="usul_pip" name="usul_pip" value="Tidak" <?php if ($siswa['usul_pip'] == '2') {echo 'checked="checked"';} ?>> Tidak
						<div style="color: #FF8A7A; font-size: 7pt">
							Pilih Ya apabila peserta didik layak diajukan sebagai penerima manfaat Program Indonesia Pintar. Pilih Tidak jika tidak memenuhikriteria. Opsi ini khusus bagi peserta didik yang tidak memiliki KIP. Peserta didik yang memiliki KIP silakan dipilih Tidak
						</div>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="alasan_layak_pip">Alasan Layak PIP</label>
					<div class="controls">
						<select name="alasan_layak_pip" id="alasan_layak_pip" class="span10">
							<option value="">-- pilih jika mengajukan PIP --</option>
							<?php foreach ($layakpip as $pip): ?>
								<option <?php if ($siswa['alasan_layak_pip'] == $pip[1]) {echo 'selected';} ;?> ><?php echo $pip[1] ?></option>

							<?php endforeach ?>
						</select>
						<div style="color: #FF8A7A; font-size: 7pt">
							Alasan utama peserta didik jika layak menerima manfaat PIP. Kolom ini akan muncul apabila dipilih Ya untuk mengisi kolom Usulan dari Sekolah (Layak PIP).
						</div>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="penerima_kip">Penerima KIP <span style="color: red">*</span></label>
					<div class="controls">
						<input required type="radio" id="penerima_kip" name="penerima_kip" value="Ya" <?php if ($siswa['penerima_kip'] == 'Ya') {echo 'checked="checked"';} ?>> Ya 
						<input required style="margin-left: 20px" type="radio" id="penerima_kip" name="penerima_kip" value="Tidak" <?php if ($siswa['penerima_kip'] == 'Tidak') {echo 'checked="checked"';} ?>> Tidak
						<div style="color: #FF8A7A; font-size: 7pt">
							Pilih Ya apabila peserta didik memiliki Kartu Indonesia Pintar (KIP). Pilih Tidak jika tidak memiliki.
						</div>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="nomor_kip">No KIP </label>
					<div class="controls">
						<input type="number" class="span10" id="nomor_kip" name="nomor_kip" value="<?php echo $siswa['nomor_kip'] ?>" placeholder="Isikan nomor Kartu Indonesia Pintar (jika ada)" >
						<div style="color: #FF8A7A; font-size: 7pt">
							Nomor KIP milik peserta didik apabila sebelumnya telah dipilih sebagai penerima KIP. Nomor yang dimaksud adalah 6 digit kode yang tertera pada sisi belakang kanan atas kartu (di bawah lambang toga).
						</div>
					</div> <!-- /controls -->			
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="nama_kip">Nama KIP </label>
					<div class="controls">
						<input type="text" class="span10" id="nama_kip" name="nama_kip" value="<?php echo $siswa['nama_kip'] ?>" placeholder="Isikan nama siswa yang tercetak di Kartu Indonesia Pintar (jika ada)" >
						<div style="color: #FF8A7A; font-size: 7pt">
							Nama yang tertera pada KIP milik peserta didik
						</div>
					</div> <!-- /controls -->			
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="terima_fisik_kip">Terima Fisik KIP <span style="color: red">*</span></label>
					<div class="controls">
						<input required type="radio" id="terima_fisik_kip" name="terima_fisik_kip" value="Ya" <?php if ($siswa['terima_fisik_kip'] == 'Ya') {echo 'checked="checked"';} ?>> Ya 
						<input required style="margin-left: 20px" type="radio" id="terima_fisik_kip" name="terima_fisik_kip" value="Tidak" <?php if ($siswa['terima_fisik_kip'] == 'Tidak') {echo 'checked="checked"';} ?>> Tidak
						<div style="color: #FF8A7A; font-size: 7pt">
							Status bahwa peserta didik sudah menerima atau belum menerima Kartu Indonesia Pintar secara fisik
						</div>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
				<br />

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan Data</button> 

				</div> <!-- /form-actions -->
			</fieldset>
		</form>



</div>


</div>





</div> <!-- /widget-content -->

</div> <!-- /widget -->

</div> <!-- /span8 -->




</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /main-inner -->

</div> <!-- /main -->

