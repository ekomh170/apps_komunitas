<section class="section-space creative-demo-section highlight-on-scroll" id="layout">
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-2 text-left">
                <div class="mb-2">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="d-flex w-100 justify-content-between mb-4 ">
            <div class="couting">
                <h2>Daftar Post</h2>
                 <div>
         <a href="<?= base_url('PostHistory/') . $this->session->userdata('id_user'); ?>" class="btn btn-success">HistoryLog</a>
     </div>
            </div>
            <a href="<?= base_url(); ?>Post/add" class="btn btn-success float-lg-right align-self-start">Tambah
                Diskusi</a>

        </div>



        <?php foreach ($data as $value) { ?>
            <div class="list-group mb-2">
                <div class="list-group-item list-group-item-action p-0">
                    <div class="d-flex w-100 justify-content-start h-100">
                        <a href="<?= base_url('postdepan/') . $value->id_post ?>" class="w-auto text-center  align-items-stretch p-4 nav-link text-white bg-info">
                            <img src="<?= base_url('assets/img/') . $value->image ?>" height="200" width="200"></img>
                        </a>

                        <div class="w-100 p-3 text-left">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-1"><a href="<?= base_url('postdepan/') . $value->id_post ?>"><?= $value->judul_post ?></a>
                                </h3>
                                <div>
                                    <small>
                                        <?php
                                            $start = new DateTime(date($value->date_created));
                                            $end   = new DateTime(date("Y-m-d H:i:s"));
                                            $interval = $start->diff($end);
                                            echo $interval->format('%D Hari %H Jam %i minutes');
                                        ?>
                                    </small>
                                </div>
                            </div>
                            <small>dikirim oleh <?= $value->nama_pengirim ?>
                            </small>
                            <div class="mb-1 border-0 p-0" id="description-1">
                                <p><?= $value->isi_post ?></p>
                            </div>
                            <p id="description-p-1"></p>
                            <a href="" class="text-decoration-none">
                                <small class="badge-info p-1 mr-1 rounded text-white "><?= $value->nama_komunitas ?></small>
                            </a>
                            <a href="" class="text-decoration-none">
                                <?php if ($this->session->userdata('id_role') == "1") { ?>
                                    <small><a href="<?= base_url(); ?>Post/HapusDataPost/<?= $value->id_post; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ??');"><button type="button" class="badge-danger    p-1 mr-1 rounded text-white "><i class="fas fa-fw fa-trash"></i></button></a></small>
                                <?php } ?>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
     <?php
            echo $this->pagination->create_links();
        ?>
    </div>
    </div>
    </div>
</section>