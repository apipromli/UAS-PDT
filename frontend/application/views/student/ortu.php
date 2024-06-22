
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
					<?= form_open('siswa/simpanortu', 'class="form-horizontal"') ;?>
						<fieldset>
							<div class="control-group" >
								<label for="" style="width: 160px" class="control-label"></label>
								<div class="control" style="background-color: #00C089; padding: 5px 0">
									<h4>Data Ayah Kandung</h4>
								</div>
							</div>

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nama_ayah_kandung">Nama Ayah Kandung <span style="color: red">*</span></label>
								<div class="controls">
									<input type="text" class="span6" id="nama_ayah_kandung" name="nama_ayah_kandung" value="<?php echo $siswa['nama_ayah_kandung'] ?>" placeholder="Isikan nama ayah kandung" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nik_ayah">NIK Ayah Kandung <span style="color: red">*</span></label>
								<div class="controls">
									<input type="number" class="span6" id="nik_ayah" name="nik_ayah" value="<?php echo $siswa['nik_ayah'] ?>" placeholder="Isikan nik ayah kandung" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="tahun_lahir_ayah">Tahun Lahir Ayah <span style="color: red">*</span></label>
								<div class="controls">
									<input type="number" class="span3" id="tahun_lahir_ayah" name="tahun_lahir_ayah" value="<?php echo $siswa['tahun_lahir_ayah'] ?>" placeholder="Isikan tahun lahir ayah" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="pendidikan_ayah">Pendidikan Ayah <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="pendidikan_ayah" id="pendidikan_ayah" class="span3">
										<option value="">-- pilih --</option>
										<?php foreach ($pendidikan as $pend): ?>
											<option <?php if ($pend[1] == $siswa['pendidikan_ayah']) {echo 'selected';} ;?> ><?php echo $pend[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="pekerjaan_ayah">Pekerjaan Ayah <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="pekerjaan_ayah" id="pekerjaan_ayah" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($pekerjaan as $peker): ?>
											<option <?php if ($peker[1] == $siswa['pekerjaan_ayah']) {echo 'selected';} ;?> ><?php echo $peker[1] ?></option>
										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="penghasilan_ayah">Penghasilan Bulanan <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="penghasilan_ayah" id="penghasilan_ayah" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($penghasilan as $hasil): ?>
											<option <?php if ($hasil[1] == $siswa['penghasilan_ayah']) {echo 'selected';} ;?>><?php echo $hasil[1] ?></option>
										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="kebutuhan_khusus_ayah">Berkebutuhan Khusus <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="kebutuhan_khusus_ayah" id="kebutuhan_khusus_ayah" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($inklusi as $inkl): ?>

											<option <?php if ($inkl[0] == $siswa['kebutuhan_khusus_ayah']) {echo 'selected';} ;?> value="<?php echo $inkl[0] ?>"><?php echo $inkl[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group" style="margin-top: 20px">
								<label for="" style="width: 160px" class="control-label"></label>
								<div class="control" style="background-color: #00C089; padding: 5px 0">
									<h4>Data Ibu Kandung</h4>
								</div>
							</div>

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nama_ibu_kandung">Nama Ibu Kandung <span style="color: red">*</span></label>
								<div class="controls">
									<input type="text" class="span6" id="nama_ibu_kandung" name="nama_ibu_kandung" value="<?php echo $siswa['nama_ibu_kandung'] ?>" placeholder="Isikan nama ibu kandung" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nik_ibu">NIK Ibu Kandung </label>
								<div class="controls">
									<input type="number" class="span6" id="nik_ibu" name="nik_ibu" value="<?php echo $siswa['nik_ibu'] ?>" placeholder="Isikan nik ibu kandung" >
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="tahun_lahir_ibu">Tahun Lahir Ibu <span style="color: red">*</span></label>
								<div class="controls">
									<input type="number" class="span3" id="tahun_lahir_ibu" name="tahun_lahir_ibu" value="<?php echo $siswa['tahun_lahir_ibu'] ?>" placeholder="Isikan tahun lahir ibu" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="pendidikan_ibu">Pendidikan Ibu <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="pendidikan_ibu" id="pendidikan_ibu" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($pendidikan as $pend): ?>
											<option  <?php if ($pend[1] == $siswa['pendidikan_ibu']) {echo 'selected';} ;?>><?php echo $pend[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="pekerjaan_ibu">Pekerjaan Ibu <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="pekerjaan_ibu" id="pekerjaan_ibu" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($pekerjaan as $peker): ?>
											<option <?php if ($peker[1] == $siswa['pekerjaan_ibu']) {echo 'selected';} ;?>><?php echo $peker[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="penghasilan_ibu">Penghasilan Bulanan <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="penghasilan_ibu" id="penghasilan_ibu" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($penghasilan as $hasil): ?>
											<option <?php if ($hasil[1] == $siswa['penghasilan_ibu']) {echo 'selected';} ;?>><?php echo $hasil[1] ?></option>
										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="kebutuhan_khusus_ibu">Berkebutuhan Khusus <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="kebutuhan_khusus_ibu" id="kebutuhan_khusus_ibu" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($inklusi as $inkl): ?>

											<option <?php if ($inkl[1] == $siswa['kebutuhan_khusus_ibu']) {echo 'selected';} ;?>><?php echo $inkl[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

								<div class="control-group" style="margin-top: 20px">
								<label for="" style="width: 160px" class="control-label"></label>
								<div class="control" style="background-color: #00C089; padding: 5px 0">
									<h4>Data Wali</h4>
								</div>
							</div>

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nama_wali">Nama Wali </label>
								<div class="controls">
									<input type="text" class="span6" id="nama_wali" name="nama_wali" value="<?php echo $siswa['nama_wali'] ?>" placeholder="Isikan nama wali" >
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nik_wali">NIK Wali </label>
								<div class="controls">
									<input type="number" class="span6" id="nik_wali" name="nik_wali" value="<?php echo $siswa['nik_wali'] ?>" placeholder="Isikan nik Wali" >
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="tahun_lahir_wali">Tahun Lahir Wali </label>
								<div class="controls">
									<input type="number" class="span3" id="tahun_lahir_wali" name="tahun_lahir_wali" value="<?php echo $siswa['tahun_lahir_wali'] ?>" placeholder="Isikan tahun lahir wali">
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="pendidikan_wali">Pendidikan Wali </label>
								<div class="controls">
									<select name="pendidikan_wali" id="pendidikan_wali" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($pendidikan as $pend): ?>
											<option <?php if ($pend[1] == $siswa['pendidikan_wali']) {echo 'selected';} ;?>><?php echo $pend[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="pekerjaan_wali">Pekerjaan Wali </label>
								<div class="controls">
									<select  name="pekerjaan_wali" id="pekerjaan_wali" class="span3">
									<option value="">-- pilih --</option>
										<?php foreach ($pekerjaan as $peker): ?>
											<option <?php if ($peker[1] == $siswa['pekerjaan_wali']) {echo 'selected';} ;?>><?php echo $peker[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="penghasilan_wali">Penghasilan Bulanan </label>
								<div class="controls">
									<select name="penghasilan_wali" id="penghasilan_wali" class="span3">
										<option value="">-- pilih --</option>
										<?php foreach ($penghasilan as $hasil): ?>
											<option <?php if ($hasil[1] == $siswa['penghasilan_wali']) {echo 'selected';} ;?>><?php echo $hasil[1] ?></option>
										<?php endforeach ?>
									</select>
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

