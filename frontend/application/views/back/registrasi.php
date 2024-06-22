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
                        <a href="#">Pendaftar</a>
                    </li>
                </ul>
            </div>
            <!-- JADWAL KEGIATAN -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Data Pendaftar</div>
                            <div style="top: 15px; right: 10px;  position: absolute">
                                <?= form_open('admin/registrasi');?>
                                    <input type="text" class="form-control" name="cari">
                                <?= form_close() ;?>
                            </div>
                            <div style="top: 15px; right: 10px" >
                                <?= form_open('admin/validAll') ;?>
                               
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Nisn</th>
                                        <th>Jurusan 1</th>
                                        <th>Jurusan 2</th>
                                        <th>Akademik</th>
                                        <th>Non-Akd</th>
                                        <th class="text-center"><button type="submit" class="badge badge-success">Validasi</button>
                                        <input type="checkbox" name="master_check" id="master_check"></th>
                                        <input type="hidden" name="page" value="<?php echo $this->uri->segment(3);?>">
                                        <th>Berkas</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($registrasi->num_rows() > 0): ?>

                                    <?php $no = 1; foreach ($registrasi->result() as $reg) :?>
                                        <tr>
                                            <td><?= ++$start; ?></td>
                                            <td><?= $reg->nama ;?></td>
                                            <td><?= $reg->nisn ;?></td>
                                            <td><?= $reg->jurusan1 ;?></td>
                                            <td><?= $reg->jurusan2 ;?></td>
                                            <td><?= $reg->sum ;?></td>
                                            <td>
                                                <?php 
                                                    if ($reg->tingkat_prestasi !='' && $reg->juara_prestasi !='' && $reg->bidang_prestasi !='' && $reg->nama_prestasi !='') {
                                                        echo 'Juara '.$reg->juara_prestasi.' tingkat '.$reg->tingkat_prestasi.' '.$reg->nama_prestasi;
                                                    } else {
                                                        echo '-';
                                                    }
                                                    
                                                ;?>
                                            </td>
                                            <td class="text-center" nowrap>
                                                <input type="checkbox" <?php if ($reg->valid == '1') { echo 'checked';} ;?> name="valid[]" id="valid" value="<?=$reg->id;?>"> | 
                                                <a href="<?= base_url('admin/resValid/').$reg->id;?>/<?= $this->uri->segment(3);?>" class="badge badge-warning" onclick="return confirm('reset validasi <?= $reg->nama;?> ?')">reset</a>
                                            </td>
                                            <td nowrap>
                                                <?php if ($reg->foto != ''):?>
                                                <img width="20px" src="<?= base_url('uploads/foto/'.$reg->foto);?>" alt="Foto" />&nbsp;&nbsp;
                                                <?php endif ;?>
                                                
                                                <?php if ($reg->bukti_kk != ''):?>
                                                <a href="<?= base_url().'./uploads/kk/'.$reg->bukti_kk;?>"><i class="fa fa-eye"></i> kk</a>&nbsp;&nbsp;
                                                <?php endif ;?>

                                                <?php if ($reg->bukti_raport != ''):?>
                                                <a href="<?= base_url().'./uploads/raport/'.$reg->bukti_raport;?>"><i class="fa fa-eye"></i> raport</a>&nbsp;&nbsp;
                                                <?php endif ;?>

                                                <?php if ($reg->bukti_prestasi != ''):?>
                                                <a href="<?= base_url().'./uploads/prestasi/'.$reg->bukti_prestasi;?>"><i class="fa fa-eye"></i> piagam</a>&nbsp;&nbsp;
                                                <?php endif ;?>

                                            </td>
                                            <td nowrap>
                                                <a  href='#' data-id="<?= $reg->id ;?>" class="badge badge-info ubahdata" >Ubah</a>
                                                <a href="<?= base_url('admin/hapusr/registrasi/'.$reg->id);?>" class="badge badge-warning tombolHapus">Hapus</a>
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
                                <a href="<?= base_url('admin/validasiSemua/'.$this->uri->segment(3));?>" class="btn btn-sm btn-primary vaidasisemua">VaLiDaSi SeMuA</a>
                                <a href="<?=base_url('admin/downValid');?>" class="btn btn-sm btn-success"> DoWnLoAd DaTa Valid</a>
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




    