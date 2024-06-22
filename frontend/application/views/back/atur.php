<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengaturan</h4>
                <ul class="breadcrumbs">
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">PPDB</a>
                    </li>
                </ul>
            </div>
            <!-- JADWAL KEGIATAN -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Jurusan</div>
                            <div style="top: 15px; right: 10px;  position: absolute" class="pull-right">
                            <a href="#modalTambahJurusan" data-toggle="modal" class="btn btn-primary btn-sm" style="margin-right:10px"><i class="fa fa-plus"></i>  tambah</a>
                            <a href="<?= base_url('admin/kosongx/jurusan');?>" class="btn btn-danger btn-sm tombolHapus"><i class="fa fa-trash"></i> hapus semua</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Jurusan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($jurusan as $jr) :?>
                                        <tr>
                                            <td><?= $no++ ;?></td>
                                            <td><?= $jr->namaJurusan ;?></td>
                                            <td nowrap>
                                                <a  href='#' data-token="<?= $this->security->get_csrf_hash() ;?>" data-id="<?= $jr->id ;?>" class="badge badge-info ubahjur" >Ubah</a>
                                                <a href="<?= base_url('admin/hapusx/jurusan/'.$jr->id);?>" class="badge badge-warning tombolHapus">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ;?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">File Panduan</div>
                        </div>
                        <div class="card-body">
                        <?= form_open_multipart('admin/uppan') ;?>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Pilih file</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="panduan">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-sm"> Upload</button>
                                </div>
                                <div class="col-md-3">
                                    <a target="_blank" href="<?= base_url('assets/').$sekolah['panduan'];?>">
                                    <span class="fa fa-download"> Download</span>
                                    </a>
                                </div>
                            </div>
                        <?= form_close() ;?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Buka Tutup Pendaftaran dan Email Server</div>
                        </div>
                        <?= form_open('admin/stat');?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Jadwal Saat Ini</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="bt" id="bt" class="form-control">
                                        <option <?php if ($sekolah['bt'] == '0') {echo 'selected'; } ;?> value="0">Belum Buka</option>
                                        <option <?php if ($sekolah['bt'] == '1') {echo 'selected'; } ;?> value="1">Buka Pendaftaran</option>
                                        <option <?php if ($sekolah['bt'] == '2') {echo 'selected'; } ;?> value="2">Tutup Pendaftaran</option>
                                        <option <?php if ($sekolah['bt'] == '3') {echo 'selected'; } ;?> value="3">Pengumuman Hasil</option>
                                        <option <?php if ($sekolah['bt'] == '4') {echo 'selected'; } ;?> value="4">Daftar Ulang</option>
                                        <option <?php if ($sekolah['bt'] == '5') {echo 'selected'; } ;?> value="5">Tutup Kegiatan</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Email Server</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="kirim_mail" class="form-control" value="<?= $sekolah['kirim_mail'];?>">
                                    <small class="text-info">Alamat email</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Password Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" name="pass_mail" class="form-control" value="<?= base64_decode($sekolah['pass_mail']);?>">
                                    <small class="text-info">Password email</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">SMTP Host</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="smtp_host" class="form-control" value="<?= $sekolah['smtp_host'];?>">
                                    <small class="text-info">smtp gmail: smtp.gmail.com</small>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">SMTP Port</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="smtp_port" class="form-control" value="<?= $sekolah['smtp_port'];?>">
                                    <small class="text-info">port gmail: 465</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                        <?= form_close() ;?>
                    </div>
                </div>
            </div>
            <!-- AKHIR JADWAL KEGIATAN -->
        </div>
    </div>
</div>


<!-- modal ubah jadwal  -->
    <div class="modal fade" id="modalUbahJurusan">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Jurusan</h4>
                </div>
                <?= form_open('admin/uJurusan', 'id="fUJurusan"');?>
                <input type="hidden" name="id">
                <input type="hidden" name="token">
                <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="">Nama Jurusan</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="namaJurusan" class="form-control" value="" placeholder="Nama Jurusan">
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

<!-- modal tambah jadwal  -->
<div class="modal fade" id="modalTambahJurusan">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Jurusan</h4>
            </div>
            <?= form_open('admin/tJurusan');?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="">Nama Jurusan</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="namaJurusan" class="form-control" value="" placeholder="Nama Jurusan">
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
<!-- akhir modal tambah jadwal -->




    