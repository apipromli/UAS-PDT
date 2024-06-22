<style>
    .kotak {
        transition: 0.5s !important;
        border-radius: 20px
    }
    .kotak:hover {
        border: 1px solid red;
        background-color: #F1f1f1;
    }
    #home{
        width: 100%;
         height: 100%;
         background-image:url(img.jpg);
         background-image: linear-gradient(180deg, #ade5ff 0, #7dcefb 25%, #3cb5f2 50%, #009ce9 75%, #0085e0 100%);
         background-size: cover;
         background-position: center;
    }
    .images{
  border: 10%;
  border: 10px solid white;
}
.images {
  margin-top: 2rem;
  width: 300px;
  
}
</style>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- Content start -->
<!-- home start -->
<section class="bg-home" id="home">  
<div style="padding-top: 50px" data-aos="fade-up"  data-aos-delay="50"
        data-aos-duration="2000">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <!-- Menetukan jumlah slidenya sekaligus lopping slider indikator -->
            <?php for ($i = 0; $i < $jml_sld; $i++) : ?>
                <li data-target="#carouselExampleControls" data-slide-to="<?= $i; ?>" class="<?php if ($i == '0') { echo 'active';} ?>"></li>
            <?php endfor; ?>
        </ol>
        <div class="carousel-inner">
            <!-- Looping data dari database -->
            <?php $no = 1; foreach ($new_sld as $sl) : ?>
                <div class="carousel-item <?php if ($no++ == '1') { echo 'active';  } ?>">
                    <div class="home-center">
                        <div class="home-desc-center">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 order-last-">
                                        <div class="home-title mo-mb-20 text-white">
                                            <h3 class="mb-4 text-white">
                                                <?php echo $sl->judul; ?> </h3>
                                            <p class="text-white-70 home-desc" style="font-size:14pt;">
                                                <?php echo $sl->text; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 offset-xl-1 col-lg-5 offset-lg-1 col-md-7 order-first-" style="margin: 0 auto;">
                                        <div class="home-img position-relative">
                                            <center><img src="<?= base_url('assets/images/slide/') . $sl->gambar; ?>" alt="" class="images" > </center>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end container-fluid -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
            </div>
</section>
<!-- home end -->
<!-- clients start -->
<section class="p-0" id="nav-panduan">
<div data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-delay="20"
        data-aos-duration="2000">
    <div class="container-fluid">
        <div class="clients p-4 bg-white">
            <div class="row">
                <div class="col-md-4 offset-lg-2 offset-md-2 kotak">
                    <div class="client-images">
                        <a href="<?= base_url(); ?>auth/register" class="masuk">
                            <img alt="logo-img" class="mx-auto img-fluid d-block mytombol">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 kotak">
                    <div class="client-images">
                        <a href="">
                            <img src="<?= base_url('assets/templates/front/'); ?>img/ICO4.svg" alt="logo-img" class="mx-auto img-fluid d-block">
                        </a>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    </div>
    <!-- end container-fluid -->
</section>
<!-- clients end -->
<!-- features start -->
<section class="section bg-light pt-2" id="jadwal">
<div data-aos="fade-up-right" data-aos-delay="20"
        data-aos-duration="2000">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-4 pb-1">
                    <h2 class="mb-3">JADWAL KEGIATAN
                    </h2>
                    <p class="text-muted">PENERIMAAN PESERTA DIDIK BARU</p>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#
                                    </th>
                                    <th>Kegiatan
                                    </th>
                                    <th>Dibuka
                                    </th>
                                    <th>Ditutup
                                    </th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($jadwal as $j) : ?>
                                <tbody>

                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td class="pl-sm-0 pl-md-5" style="text-align:left;">
                                            <?php echo $j->kegiatan ?>
                                        </td>
                                        <td>
                                            <?php echo $j->dibuka ?>
                                        </td>
                                        <td>
                                            <?php echo $j->ditutup ?>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <span>
                    <b>Keterangan:
                    </b>
                    <br>Kegiatan dilaksanakan sesuai jadwal yang telah ditentukan.
                </span>
            </div>
        </div>
    </div>
    </div>
    <!-- end container-fluid -->
</section>
<!-- features end -->

<!-- cta start -->
<section class="section-sm bg-light" id="kontak">
<div data-aos="flip-left" data-aos-delay="20"
        data-aos-duration="2000">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h2 class="mb-0 mo-mb-20">Hubungi kami di
                </h2>
                <p class="mt-1">
                    Pusat Informasi Penerimaan Peserta Didik Baru
                    <br />
                    <?= $sekolah['nama_sekolah'] ;?>
                    <br />
                    <?= $sekolah['alamat'] ;?>
                    <br />
                    <i class="fa fa-phone" style="margin-right: 10px; width: 10px;"></i> tlp: <?= $sekolah['tlp_sekolah'] ;?>
                    <br />
                    <i class="fa fa-envelope" style="margin-right: 10px; width: 10px;"></i> Email: <a href="mailto:<?=$sekolah['email_sekolah'];?>"><?= $sekolah['email_sekolah'] ;?></a>
                </p>
            </div>
            <div class="col-md-3">

            </div>
        </div>
        <!-- end row -->
    </div>
    </div>
    <!-- end container-fluid -->
</section>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
