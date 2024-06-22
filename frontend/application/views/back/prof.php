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
                        <a href="#">Pengguna</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Pengaturan Pengguna</div>
                        </div>
                        <?= form_open('admin/up');?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="nama" class="kiri">Nama Pengguna</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control input-full" name="nama" id="nama" placeholder="Masukkan nama pengguna" value="<?= $user->nama;?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="email" class="kiri">Email Pengguna</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="email" class="form-control input-full" name="email" id="email" placeholder="Masukkan email login" value="<?= $user->xemail;?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="passLama" class="kiri">Password Lama</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="password" class="form-control input-full" name="passLama" id="passLama" placeholder="Masukkan password lama">
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="col-md-4 row">
                                            <label for="passBaru" class="kiri">Password Baru</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="text" class="form-control input-full" name="passBaru" id="passBaru" placeholder="Masukkan password baru">
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
            </div>
        </div>
    </div>