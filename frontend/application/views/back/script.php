</div>
	<!--   Core JS Files   -->
	<script src="<?= base_url('assets/templates/back/');?>js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url('assets/templates/back/');?>js/core/popper.min.js"></script>
	<script src="<?= base_url('assets/templates/back/');?>js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= base_url('assets/templates/back/');?>js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url('assets/templates/back/');?>js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?= base_url('assets/templates/back/');?>js/setting-demo.js"></script>
    <!-- <script src="<?= base_url('assets/templates/back/');?>js/demo.js"></script> -->
	<script src="<?= base_url('assets/templates/back/');?>js/my.js"></script>
	
	
   <script>
	$(document).ready(function(){
	   $('.ubah').on('click', function() {
		   id = $(this).data('id');

		   $.ajax({
			   url     : '<?= base_url('admin/gUbahJad');?>',
			   type    : 'post',
			   data    : {id:id, <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'},
			   datatype: 'json',
			   success : function(data) {
				// tampilkan modal
				$('#modalUbahJadwal').modal('show').on('shown.bs,modal');

				var array = JSON.parse(data);
				array.forEach(function(object) {
					console.log(object);

					$('#fUJadwal [name="id"]').val(object[0][0].id);
					$('#fUJadwal [name="kegiatan"]').val(object[0][0].kegiatan);
					$('#fUJadwal [name="dibuka"]').val(object[0][0].dibuka);
					$('#fUJadwal [name="ditutup"]').val(object[0][0].ditutup);
					$('#fUJadwal [name="token"]').val(object[1].token);
				});
			   },
			   error: function() {
				location.reload();
			   }
		   });
	   });

	   $('.tutup').on('click', function(){
		location.reload();
	   });
	});
   </script>

<script>
	$(document).ready(function(){
	   $('.ubahSlide').on('click', function() {
		   id = $(this).data('id');

		   $.ajax({
			   url     : '<?= base_url('admin/gUbahSld');?>',
			   type    : 'post',
			   data    : {id:id, <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'},
			   datatype: 'json',
			   success : function(data) {
				// tampilkan modal
				$('#modalUbahSlide').modal('show').on('shown.bs,modal');

				var array = JSON.parse(data);
				array.forEach(function(object) {
					//console.log(object);

					$('#formUbahSlide [name="id"]').val(object[0][0].id);
					$('#formUbahSlide [name="judul"]').val(object[0][0].judul);
					$('#formUbahSlide [name="text"]').val(object[0][0].text);
					$('#formUbahSlide [name="token"]').val(object[1].token);

					
				});
			   },
			   error: function() {
				location.reload();
			   }
		   });
	   });

	   $('.tutup').on('click', function(){
		location.reload();
	   });
	});
   </script>

<script>
	$(document).ready(function(){
	   $('.ubahjur').on('click', function() {
		   id = $(this).data('id');

		   $.ajax({
			   url     : '<?= base_url('admin/gUbahJur');?>',
			   type    : 'post',
			   data    : {id:id, <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'},
			   datatype: 'json',
			   success : function(data) {
				// tampilkan modal
				$('#modalUbahJurusan').modal('show').on('shown.bs,modal');

				var array = JSON.parse(data);
				array.forEach(function(object) {
					//console.log(object);

					$('#fUJurusan [name="id"]').val(object[0][0].id);
					$('#fUJurusan [name="token"]').val(object[1].token);
					$('#fUJurusan [name="namaJurusan"]').val(object[0][0].namaJurusan);
				});
			   },
			   error: function() {
				location.reload();
			   }
		   });
	   });

	   $('.tutup').on('click', function(){
		location.reload();
	   });
	});
   </script>

<script>
	$(document).ready(function(){
	   $('.ubahdata').on('click', function() {
		   id = $(this).data('id');

		   $.ajax({
			   url     : '<?= base_url('admin/gUbahData');?>',
			   type    : 'post',
			   data    : {id:id, <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'},
			   datatype: 'json',
			   success : function(data) {
				// tampilkan modal
				$('#modalUbahData').modal('show').on('shown.bs,modal');

				var array = JSON.parse(data);
				array.forEach(function(object) {
					//console.log(object);

					$('#fUData [name="id"]').val(object[0][0].id);
					$('#fUData [name="token"]').val(object[1].token);
					$('#fUData [name="nisn"]').val(object[0][0].nisn);
				});
			   },
			   error: function() {
				location.reload();
			   }
		   });
	   });

	   $('.tutup').on('click', function(){
		location.reload();
	   });
	});
   </script>

<script>
 $(document).ready(function(){
	$('#master_check').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 
 });
</script>


	
</body>
</html>