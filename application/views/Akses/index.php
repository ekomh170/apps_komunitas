<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-dark"><b>Akses Menu User</b></h1>
    <p></p>
    <!--<p lass="mb-4"></p>-->
    <?php if( $this->session->flashdata('berhasil') ) : ?>
    <script src="<?= base_url('assets/'); ?>vendor/js/sweetalert2.all.min.js"></script> 
    <script>
        Swal.fire({
            icon: 'success',
            title: "Data Akses",
            text: "Data Berhasil <?php echo $this->session->flashdata('berhasil'); ?>",
            timer: 1500,
            showConfirmButton: true,
            type: 'success'
        });
    </script>
    <!--<div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" Akses="alert">User Akses <strong>Berhasil</strong> <?= $this->session->flashdata('berhasil'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>   
            </div>
        </div>
    </div>-->
    <?php endif; ?> 
    <!--<div>
        <span style="float: right">
        <form action="" method="post" class="form-inline">
            <input class="form-control mr-sm-1" type="search" placeholder="Search" name="cari" aria-label="Search">
            <button class="btn btn-outline-info my-1 my-sm-0" type="submit">Search</button>
        </form>
    </div>-->

    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>Akses/tambah" class="btn btn-block btn-dark bg-info"><b>+ Data Baru</b></a>
    </div>
    <br>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Database Akses</h6>
        </div>
        <div class="card-body">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h5><b>Catatan</b></h5>
                Role :<br> 
                1 = Admin<br>
                2 = Ketua Komunitas<br>
                3 = Member Yang Punya Komunitas<br>
                4 = Member Yang Tidak Punya Komunitas<br>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h5><b>Catatan</b></h5>
                Menu :<br> 
                1 = Admin<br>
                2 = Ketua Komunitas<br>
                3 = Member Yang Punya Komunitas<br>
                4 = Member Yang Tidak Punya Komunitas<br>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Role</th>
                        <th>Kode Menu</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no = 1;
                    foreach ( $akses as $aks ) :
                        $id = $aks['id'];
                        $id_role = $aks['id_role'];
                        $id_menu = $aks['id_menu'];
                    ?>
                        <tr>
                            <td><?= $id;?></td>
                            <td><?= $id_role;?></td>
                            <td><?= $id_menu;?></td>
                            <td class="text-center">
                                <a href="<?= base_url(); ?>Akses/ubah/<?= $aks['id']; ?>"><button type="button" class="btn btn-success"><i class="fas fa-fw fa-check"></i></button></a> <b>|</b>
                                <a href="<?= base_url(); ?>Akses/hapus/<?= $aks['id']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ??');"><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php $no++ ?>
                    <?php endforeach; ?>
                 </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->