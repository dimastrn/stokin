</div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url('assets').'/vendor/jquery/dist/jquery.min.js' ?> "></script>
  <script src="<?php echo base_url('assets').'/vendor/bootstrap/dist/js/bootstrap.bundle.min.js' ?> "></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url('assets').'/vendor/chart.js/dist/Chart.min.js' ?> "></script>
  <script src="<?php echo base_url('assets').'/vendor/chart.js/dist/Chart.extension.js' ?> "></script>
  <!-- Datepicker -->
  <script src="<?php echo base_url('assets').'/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url('assets').'/js/argon.js?v=1.0.0' ?> "></script>  
  <script src="<?php echo base_url('assets').'/js/datatables.min.js' ?> "></script>
  <!-- Datatables -->  
  <script src="<?php echo base_url('assets').'/js/dataTables.bootstrap4.min.js'; ?>"></script>
  

  <script type="text/javascript">
  	$(document).ready( function () {
		    $('[data-toggle="tooltip"]').tooltip();
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
        $('#myTable').DataTable();
		}); 
        
  </script>
</body>

</html>