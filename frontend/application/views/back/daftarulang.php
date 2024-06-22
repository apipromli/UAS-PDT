<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data</h4>
                <ul class="breadcrumbs">
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Daftar Ulang</a>
                    </li>
                </ul>
            </div>
            <!-- JADWAL KEGIATAN -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Daftar Ulang</div>
                            <div style="top: 15px; right: 10px;  position: absolute">
                                <?= form_open('admin/daftarulang');?>
                                    <input type="text" class="form-control" name="cari">
                                <?= form_close() ;?>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Nisn</th>
                                        <th>Jurusan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($registrasi->num_rows() > 0): ?>

                                    <?php $no = 1; foreach ($registrasi->result() as $reg) :?>
                                        <tr>
                                            <td><?= ++$start; ?></td>
                                            <td><?= $reg->nama ;?></td>
                                            <td><?= $reg->nisn ;?></td>
                                            <td><?= $reg->jur ;?></td>
                                            <td nowrap>
                                                <?php if ($reg->ekskul !='') { echo '<span class="badge badge-success">Pribadi</span>';} ;?>
                                                <?php if ($reg->nama_ayah_kandung !='') { echo '<span class="badge badge-primary">Ortu</span>';} ;?>
                                                <?php if ($reg->terima_kps !='') { echo '<span class="badge badge-warning">Ekonomi</span>';} ;?>
                                                <?php if ($reg->berat_badan !='') { echo '<span class="badge badge-danger">Periodik</span>';} ;?>

                                            </td>
                                        </tr>
                                    <?php endforeach ;?>

                                    <?php else :?>

                                      <tr>
                                        <td colspan="10">
                                        Data tidak ditemukan
                                        </td>
                                      </tr>
                                    <?php endif;?>

                                </tbody>
                            </table>
                        </div>
                        <?= form_close();?>
                        <div class="card-action">
                            <?php echo $this->pagination->create_links(); ;?>
                            <div style="bottom: 15px; right: 10px;  position: absolute">
                                <a href="<?=base_url('admin/downDU');?>" class="btn btn-sm btn-success"> DoWnLoAd DaTa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AKHIR JADWAL KEGIATAN -->
        </div>
        </div>
    </div>


<!-- modal ubah jadwal  -->
    <div class="modal fade" id="modalUbahData">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Jadwal Kegiatan</h4>
                </div>
                <?= form_open('admin/uData', 'id="fUData"');?>
                <input type="hidden" name="id">
                <input type="hidden" name="token">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">NISN</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="nisn" class="form-control" value="">
                        </div>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    <button type="button" class="btn btn-default btn-sm tutup">Close</button>
                </div>
                <?= form_close() ;?>
            </div>
        </div>
    </div>
<!-- akhir modal ubah jadwal -->




    