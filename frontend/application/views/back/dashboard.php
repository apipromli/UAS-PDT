<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">Pendaftaran Peserta Didik Baru</h5>
							</div>
							
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">

						<div class="col-md-3">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Jumlah Pendaftar</div>
									<div class="row py-3">
										<div class="col-md-12 d-flex flex-column justify-content-around">
											<div>
												<h3 class="fw-bold"><?= $jDaftar ;?> Orang</h3>
											</div>
											
										</div>
										
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Data Lengkap</div>
									<div class="row py-3">
										<div class="col-md-12 d-flex flex-column justify-content-around">
											<div>
												<h3 class="fw-bold"><?= $jLengkap ;?> Orang</h3>
											</div>
											
										</div>
										
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Berkas Lengkap</div>
									<div class="row py-3">
										<div class="col-md-12 d-flex flex-column justify-content-around">
											<div>
												<h3 class="fw-bold"><?= $jBerkas ;?> Orang</h3>
											</div>
											
										</div>
										
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Diverifikasi</div>
									<div class="row py-3">
										<div class="col-md-12 d-flex flex-column justify-content-around">
											<div>
												<h3 class="fw-bold"><?= $jValid ;?> Orang</h3>
											</div>
											
										</div>
										
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Informasi Umum</div>
									</div>
								</div>
								<div class="card-body">
									<p>Status Pendaftaran : <?php if ($stat == '0') { echo 'Pendaftaran Belum Dibuka' ;} elseif ($stat == '1') { echo 'Pendaftaran Dibuka'; } elseif ($stat == '2') { echo 'Pendaftaran Ditutup'; } elseif ($stat == '3') { echo 'Pengumuman Hasil Seleksi'; } elseif ($stat == '4') { echo 'Daftar Ulang Peserta Didik Lolos Seleksi'; } elseif ($stat == '5') { echo 'Kegiatan PPDB Selesai'; }?></p>

									<h5>Alur pendaftaran peserta didik baru adalah sebagai berikut :</h5>
									<ol>
										<li>Administrator membuka pengaturan pendaftaran</li>
										<li>Calon peserta didik melakukan pendaftaran</li>
										<li>Calon peserta didik melengkapi data dan berkas pendaftaran</li>
										<li>Administrator melakukan verivikasi data dan berkas</li>
										<li>Administrator menutup proses pendaftaran</li>
										<li>Administrator mengunduh data pendaftar</li>
										<li>Sekolah melakukan seleksi secara manual</li>
										<li>Administrator mengunggah hasil seleksi</li>
										<li>Administrator membuka pengumuman hasil seleksi</li>
										<li>Calon peserta didik mengecek hasil seleksi melalui halaman pengumuman</li>
										<li>Administrator membuka kegiatan daftar ulang</li>
										<li>Peserta didik melakukan daftar ulang</li>
										<li>Administrator mengunduh data hasil daftar ulang</li>
										<li>Administrator menutup kegiatan PPDB</li>
									</ol>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>