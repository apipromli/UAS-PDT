
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
						<?= form_open('siswa/simpanpribadi', 'class="form-horizontal"') ;?>
							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nis">NISN</label>
								<div class="controls">
									<input type="text" class="span6 disabled" name="nis" id="nis" value="<?php echo $siswa['nisn'] ?>" disabled>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nama">Nama Lengkap <span style="color: red">*</span></label>
								<div class="controls">
									<input type="text" class="span6" id="nama" name="nama" value="<?php echo $siswa['nama'] ?>" placeholder="Isikan nama lengkap" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="jk">Jenis Kelamin <span style="color: red">*</span></label>
								<div class="controls">
									<input required type="radio" id="jk" name="jk" value="1" <?php if ($siswa['jk'] == '1') {echo 'checked="checked"';} ?>> laki-laki 
									<input required style="margin-left: 20px" type="radio" id="jk" name="jk" value="2" <?php if ($siswa['jk'] == '2') {echo 'checked="checked"';} ?>> perempuan
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="tempat_lahir">Tempat Lahir <span style="color: red">*</span></label>
								<div class="controls">
									<input type="text" class="span6" name="tempat_lahir" id="tempat_lahir" value="<?php echo $siswa['tempat_lahir'] ?>" placeholder="Isikan tempat lahir sesuai ijazah" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="tgl_lahir">Tanggal Lahir <span style="color: red">*</span></label>
								<div class="controls">
									<table>
										<tr>
											<td>
												<select required name="tgl_lahir" id="tgl_lahir" class="span1">
													<option  value="<?php echo $siswa['tgl_lahir'] ?>"><?php echo $siswa['tgl_lahir'] ?></option>
													<?php for ($i = 1; $i < 32 ; $i++) {
														echo '<option value="'.$i.'">'.$i.'</option>';
													} ?>
												</select>
											</td>
											<td>
												<span style="margin: 0 5px"> - </span>
											</td>
											<td>
												<select required name="bln_lahir" id="bln_lahir" class="span1">
													<option  value="<?php echo $siswa['bln_lahir'] ?>"><?php echo $siswa['bln_lahir'] ?></option>
													<?php for ($i = 1; $i < 13 ; $i++) {
														echo '<option value="'.$i.'">'.$i.'</option>';
													} ?>
												</select>
											</td>
											<td>
												<span style="margin: 0 5px"> - </span>
											</td>
											<td><input required type="number" class="span2" name="thn_lahir" id="thn_lahir" value="<?php echo $siswa['thn_lahir'] ?>">
											</td>
										</tr>
									</table>

								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nik">NIK <span style="color: red">*</span></label>
								<div class="controls">
									<input type="text" class="span6" name="nik" id="nik" value="<?php echo $siswa['nik'] ?>" placeholder="IIsikan induk kependudukan sesuai KTP atau KK" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="no_akta">No Akta Lahir</label>
								<div class="controls">
									<input type="text" class="span6" name="no_akta" id="no_akta" value="<?php echo $siswa['no_akta'] ?>" placeholder="Isikan nomor registrasi akta kelahiran">
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="agama">Agama <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="agama" id="agama" class="span2">
										<?php foreach ($agama as $agm): ?>
											<option <?php if ($siswa['agama'] == $agm[1]) { echo 'selected';} ;?> value="<?php echo $agm[1] ?>"><?php echo $agm[1] ?></option>
										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="kewarganegaraan">Kewarganegaraan <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="kewarganegaraan" id="kewarganegaraan" class="span3">
										<option value=""> -- Pilih Kewarganegaraan --</option>
										<option <?php if ($siswa['kewarganegaraan'] == 'WNI') {echo 'selected';} ;?>>WNI</option>
										<option <?php if ($siswa['kewarganegaraan'] == 'WNA') {echo 'selected';} ;?>>WNA</option>
									</select>
									<div style="color: #C06868">
										<span style="font-size: 7pt">WNI: Warga Negara Indonesia -- </span>
										<span style="font-size: 7pt">WNA: Warga Negara Asing</span>
									</div>

								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="inklusi">Berkebutuhan Khusus <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="inklusi" id="inklusi" class="span3">
										<?php foreach ($inklusi as $inkl): ?>

											<option <?php if ($siswa['inklusi'] == $inkl[0]) {echo 'selected';} ;?> value="<?php echo $inkl[0] ?>"><?php echo $inkl[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="alamat_jalan">Alamat</label>
								<div class="controls">
									<textarea name="alamat_jalan" id="alamat_jalan" cols="30" rows="2" class="span6" placeholder="Isikan nama jalan / blok"><?php echo $siswa['alamat_jalan'] ?></textarea>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="rt">RT <span style="color: red">*</span></label>
								<div class="controls">
									<table>
										<tr>
											<td>
												<input type="number" class="span1" id="rt" name="rt" value="<?php echo $siswa['rt'] ?>" placeholder="Isikan RT" required>
											</td>
											<td nowrap="">
												<span style="margin: 0 10px 0 25px">RW <i style="color:red">*</i></span>
											</td>
											<td>
												<input type="number" class="span1" id="rw" name="rw" value="<?php echo $siswa['rw'] ?>" placeholder="Isikan RW" required>
											</td>
										</tr>
									</table>

								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="dusun">Nama Dusun <span style="color: red">*</span></label>
								<div class="controls">
									<input type="text" class="span6" id="dusun" name="dusun" value="<?php echo $siswa['dusun'] ?>" placeholder="Isikan nama dusun tempat tinggal" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="desa">Nama Desa <span style="color: red">*</span></label>
								<div class="controls">
									<input type="text" class="span6" id="desa" name="desa" value="<?php echo $siswa['desa'] ?>" placeholder="Isikan nama desa tempat tinggal" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="kecamatan">Nama Kecamatan <span style="color: red">*</span></label>
								<div class="controls">
									<input type="text" class="span6" id="kecamatan" name="kecamatan" value="<?php echo $siswa['kecamatan'] ?>" placeholder="Isikan nama kecamatan tempat tinggal" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="kode_pos">Kode Pos <span style="color: red">*</span></label>
								<div class="controls">
									<input type="number" class="span3" id="kode_pos" name="kode_pos" value="<?php echo $siswa['kode_pos'] ?>" placeholder="Isikan kode pos tempat tinggal" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="transportasi">Transportasi <span style="color: red">*</span></label>
								<div class="controls">
									<select required name="transportasi" id="transportasi" class="span3">
										<option value="">-- Pilih transportasi --</option>
										<?php foreach ($transportasi as $trans): ?>

											<option <?php if ($siswa['transportasi'] == $trans[1]) { echo 'selected';} ;?>><?php echo $trans[1] ?></option>

										<?php endforeach ?>
									</select>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="anak_ke">Anak Ke <span style="color: red">*</span></label>
								<div class="controls">
									<input type="number" class="span1" id="anak_ke" name="anak_ke" value="<?php echo $siswa['anak_ke'] ?>" required>
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nomor_tlp">Nomor Tlp </label>
								<div class="controls">
									<input type="number" class="span4" id="nomor_tlp" name="nomor_tlp" value="<?php echo $siswa['nomor_tlp'] ?>" placeholder="Masukkan nomot tlp rumah (jika ada)">
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="nomor_hp">Nomor HP </label>
								<div class="controls">
									<input type="number" class="span4" id="nomor_hp" name="nomor_hp" value="<?php echo $siswa['nomor_hp'] ?>" placeholder="Masukkan nomor hp">
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="email">Alamat Email </label>
								<div class="controls">
									<input type="email" class="span4" id="email" name="email" value="<?php echo $siswa['email'] ?>" placeholder="Masukkan alamat email (jika ada)">
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<div class="control-group">											
								<label class="control-label" style="width: 150px" for="ekskul">Ekskul diminati <span style="color: red">*</span></label>
								<div class="controls">
									<input required type="text" class="span6" id="ekskul" name="ekskul" value="<?php echo $siswa['ekskul'] ?>" placeholder="Masukkan jenis ekskul yang akan diikuti atau pernah diikuti sebelumnya">
								</div> <!-- /controls -->				
							</div> <!-- /control-group -->

							<br />

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Simpan Data</button> 

							</div> <!-- /form-actions -->
						<?= form_close() ;?>
					</div>
				</fieldset>
			</div>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div> <!-- /span8 -->




</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /main-inner -->

</div> <!-- /main -->

