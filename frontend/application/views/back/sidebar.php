<?php $menu = $this->uri->segment(2);?> 
    <!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?= site_url('assets/images/logo/'.$sekolah['logo']);?>" alt="..." class="avatar-img">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $user->nama ;?>
									<span class="user-level">Administrator</span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?php if ($menu == '') { echo 'active';} ?> ">
							<a href="<?= base_url('admin');?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
                        </li>
                        
                        <li class="nav-item <?php if ($menu == 'sekolah' || $menu == 'informasi' || $menu == 'atur' ) { echo 'active';} ?>">
							<a data-toggle="collapse" href="#pengaturan">
								<i class="fas fa-cogs"></i>
								<p>Pengaturan</p>
								<span class="caret"></span>
							</a>
							<div class="<?php if ($menu != 'sekolah' && $menu != 'informasi' && $menu != 'atur') { echo 'collapse';} ?>" id="pengaturan">
								<ul class="nav nav-collapse">
									<li <?php if ($menu == 'sekolah') { echo 'class="active"'; } ;?>>
										<a href="<?= base_url('admin/sekolah');?>">
											<span class="sub-item">Sekolah</span>
										</a>
									</li>
									<li <?php if ($menu == 'atur') { echo 'class="active"'; } ;?>>
										<a href="<?= base_url('admin/atur');?>">
											<span class="sub-item">Pengaturan PPDB</span>
										</a>
                                    </li>
									<li <?php if ($menu == 'informasi') { echo 'class="active"'; } ;?>>
										<a href="<?= base_url('admin/informasi');?>">
											<span class="sub-item">Informasi PPDB</span>
										</a>
                                    </li>
								</ul>
							</div>
                        </li>
                        
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Client</h4>
						</li>
						<li class="nav-item <?php if ($menu == 'registrasi' || $menu == 'seleksi' || $menu == 'daftarUlang' ) { echo 'active';} ?>">
							<a data-toggle="collapse" href="#daftar">
								<i class="fas fa-layer-group"></i>
								<p>Data Pendaftar</p>
								<span class="caret"></span>
							</a>
							<div class="<?php if ($menu != 'registrasi' && $menu != 'seleksi' && $menu != 'daftarUlang') { echo 'collapse';} ?>" id="daftar">
								<ul class="nav nav-collapse">
									<li <?php if ($menu == 'registrasi') { echo 'class="active"'; } ;?>>
										<a href="<?= base_url('admin/registrasi');?>">
											<span class="sub-item">Pendaftar</span>
										</a>
									</li>
									<li <?php if ($menu == 'seleksi') { echo 'class="active"'; } ;?>>
										<a href="<?= base_url('admin/seleksi');?>">
											<span class="sub-item">Seleksi</span>
										</a>
                                    </li>
									<li <?php if ($menu == 'daftarUlang') { echo 'class="active"'; } ;?>>
										<a href="<?= base_url('admin/daftarUlang');?>">
											<span class="sub-item">Daftar Ulang</span>
										</a>
                                    </li>
								</ul>
							</div>
                        </li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->