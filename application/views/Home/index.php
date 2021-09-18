<div class="slide-one-item home-slider owl-carousel">
  <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('assets2/'); ?>images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-start">
        <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
          <h1>Ikuti Event-Event Menarik di Ayolari.Com</h1>
          <?php if (!$this->session->userdata('email')) { ?>
          <p><a href="auth" class="btn btn-primary btn-sm rounded-0 py-3 px-5">Read More</a></p>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('assets2/'); ?>images/hero_bg_4.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-start">
        <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
          <h1>Ajak Komunitas Kalian Untuk Bergabung Di Ayolari.Com</h1>
          <?php if (!$this->session->userdata('email')) { ?>
          <p><a href="auth" class="btn btn-primary btn-sm rounded-0 py-3 px-5">Read More</a></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('assets2/'); ?>images/hero_bg_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-start">
        <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
          <h1>Selamat Datang Di Ayolari.Com</h1>
           <?php if (!$this->session->userdata('email')) { ?>
          <p><a href="auth" class="btn btn-primary btn-sm rounded-0 py-3 px-5">Read More</a></p>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-section pt-0 feature-blocks-1" data-aos="fade" data-aos-delay="100">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('<?= base_url('assets2/'); ?>images/img_1.jpg');">
          <div class="text">
            <h2 class="h5 text-white">Jangan Lupa Ikuti Event Menariknya</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos repellat autem illum nostrum sit distinctio!</p>
            <p class="mb-0"><a href="#" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Read More</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('<?= base_url('assets2/'); ?>images/img_2.jpg');">
          <div class="text">
            <h2 class="h5 text-white">Russia's World Cup Championship</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos repellat autem illum nostrum sit distinctio!</p>
            <p class="mb-0"><a href="#" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Read More</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="background-image: url('<?= base_url('assets2/'); ?>images/img_3.jpg');">
          <div class="text">
            <h2 class="h5 text-white">Ayolari.Com</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos repellat autem illum nostrum sit distinctio!</p>
            <p class="mb-0"><a href="#" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Read More</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END row -->



<!-- END row -->

</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="site-section block-13 bg-primary fixed overlay-primary bg-image" style="background-image: url('images/hero_bg_3.jpg');" data-stellar-background-ratio="0.5">

  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center">
        <h2 class="text-white">More Game Highlights</h2>
      </div>
    </div>
    <br>
    <br> 
    <div class="site-section pt-0 feature-blocks-1" data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row">
<!--           <div class="nonloop-block-13 owl-carousel">
 -->            <?php foreach ($data as $value) { ?>
             <div class="col-md-6 col-lg-4">
        <div  class="p-3 p-md-5 feature-block-1 mb-6 mb-lg-0 bg" style=" background-image: url('<?= base_url('assets/img/') . $value->image ?>');">
          <div class="text">
            <h2 class="h5 text-white"><?= $value->judul_post ?></h2>
            <p><?= $value->isi_post ?></p>
            <p class="mb-0"><a href="<?= base_url('postdepan/') . $value->id_post ?>" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Read More</a></p>
          </div>
        </div>
      </div>
            <?php } ?>
          </div>
        </div>
        <br>
        <?php
            echo $this->pagination->create_links();
        ?>
      </div>
    </div>
  </div>
</div>