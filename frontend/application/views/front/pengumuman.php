<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>
    <link href="<?= base_url('assets/templates/front/');?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
        body {
            font: 'times'
        }
        h3, h4 {
            text-align: center;
            display: block;
            width: 100%;
            margin: 3px 0px;
        }
        p {margin: 0px}
        .row {display: block}
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row mt-3 mb-3">
            <h3>Pengumuman Hasil Seleksi</h3>
            <h4><?= $sekolah['nama_sekolah'] ;?></h4>
        </div>
        <div class="col-md-12">
        
            <table class="table table-hover display" style="width:100%" id="example">
                <thead>
                    <tr>
                        <th width="20px" style="text-align:right">No</th>
                        <th>Nama</th>
                        <th>Sekolah Asal</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($hasil as $hs) :?>
                    <tr>
                        <td><?= $no++ ;?></td>
                        <td><?= $hs->nama ;?></td>
                        <td><?= $hs->sekolah_asal ;?></td>
                        <td><?= $hs->jur ;?></td>
                        
                    </tr>
                <?php endforeach ;?>
                </tbody>
            </table>
        
        </div>
        <br>
        <div class="row col-md-12">
            <p>KETERANGAN :</p>
            <p>Calon peserta didik yang dinyatakan lolos seleksi diwajibkan melakukan daftar ulang sesuai jadwal yang telah ditentukan.</p>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>