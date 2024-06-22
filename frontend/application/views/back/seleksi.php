<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-warning-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Seleksi</h2>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="<?= base_url('./assets/FormatImport.xlsx');?>" target="_blank" class="btn btn-secondary btn-round">Unduh Format Import</a>
								<a href="<?= base_url('admin/resetseleksi');?>" class="btn btn-danger btn-round">Reset Seleksi</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Data Umum</div>
									<hr>
									<div class="body">
										<div style="padding: 0px" class="form-group row">
											<label class="col-md-6">Status Pendaftaran</label>
											<label class="col-md-6">: 
												<?php if ($status == '0') {
													echo 'Belum dibuka';
												} elseif ($status == '1') {
													echo 'Pendaftaran dibuka';
												} elseif ($status == '2') {
													echo 'Pendaftaran ditutup';
												} elseif ($status == '3') {
													echo 'Pengumuman hasil';
												} elseif ($status == '4') {
													echo 'Daftar Ulang';
												} elseif ($status == '5') {
													echo 'PPDB berakhir';
												}
												 ;?>
											</label>
										</div>
										<hr>
										<div style="padding: 0px" class="form-group row">
											<label class="col-md-9">Jumlah pendaftar keseluruhan</label>
											<label class="col-md-3">: <?= $semua ;?> orang</label>
										</div>
										<div style="padding: 0px" class="form-group row">
											<label class="col-md-9">Jumlah pendaftar melengkapi data</label>
											<label class="col-md-3">: <?= $lengkap ;?> orang</label>
										</div>
										<div style="padding: 0px" class="form-group row">
											<label class="col-md-9">Jumlah pendaftar divalidasi</label>
											<label class="col-md-3">: <?= $valid ;?> orang</label>
										</div>
										<hr>
										<div style="padding: 0px" class="form-group row">
											<label class="col-md-9">Jumlah pendaftar diterima</label>
											<label class="col-md-3">: <?= $diterima ;?> orang</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Upload data hasil seleksi</div>
									<hr>
									<div class="body">
										<?= form_open_multipart('admin/importhasilseleksi') ;?>
											<input type="file" name="file" id="file" required><br><br>
											<button type="submit" class="btn btn-success">Unggah</button>
										<?= form_close() ;?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>