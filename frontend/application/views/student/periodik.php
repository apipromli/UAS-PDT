
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
	<div class="tab-pane active" id="formcontrols">

			<?= form_open('siswa/simpanperiodik', 'class="form-horizontal"') ;?>
			<fieldset>
				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="tinggi_badan">Tinggi badan <span style="color: red">*</span></label>
					<div class="controls">
						<table>
							<tr>
								<td>
									<input type="number" class="span2" id="tinggi_badan" name="tinggi_badan" value="<?php echo $siswa['tinggi_badan'] ?>" placeholder="Dalam cm" required>
								</td>
								<td>
									Cm
								</td>
							</tr>
						</table>
						 
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="berat_badan">Berat badan <span style="color: red">*</span></label>
					<div class="controls">
						<table>
							<tr>
								<td>
									<input type="number" class="span2" id="berat_badan" name="berat_badan" value="<?php echo $siswa['berat_badan'] ?>" placeholder="Dalam Kg" required>
								</td>
								<td>
									Kg
								</td>
							</tr>
						</table>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="jenis_jarak">Jarak Rumah ke Sekolah <span style="color: red">*</span></label>
					<div class="controls">
						<input required type="radio" id="jenis_jarak" name="jenis_jarak" value="Kurang dari 1 km" <?php if ($siswa['jenis_jarak'] == 'Kurang dari 1 km') {echo 'checked="checked"';} ?>> Kurang dari 1 km 
						<input required style="margin-left: 20px" type="radio" id="jenis_jarak" name="jenis_jarak" value="Lebih dari 1 km" <?php if ($siswa['jenis_jarak'] == 'Lebih dari 1 km') {echo 'checked="checked"';} ?>> Lebih dari 1 km
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="jarak">Detail Jarak <span style="color: red">*</span></label>
					<div class="controls">
						<table>
							<tr>
								<td>
									<input type="number" class="span2" id="jarak" name="jarak" value="<?php echo $siswa['jarak'] ?>" placeholder="Dalam Km">
								</td>
								<td>
									Km
								</td>
							</tr>
						</table>
						
						<div style="color: #FF8A7A; font-size: 7pt">
							Apabila jarak rumah peserta didik ke sekolah lebih dari 1 km, isikan dengan angka jarak yang sebenarnya pada kolom ini dalam satuan kilometer. Diisi dengan bilangan bulat (bukan pecahan)
						</div>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="waktu_jam">Waktu Tempuh ke Sekolah <span style="color: red">*</span></label>
					<div class="controls">
						<table>
							<tr>
								<td>
									<input type="number" class="span1" id="waktu_jam" name="waktu_jam" value="<?php echo $siswa['waktu_jam'] ?>" placeholder="Dalam Jam" required>
								</td>
								<td>
									Jam
								</td>
								<td width="20px"> </td>
								<td>
									<input type="number" class="span1" id="waktu_menit" name="waktu_menit" value="<?php echo $siswa['waktu_menit'] ?>" placeholder="Dalam Menit" required>
								</td>
								<td>
									Menit
								</td>
							</tr>
						</table>
						
						<div style="color: #FF8A7A; font-size: 7pt">
							Lama tempuh peserta didik ke sekolah. Kolom kiri adalah jam, kolom kanan adalah menit. Misalnya, peserta didik memerlukan waktu tempuh 1 jam 15 menit, maka kotak kiri diisi 1 sedangkan kanan diisi 15. Apabila memerlukan waktu 25 menit, maka kotak kiri diisi 0 sedangkan kanan diisi 25
						</div>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" style="width: 150px" for="jumlah_saudara">Jumlah Saudara Kandung <span style="color: red">*</span></label>
					<div class="controls">
						<input type="number" class="span2" name="jumlah_saudara" id="jumlah_saudara" value="<?php echo $siswa['jumlah_saudara'] ?>" placeholder="Jumlah Saudara" required>
						<div style="color: #FF8A7A; font-size: 7pt">
							Jumlah saudara kandung yang dimiliki peserta didik. Jumlah saudara kandung dihitung tanpa menyertakan peserta didik, dengan rumus jumlah kakak ditambah jumlah adik. Isikan 0 apabila anak tunggal.
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


</div>





</div> <!-- /widget-content -->

</div> <!-- /widget -->

</div> <!-- /span8 -->




</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /main-inner -->

</div> <!-- /main -->

