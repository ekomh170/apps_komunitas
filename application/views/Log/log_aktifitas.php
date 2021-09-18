<script src="<?= base_url('assets/'); ?>js/jquery"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $("input[name='checkAll']").click(function() {
        var checked = $(this).attr("checked");
        $("#myTable tr td input:checkbox").attr("checked", checked);
      });
    });
  </script>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-dark"><b>Log Aktifitas</b></h1>
    <p></p>
    <!--<p lass="mb-4"></p>-->
	<br>
	<!-- DataTales Exalge -->
  <!--<form action="<?php echo site_url('User/delete_multiple'); ?>" method="post">
    <select name="action">
      <option value="null">Bulk Action</option>
      <option value="delete">Delete</option>
    </select>
    <input type="submit" name="submit" value="Action">
    <br><br>-->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <!--<th><input type="checkbox" id="checkAll" name="checkAll"> </th>-->
                    	<th>No</th>
                    	<th>Tanggal</th>
                    	<th>User</th>
                    	<th>Role</th>
                      <th>Nama Data</th>
                    	<th>Aksi</th>
                      <th>Kode Data</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      foreach ( $tb_log as $lg ) :
                        $id_log=$lg['id_log'];
                        $log_time=$lg['log_time'];
                        $log_user=$lg['log_user'];
                        $log_role=$lg['log_role'];
                        $log_tipe=$lg['log_tipe'];
                        $log_aksi=$lg['log_aksi'];
                        $log_item=$lg['log_item'];
                    ?>
                      <tr>
                        <!--<td><?= $id_log; ?></td>-->
                        <!--<td><input type="checkbox" name="msg[]" value="<?php echo $id_log; ?>"></td>-->
                        <td><?= $id_log; ?></td>
                        <td><?= $log_time; ?></td>
                        <td><?= $log_user; ?></td>
                        <td><?= $log_role; ?></td>
                        <td><?= $log_tipe; ?></td>
                        <td><?= $log_aksi; ?></td>
                        <td><?= $log_item; ?></td>
                      </tr>
                      <?php $no++ ?>
                    <?php endforeach; ?>
                 </tbody>
                 <?php if ($this->session->userdata('id_role') == "1") { ?>
                  <a href="<?= base_url(); ?>Log/AllDelete/?>"><button type="button" class="btn btn-danger">Reset Data Aktifitas</button></a>
                <?php } ?>
                <br><br>
                </table>  
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->