 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laptop-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Komunitas Indonesia</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- query Menu-->
      <?php 
      $id_role = $this->session->userdata('id_role');
      $queryMenu = "SELECT `tb_user_menu`.`id`, `menu`
                      FROM `tb_user_menu` JOIN `tb_user_akses_menu` 
                        ON `tb_user_menu`.`id` = `tb_user_akses_menu`.`id_menu`
                      WHERE `tb_user_akses_menu`.`id_role` = $id_role
                  ORDER BY `tb_user_akses_menu`.`id_menu` ASC  
                    ";
      $menu = $this->db->query($queryMenu)->result_array();             
      ?>

      <!-- Menu Looping -->
      <?php foreach ($menu as $m) : ?>
        <!-- <div class="sidebar-heading">
          <?= $m['menu'];?>
        </div> -->

        <!-- Siapkan Sub Menu Sesuai Menu  Yang di Butuhkan-->
        <?php
        $Idmenu = $m['id'];
        $querySubMenu = "SELECT *
                          FROM  `tb_user_sub_menu`
                          WHERE `id_menu` = $Idmenu
                          AND `is_active` = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();                   
        ?>


          <?php foreach($subMenu as $sm) : ?>
            <li class="nav-item">
              <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                <i class="<?= ($sm['icon']); ?>"></i>
                <span><b><?=($sm['title']); ?></b></span></a>
            </li>

          <?php endforeach?>

         <!--  <hr class="sidebar-divider mt-3"> -->

      <?php endforeach; ?>

      <?php if ($this->session->userdata('id_role') == "1") { ?>

      <div class="sidebar-heading"></div>

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span><b>Menu Control Akses</b></span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-heade text-dark"><center><h5>Menu</h5></center> </h6>
            <!-- <a class="collapse-item" href="<?= base_url(); ?>Akses">Akses Menu</a> -->
            <a class="collapse-item" href="<?= base_url(); ?>Menu">Menu</a>
            <!-- <a class="collapse-item" href="<?= base_url(); ?>Role">Role</a> -->
            <a class="collapse-item" href="<?= base_url(); ?>Sub">Sub Menu</a>
          </div>
        </div>
      </li>
      <?php } ?>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('MemberKomunitas/') . $this->session->userdata('id_komunitas'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span><b>Data Member Komunitas</b></span></a>
        </li>
      <hr>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span><b>Keluar</b></span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->