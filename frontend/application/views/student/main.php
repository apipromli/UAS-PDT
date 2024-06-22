<style>
    a:hover {
        text-decoration: none;
    }
    .form-control {
      width: 100%;
    }
</style>
<div class="main">
  <div class="main-inner">
    <?php if ($sekolah['bt'] == '1'): ?>
      <div class="container">
    
    <div class="row">
        <div class="span12">
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
      <div class="widget widget-nopad">
        <div class="widget-header"> <i class="icon-list-alt"></i>
          <h3> Kelengkapan Data Pendaftar</h3>
          
        </div>
        <!-- /widget-header -->
        <div class="widget-content" style="padding: 10px">

          <div class="widget small-stats-container">
              <br>                 
            <?= form_open('siswa/lengkapidata', 'class="form-horizontal"');?>
              <fieldset>
              <div class="control-group">											
                  <label class="control-label" for="nomor_daftar">Nomor Pendfataran</label>
                  <div class="controls">
                    <input type="text" class="span4" value="<?= $siswa['nomor_daftar'];?>" readonly>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="nisn">NISN</label>
                  <div class="controls">
                    <input type="text" class="span4" value="<?= $siswa['nisn'];?>" readonly>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                
                <div class="control-group">											
                  <label class="control-label" for="nama">Nama Lengkap</label>
                  <div class="controls">
                    <input type="text" class="span7" name="nama" id="nama" value="<?= $siswa['nama'];?>" required>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                  <div class="controls">
                    <input type="text" class="span7" name="tempat_lahir" id="tempat_lahir" value="<?= $siswa['tempat_lahir'];?>" required>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="nama">Tanggal Lahir</label>
                  <div class="controls">
                    <table>
                      <tr>
                        <td>
                          <input type="text" class="span1" name="tgl_lahir" id="tgl_lahir" value="<?= $siswa['tgl_lahir'];?>" required> 
                        </td>
                        <td> - </td>
                        <td>
                          <input type="text" class="span1" name="bln_lahir" id="bln_lahir" value="<?= $siswa['bln_lahir'];?>" required>
                        </td>
                        <td> - </td>
                        <td>
                          <input type="text" class="span2" name="thn_lahir" id="thn_lahir" value="<?= $siswa['thn_lahir'];?>" required>
                        </td>
                      </tr>
                    </table>
                    <?php if (form_error('tgl_lahir')) {echo '<p>'.form_error('tgl_lahir').'</p>';} ;?>
                    <?php if (form_error('bln_lahir')) {echo '<p>'.form_error('bln_lahir').'</p>';} ;?>
                    <?php if (form_error('thn_lahir')) {echo '<p>'.form_error('thn_lahir').'</p>';} ;?>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="jk">Jenis Kelamin</label>
                  <div class="controls">
                    <table>
                      <tr>
                        <td width="13px">
                          <input type="radio" name="jk" id="jk" value="1" <?php if ($siswa['jk'] == '1') { echo 'checked';} ;?> required> 
                        </td>
                        <td> Laki-laki </td>
                        <td width="20px"></td>
                        <td width="13px">
                          <input type="radio" name="jk" id="jk" value="2" <?php if ($siswa['jk'] == '2') { echo 'checked';} ;?> required>
                        </td>
                        <td> Perempuan </td>
                      </tr>
                    </table>

                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="agama">Agama</label>
                  <div class="controls">
                    <select name="agama" id="agama" class="span4" required>
                      <option value="">-- Pilih agama yang dianut --</option>
                      <option <?php if ($siswa['agama'] == 'Islam') { echo 'selected'; } ;?>>Islam</option>
                      <option <?php if ($siswa['agama'] == 'Kristen') { echo 'selected'; } ;?>>Kristen</option>
                      <option <?php if ($siswa['agama'] == 'Protestan') { echo 'selected'; } ;?>>Protestan</option>
                      <option <?php if ($siswa['agama'] == 'Hindu') { echo 'selected'; } ;?>>Hindu</option>
                      <option <?php if ($siswa['agama'] == 'Budha') { echo 'selected'; } ;?>>Budha</option>
                      <option <?php if ($siswa['agama'] == 'Konghucu') { echo 'selected'; } ;?>>Konghucu</option>
                    </select>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="penerima_kip">Penerima KIP</label>
                  <div class="controls">
                    <table>
                      <tr>
                        <td width="13px">
                          <input type="radio" name="penerima_kip" id="penerima_kip" value="Ya" <?php if ($siswa['penerima_kip'] == 'Ya') { echo 'checked';} ;?> required> 
                        </td>
                        <td> Ya <td>
                        <td width="20px"></td>
                        <td width="13px">
                          <input type="radio" name="penerima_kip" id="penerima_kip" value="Tidak" <?php if ($siswa['penerima_kip'] == 'Tidak') { echo 'checked';} ;?> required>
                        </td>
                        <td> Tidak </td>
                      </tr>
                    </table>

                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="lamat_jalan">Alamat</label>
                  <div class="controls">
                    <textarea name="alamat_jalan" id="alamat_jalan" rows="2" class="span7" placeholder="Nama Jalan, gang, nomor rumah"><?= $siswa['alamat_jalan'];?></textarea>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="rt">RT / RW</label>
                  <div class="controls">
                    <table>
                      <tr>
                        <td>
                          <input type="text" class="span1" name="rt" id="rt" value="<?= $siswa['rt'];?>" placeholder="RT" required>
                        </td>
                        <td> / </td>
                        <td>
                          <input type="text" class="span1" name="rw" id="rw" value="<?= $siswa['rw'];?>" placeholder="RW" required>
                        </td>
                      </tr>
                    </table>
                    
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="desa">Desa</label>
                  <div class="controls">
                    <input type="text" class="span7" name="desa" id="desa" value="<?= $siswa['desa'];?>" required placeholder="Nama desa tempat tinggal sekarang">
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="kecamatan">Kecamatan</label>
                  <div class="controls">
                    <input type="text" class="span7" name="kecamatan" id="kecamatan" value="<?= $siswa['kecamatan'];?>" required placeholder="Nama kecamatan tempat tinggal sekarang">
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="sekolah_asal">Sekolah Asal</label>
                  <div class="controls">
                    <input type="text" class="span7" name="sekolah_asal" id="sekolah_asal" value="<?= $siswa['sekolah_asal'];?>" required placeholder="Nama sekolah jenjang sebelumnya">
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="tahun_lulus">Tahun Lulus</label>
                  <div class="controls">
                    <input type="number" class="span2" name="tahun_lulus" id="tahun_lulus" value="<?= $siswa['tahun_lulus'];?>" required placeholder="Tahun lulus ">
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="email">Alamat Email</label>
                  <div class="controls">
                    <input type="email" class="span4" name="email" id="email" value="<?= $siswa['email'];?>" >
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                
                <div class="control-group">											
                  <label class="control-label" for="email">Pilihan Jurusan 1</label>
                  <div class="controls">
                    <select name="jurusan1" id="jurusan1" class="span5" required>
                      <option value="">-- Pilih Jurusan 1 --</option>
                      <?php foreach ($jurusan as $j1) :?>
                      <option <?php if ($siswa['jurusan1'] == $j1->namaJurusan) { echo 'selected';} ;?>><?= $j1->namaJurusan;?></option>
                      <?php endforeach ;?>
                    </select>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                
                <div class="control-group">											
                  <label class="control-label" for="email">Pilihan Jurusan 2</label>
                  <div class="controls">
                    <select name="jurusan2" id="jurusan2" class="span5">
                      <option value="">-- Pilih Jurusan 2 --</option>
                      <?php foreach ($jurusan as $j2) :?>
                      <option <?php if ($siswa['jurusan2'] == $j2->namaJurusan) { echo 'selected';} ;?>><?= $j2->namaJurusan;?></option>
                      <?php endforeach ;?>
                    </select>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->
              <hr>
                <h4 style="text-align: center">PRESTASI NON AKADEMIK</h4>
                <br>

                <div class="control-group">											
                  <label class="control-label" for="tingkat_prestasi">Prestasi Tingkat</label>
                  <div class="controls">
                    <select name="tingkat_prestasi" id="tingkat_prestasi" class="span7" >
                      <option value="">-- Pilih  --</option>
                      <option <?php if ($siswa['tingkat_prestasi'] == 'Internasional') { echo 'selected'; } ;?>>Internasional</option>
                      <option <?php if ($siswa['tingkat_prestasi'] == 'Nasional') { echo 'selected'; } ;?>>Nasional</option>
                      <option <?php if ($siswa['tingkat_prestasi'] == 'Provinsi') { echo 'selected'; } ;?>>Provinsi</option>
                      <option <?php if ($siswa['tingkat_prestasi'] == 'Kabupaten') { echo 'selected'; } ;?>>Kabupaten</option>
                      <option <?php if ($siswa['tingkat_prestasi'] == 'Kecamatan') { echo 'selected'; } ;?>>Kecamatan</option>
                    </select>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="juara_prestasi">Juara</label>
                  <div class="controls">
                    <select name="juara_prestasi" id="juara_prestasi" class="span7" >
                      <option value="">-- Pilih  --</option>
                      <option <?php if ($siswa['juara_prestasi'] == 'Satu') { echo 'selected'; } ;?>>Satu</option>
                      <option <?php if ($siswa['juara_prestasi'] == 'Dua') { echo 'selected'; } ;?>>Dua</option>
                      <option <?php if ($siswa['juara_prestasi'] == 'Tiga') { echo 'selected'; } ;?>>Tiga</option>
                      <option <?php if ($siswa['juara_prestasi'] == 'Harapan Satu') { echo 'selected'; } ;?>>Harapan Satu</option>
                      <option <?php if ($siswa['juara_prestasi'] == 'Peserta') { echo 'selected'; } ;?>>Peserta</option>
                    </select>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="bidang_prestasi">Prestasi Bidang</label>
                  <div class="controls">
                    <select name="bidang_prestasi" id="bidang_prestasi" class="span7" >
                      <option value="">-- Pilih  --</option>
                      <option <?php if ($siswa['bidang_prestasi'] == 'Sains dan teknologi') { echo 'selected'; } ;?>>Sains dan teknologi</option>
                      <option <?php if ($siswa['bidang_prestasi'] == 'Keagamaan') { echo 'selected'; } ;?>>Keagamaan</option>
                      <option <?php if ($siswa['bidang_prestasi'] == 'Seni') { echo 'selected'; } ;?>>Seni</option>
                      <option <?php if ($siswa['bidang_prestasi'] == 'Olahraga') { echo 'selected'; } ;?>>Olahraga</option>
                      <option <?php if ($siswa['bidang_prestasi'] == 'Bidang Lainnya') { echo 'selected'; } ;?>>Bidang Lainnya</option>
                    </select>
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->

                <div class="control-group">											
                  <label class="control-label" for="nama_prestasi">Nama Kegiatan</label>
                  <div class="controls">
                    <input type="text" class="span7" name="nama_prestasi" id="nama_prestasi" value="<?= $siswa['nama_prestasi'];?>" placeholder="Contoh : O2SN tingkat SMA cabang Atletik">
                  </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                

                                      
                
                <br><br>

                <!-- <div class="control-group">											
                  <label class="control-label"></label> -->
                  <div style="text-align: center">
                    <input type="checkbox" name="benar" id="benar" required> <span>Saya menyatakan bahwa data yang saya masukkan adalah benar.</span><br><br><br>
                    <input type="submit" class="btn btn-success span4" value="Simpan">
                  </div> <!-- /controls -->				
                <!-- </div> /control-group -->

              </fieldset>
            <?= form_close() ;?>

          </div>
          
        </div> <!-- /widget-content -->
              
      </div>
    

      <!-- /widget -->

    </div>
    <!-- /span6 -->

    <div class="span3">
      <div class="widget widget-nopad">
        <div class="widget-header"> <i class="icon-user"></i>
          <h3> Foto Pendaftar</h3>
          
        </div>
        <!-- /widget-header -->
        <div class="widget-content" style="padding: 10px">

          <div class="widget small-stats-container" style="text-align: center">            
            <img src="./uploads/foto/<?=$siswa['foto'];?>" width="60%" alt="Foto Pendaftar">
            <hr>
            <?= form_open_multipart('siswa/uplodfoto');?>
            <input type="file" name="foto" id="foto" required>
            <button type="submit" class="btn btn-success">Simpan</button>
            <?= form_close() ;?>
          </div>
          
        </div> <!-- /widget-content -->
              
      </div>
    

      <!-- /widget -->

    </div>
    <!-- /span3 -->

    <div class="span3">
      <div class="widget widget-nopad">
        <div class="widget-header"> <i class="icon-file"></i>
          <h3>Bukti Kartu Keluarga</h3>
          
        </div>
        <!-- /widget-header -->
        <div class="widget-content" style="padding: 10px">

          <div class="widget small-stats-container" style="text-align: center">
            <?php $eks = explode('.',$siswa['bukti_kk'] ); if ( $eks[1] == 'pdf') :?>
              <embed width="100%" height="250" src="./uploads/kk/<?= $siswa['bukti_kk'];?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf"></embed>
            <?php else :?>           
            <img src="./uploads/kk/<?=$siswa['bukti_kk'];?>" width="60%" alt="Bukti KK">
            <?php endif ;?>
            <hr>
            <?= form_open_multipart('siswa/uplodkk');?>
            <input type="file" name="foto" id="foto" required>
            <button type="submit" class="btn btn-success">Simpan</button>
            <?= form_close() ;?>
          </div>
          
        </div> <!-- /widget-content -->
              
      </div>
    

      <!-- /widget -->

    </div>
    <!-- /span3 -->

    <div class="span3">
      <div class="widget widget-nopad">
        <div class="widget-header"> <i class="icon-file"></i>
          <h3>Bukti Nilai Raport</h3>
          
        </div>
        <!-- /widget-header -->
        <div class="widget-content" style="padding: 10px">

          <div class="widget small-stats-container" style="text-align: center">
            <?php $eks = explode('.',$siswa['bukti_raport'] ); if ( $eks[1] == 'pdf') :?>
              <embed width="100%" height="250" src="./uploads/raport/<?= $siswa['bukti_raport'];?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf"></embed>
            <?php else :?>           
            <img src="./uploads/raport/<?=$siswa['bukti_raport'];?>" width="60%" alt="Bukti Raport">
            <?php endif ;?>
            <hr>
            <?= form_open_multipart('siswa/uplodraport');?>
            <input type="file" name="foto" id="foto" required>
            <button type="submit" class="btn btn-success">Simpan</button>
            <?= form_close() ;?>
          </div>
          
        </div> <!-- /widget-content -->
              
      </div>
    

      <!-- /widget -->

    </div>
    <!-- /span3 -->

    <div class="span3">
      <div class="widget widget-nopad">
        <div class="widget-header"> <i class="icon-file"></i>
          <h3>Bukti Prestasi</h3>
          
        </div>
        <!-- /widget-header -->
        <div class="widget-content" style="padding: 10px">

          <div class="widget small-stats-container" style="text-align: center">
            <?php $eks = explode('.',$siswa['bukti_prestasi'] ); if ( $eks[1] == 'pdf') :?>
              <embed width="100%" height="250" src="./uploads/prestasi/<?= $siswa['bukti_prestasi'];?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf"></embed>
            <?php else :?>           
            <img src="./uploads/prestasi/<?=$siswa['bukti_prestasi'];?>" width="60%" alt="Bukti Prestasi">
            <?php endif ;?>
            <hr>
            <?= form_open_multipart('siswa/uplodprestasi');?>
            <input type="file" name="foto" id="foto" required>
            <button type="submit" class="btn btn-success">Simpan</button>
            <?= form_close() ;?>
          </div>
          
        </div> <!-- /widget-content -->
              
      </div>
    

      <!-- /widget -->

    </div>
    <!-- /span3 -->

   


  </div>
  <!-- /row --> 

  <div class="row">
    
  </div>
</div>
<!-- /container --> 
    <?php elseif ($sekolah['bt'] == '2') : ?>
      <div class="container">
        <div class="alert alert-info">
          Silahkan login kembali di jadwal pengumuman.
        </div>
      </div>

    <?php elseif ($sekolah['bt'] == '3') : ?>
      <div class="container">
        <?php if ($siswa['seleksi'] == '1'): ?>
          <div class="alert alert-info">
            Selamat. Anda lolos seleksi penerimaan peserta didik baru <?= $sekolah['nama_sekolah'] ;?>. Silahkan login kembali ke halaman ini untuk melakukan daftar ulang pada jadwal yang telah ditentukan.
          </div>
        <?php elseif ($siswa['seleksi'] != '1') :?>
          <div class="alert alert-info">
            Maaf, anda tidak lolos seleksi penerimaan peserta didik baru <?= $sekolah['nama_sekolah'] ;?>
          </div>
        <?php endif;?>
      </div>
    <?php endif;?>
 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->