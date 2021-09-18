<div class="container-fluid text-left mt-10">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-2 text-left">
            </div>
        </div>
    </div>
                                                        
               
<div class="col-md-10">
    <div class="card">
        <div class="card-header bg-dark">
            <?php foreach ($data as $value) { ?>
            <h5 style="color: white;"><?= $value->nama_pertanyaan?></h5>
            <div class="">
                <small> 
                    <?php 
                        $start = new DateTime(date($value->data_created));
                        $end   = new DateTime(date("Y-m-d H:i:s"));
                        $interval = $start->diff($end);
                        echo $interval->format('%D Hari %i minutes %s seconds'); 
                    ?>            
                </small>
                <small>dikirim oleh  <a class="text-warning"><?= $value->nama_pengirim ?></a></small>
            </div> 
                    </div>
                    <div class="card-body mb-0 pb-1">
                        <div id="description" class="pb-2 px-0 pt-0">
                        <?= $value->isi_pertanyaan ?>    
                                                       
                        </div><br>
                        <div class="mb-4">
                            <a href="<?= base_url('jawaban/') . $value->id_pertanyaan ?>"
                               class="nounderline text-decoration-none">
                                <small class="badge-info p-1 mr-1 rounded text-white"><?= $value->nama_komunitas ?></small>
                            </a>
                                <a href="<?= base_url('jawaban/') . $value->id_pertanyaan ?>" class="text-decoration-none">
                                <small class="badge-secondary p-1 mr-1 rounded text-white">Kritik dan Saran</small>
                            </a>
                                                                                                            </div>
                       
                        <form action="<?= base_url('saran/jawaban') ?>" method="post">
                            <div class="form-group">
                                <label for="isi_jawaban"><b>Komentar</b></label>
                                <textarea class="form-control" id="isi_jawaban" name="isi_jawaban" placeholder="Masukkan Komentar" rows="3" required></textarea>
                            </div>
                            <input type="hidden" name="id_pertanyaan" value="<?= $value->id_pertanyaan ?>">
                            <button type="submit" name="ubah" value="ubah" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
            <br>
            <h2 class="text-dark"><center>Jawaban</center></h2>
            <br>
            <center>
                <div class="col-md-8">
                    <?php foreach ($jawaban as $value) { ?>
                    <div class="card">
                            <br><br><br>
                        <div class="card-header bg-dark">
                            <h5 style="color: white;"><?= $value->nama_pengirim?></h5>
                            <div>
                                <small>
                                <?php 
                                    $start = new DateTime(date($value->data_created));
                                    $end   = new DateTime(date("Y-m-d H:i:s"));
                                    $interval = $start->diff($end);
                                    echo $interval->format('%D Hari %i minutes %s seconds'); 
                                ?>    
                                </small>
                                <small>dikirim oleh  <a class="text-warning"><?= $value->nama_pengirim ?></a></small>
                            </div> 
                        </div>
                        <div class="card-body mb-0 pb-1">
                            <div id="description" class="pb-2 px-0 pt-0"><?= $value->isi_jawaban ?></div><br>
                                <div class="mb-4">
                                    <a href="<?= base_url('jawaban/') . $value->id_pertanyaan ?>"class="nounderline text-decoration-none">
                                        <small class="badge-info p-1 mr-1 rounded text-white"><?= $value->nama_komunitas ?></small>
                                    </a>
                                    <a href="<?= base_url('jawaban/') . $value->id_pertanyaan ?>" class="text-decoration-none">
                                        <small class="badge-secondary p-1 mr-1 rounded text-white">Kritik dan Saran</small>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </center>
                <br>

                        
        



