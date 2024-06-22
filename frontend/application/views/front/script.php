

        <!-- javascript -->
        <script src="<?= base_url('assets/templates/front/');?>js/jquery.min.js"></script>
        <script src="<?= base_url('assets/templates/front/');?>js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/templates/front/');?>js/jquery.easing.min.js"></script>
        <script src="<?= base_url('assets/templates/front/');?>js/scrollspy.min.js"></script>
        <script src="<?= base_url('assets/templates/front/');?>js/sweetalert2.all.min.js"></script>
        <script src="<?= base_url('assets/templates/front/');?>js/custom.js?v=1.1"></script>
        <script src="<?= base_url('assets/templates/front/');?>fontawesome/all.min.js"></script>

        

<script>
    $(document).ready(function() {
        st = '<?= $sekolah["bt"];?>';
        if (st == 0 || st == 1 || st == 2 ) {
            src = '<?= base_url('assets/templates/front/'); ?>img/daftar.gif';
        }

        if (st == 3) {
            src = '<?= base_url('assets/templates/front/'); ?>img/pengumuman.gif';
        }

        if (st == 4) {
            src = '<?= base_url('assets/templates/front/'); ?>img/du.gif';
        }

        if (st == 5) {
            src = '<?= base_url('assets/templates/front/'); ?>img/tutup.gif';
        }

        $('.mytombol').attr('src', src);
    });
</script>
           
<script>
    href = $('.masuk').attr('href');
    pengumuman = '<?= base_url();?>pengumuman';
    login = '<?= base_url();?>auth/login';
    du = '<?= base_url();?>Auth/login';
    status = '<?= $sekolah["bt"];?>';

    $('.masuk').on('click', function(e) {
        e.preventDefault();
        if (status == '0') {
            Swal.fire(
                'Pendaftaran belum dibuka !',
                'Silakan cek jadwal pendaftaran',
                'warning'
            );
        }

        if (status == '1') {
            document.location.href=href;
        }

        if (status == '2') {
            Swal.fire({
                icon: 'warning',
                title: 'Pendaftaran sudah ditutup !',
                text: 'Bagi yang sudah melakukan pendaftaran dapat login ke akun masing-masing',
                footer: '<a href="'+login+'"><b>LOGIN<b></a>',
                showConfirmButton: false,
            })
        }

        if (status == '3') {
            Swal.fire({
                icon: 'info',
                title: 'Pengumuman Hasil Seleksi',
                text: 'Anda dapat melihat hasil seleksi dengan login atau klik link dibawah ini',
                footer: '<a href="'+pengumuman+'"><b>PENGUMUMAN<b></a>',
                showConfirmButton: false,
            })
        }

        if (status == '4') {
            document.location.href=du;
        }

        if (status == '5') {
            Swal.fire(
                'PPDB sudah ditutup !',
                '',
                'warning'
            );
        }
    });
</script>
       

    </body>
</html>
