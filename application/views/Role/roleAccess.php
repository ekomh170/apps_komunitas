<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-dark"><b>Menu Akses</b></h1>
    <p></p>

    <form action="<?= base_url('Role/roleAccess/')?>" method="post">
        <?php if( $this->session->flashdata('berhasil') ) : ?>
        <script src="<?= base_umn('assets/'); ?>vendor/js/sweetalert2.all.min.js"></script> 
        <script>
            Swal.fire({
                icon: 'success',
                title: "Menu Akses",
                text: "Data Berhasil <?php echo $this->session->flashdata('berhasil'); ?>",
                timer: 1500,
                showConfirmButton: true,
                type: 'success'
            });
        </script>
        <?php endif; ?> 
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark"> Role : <?= $role['role']; ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th width="6%">No</th>
                            <th width="40%" class="text-center">Menu</th>
                            <th witdh="40%" class="text-center">Akses</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $no = 1;
                        foreach ( $menu as $mn ) :
                            $id_menu = $mn['id_menu'];
                            $title = $mn['title'];
                            $is_active  = $mn['is_active'];

                        ?>
                            <tr>
                                <td><?= $id_menu;?></td>
                                <td><?= $title;?></td>
                                <td><?= $is_active;?></td>
                                <td class="text-center">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $id_menu); ?> data-role="<?= $role['id']?>" data-menu="<?= $id_menu?>" >
                                    </div>  
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
        </form>    
        <!-- /.container-fluid -->