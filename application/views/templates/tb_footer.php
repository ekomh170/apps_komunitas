<!-- Footer -->

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Apakah Anda Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body text-danger"><b>Anda Ingin Keluar?? Tekan Yes</b></div>
        <div class="modal-footer">
          <a class="btn btn-danger" href="<?= base_url('Auth/logout'); ?>">Yes</a>
          <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">No</button>
        </div>
      </div>
    </div>
  </div>

  
  <!--Sweet Alret Js-->
  <script src="<?= base_url('assets/'); ?>vendor/js/sweetalert2.all.min.js"></script>
  <!--<script src="<?= base_url('assets/'); ?>vendor/js/myscript.js"></script>-->

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
  <script>
    $(document).ready(function() {
      $('#table1').DataTable( {
        "paging":   false,  
        "info":     false
      } );
    } );
  </script>     


</body>

</html>