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
                        <a href="#">Informasi PPDB</a>
                    </li>
                </ul>
            </div>
            <!-- JADWAL KEGIATAN -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Jadwal Kegiatan</div>
                            <div style="top: 15px; right: 10px;  position: absolute" class="pull-right">
                            <a href="#modalTambahJadwal" data-toggle="modal" class="btn btn-primary btn-sm" style="margin-right:10px"><i class="fa fa-plus"></i>  tambah</a>
                            <a href="<?= base_url('admin/kosong/jadwal');?>" class="btn btn-danger btn-sm tombolHapus"><i class="fa fa-trash"></i> hapus semua</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kegiatan</th>
                                        <th>Dibuka</th>
                                        <th>Ditutup</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($jadwal as $jd) :?>
                                        <tr>
                                            <td><?= $no++ ;?></td>
                                            <td><?= $jd->kegiatan ;?></td>
                                            <td><?= $jd->dibuka ;?></td>
                                            <td><?= $jd->ditutup ;?></td>
                                            <td nowrap>
                                                <a  href='#' data-token="<?= $this->security->get_csrf_hash() ;?>" data-id="<?= $jd->id ;?>" class="badge badge-info ubah" >Ubah</a>
                                                <a href="<?= base_url('admin/hapus/jadwal/'.$jd->id);?>" class="badge badge-warning tombolHapus">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AKHIR JADWAL KEGIATAN -->

            <!-- SLIDE HALAMAN UTAMA -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Slide Halaman utama</div>
                            <div style="top: 15px; right: 10px;  position: absolute" class="pull-right">
                            <a href="#modalTambahSlide" data-toggle="modal" class="btn btn-primary btn-sm" style="margin-right:10px"><i class="fa fa-plus"></i>  tambah</a>
                            <a href="<?= base_url('admin/kosong/slide');?>" class="btn btn-danger btn-sm tombolHapus"><i class="fa fa-trash"></i> hapus semua</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Text</th>
                                        <th>Gambar</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($slide as $sld) :?>
                                        <tr>
                                            <td><?= $no++ ;?></td>
                                            <td><?= $sld->judul ;?></td>
                                            <td><?= $sld->text ;?></td>
                                            <td>
                                            <img style="width:50px" src="<?= site_url('assets/images/slide/'.$sld->gambar);?>" alt="">
                                            </td>
                                            <td nowrap>
                                                <a  href='#' data-token="<?= $this->security->get_csrf_hash() ;?>" data-id="<?= $sld->id ;?>" class="badge badge-info ubahSlide" >Ubah</a>
                                                <a href="<?= base_url('admin/hapus/slide/'.$sld->id);?>" class="badge badge-warning tombolHapus">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AKHIR JADWAL KEGIATAN -->
        </div>
        </div>
    </div>


<!-- modal ubah jadwal  -->
    <div class="modal fade" id="modalUbahJadwal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Jadwal Kegiatan</h4>
                </div>
                <?= form_open('admin/uJadwal', 'id="fUJadwal"');?>
                <input type="hidden" name="id">
                <input type="hidden" name="token">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Kegiatan</label>
                        </div>
                        <div class="col-sm-8">
                            <textarea name="kegiatan" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Dibuka</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="dibuka" class="form-control" value="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Ditutup</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="ditutup" class="form-control" value="">
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
<div class="modal fade" id="modalTambahJadwal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Jadwal Kegiatan</h4>
            </div>
            <?= form_open('admin/tJadwal');?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Kegiatan</label>
                    </div>
                    <div class="col-sm-8">
                        <textarea name="kegiatan" class="form-control" rows="2" placeholder="Nama kegiatan"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Dibuka</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="dibuka" class="form-control" value="" placeholder="Kegiatan dibuka">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Ditutup</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="ditutup" class="form-control" value="" placeholder="Kegiatan ditutup">
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

<!-- modal tambah slide  -->
<div class="modal fade" id="modalTambahSlide">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Slider</h4>
            </div>
            <?= form_open_multipart('admin/tSlide');?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Judul</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control" value="" placeholder="Text Judul">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Text</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea name="text" class="form-control" rows="3" placeholder="Text Slide"></textarea>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Gambar</label>
                    </div>
                    <div class="col-sm-10">
                       <input type="file" name="slide" >
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
<!-- akhir modal tambah slide -->

<!-- modal ubah slide  -->
<div class="modal fade" id="modalUbahSlide">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Slider</h4>
            </div>
            <?= form_open_multipart('admin/uSlide', 'id="formUbahSlide"');?>
            <input type="hidden" name="id">
            <input type="hidden" name="token">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Judul</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control" value="" placeholder="Text Judul">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Text</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea name="text" class="form-control" rows="3" placeholder="Text Slide"></textarea>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Gambar</label>
                    </div>
                    <div class="col-sm-10">
                       <input type="file" name="slide" >
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
<!-- akhir modal tambah slide -->


    