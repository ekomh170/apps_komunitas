<?php foreach ($data as $value) { ?>
    <div class="site-section" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="<?= base_url('assets/img/') . $value->image ?>" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 pl-md-5">
                    <h2 class="text-black"><?= $value->judul_post ?></h2>
                    <p><?= $value->isi_post ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>