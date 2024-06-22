<style>
    .kiri {
        text-align: left !important;
        
    }
</style>
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
                        <a href="#">Sekolah</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Sekolah</div>
                        </div>
                        <?= form_open('admin/us');?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="nama_sekolah" class="kiri">Nama Sekolah</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control input-full" name="nama_sekolah" id="nama_sekolah" placeholder="Masukkan nama sekolah" value="<?= $sekolah['nama_sekolah'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="alamat" class="kiri">Alamat Sekolah</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control input-full" name="alamat" id="alamat" placeholder="Masukkan alamat sekolah" value="<?= $sekolah['alamat'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="kota" class="kiri">Kota alamat Sekolah</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control input-full" name="kota" id="kota" placeholder="Masukkan alamat kota sekolah" value="<?= $sekolah['kota'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="provinsi" class="kiri">Provinsi alamat Sekolah</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control input-full" name="provinsi" id="provinsi" placeholder="Masukkan alamat provinsi sekolah" value="<?= $sekolah['provinsi'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="email_sekolah" class="kiri">Email Sekolah</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control input-full" name="email_sekolah" id="email_sekolah" placeholder="Masukkan alamat email sekolah sekolah" value="<?= $sekolah['email_sekolah'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="tlp_sekolah" class="kiri">Telp Sekolah</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control input-full" name="tlp_sekolah" id="tlp_sekolah" placeholder="Masukkan nomor tlp sekolah" value="<?= $sekolah['tlp_sekolah'];?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success ">Simpan Data</button>
                        </div>
                        <?= form_close() ;?>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Logo Sekolah</div>
                        </div>
                        <div class="card-body text-center">
                            <img style="width:150px" src="<?= site_url('assets/images/logo/'.$sekolah['logo']);?>" alt="">
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('admin/upLogo') ;?>
                                <input type="file" name="logo" style="margin-bottom: 10px">
                                <button type="submit" class="btn btn-sm btn-success"> Upload</button>
                            <?= form_close() ;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>