<!DOCTYPE html>
<div class="content-wrapper">
<section class="content">
<div class="row">
    <?php if($this->session->userdata('level')==1){?>
    <legend>Riwayat Konsultasi Dokter</legend>
    <div class="col-md-12">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-body ">
            <?php if(count($dokter)==0){?>
              <div>Anda tidak memiliki riwayat konsultasi</div>
            <?php } else { ?>
              <ul class="products-list product-list-in-box">
              <?php foreach ($dokter as $dr) :?>
                  
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url($dr->getImg())?>" style= "width: 70px; height:70px" class="img-circle"/>
                  </div>
                  <div class="dokter-info">
                    <a href="<?php echo base_url('C_konsultasi/historyKonsul/'.$dr->getId())?>" class="product-title"><font size="3">Dr. <?php echo $dr->getNama()?></font>
                        <button type="submit" class="btn btn-primary pull-right" id="konsul-dokter">
                            <i class="fa fa-comments">&nbsp;&nbsp;Konsul</i>
                        </button>
                        <span class="product-description">
                          Waktu: <?php echo $dr->getTime()?>
                        </span>
                        <span class="product-description">
                            <?php if($dr->getStatus()=="Online"){?> 
                            <span class="label label-success"><?php echo $dr->getStatus()?></span>
                            <?php } else {?>
                            <span class="label label-warning"><?php echo $dr->getStatus()?></span>
                            <?php }?>
                        </span>
                        </a>
                  </div>
                </li>
            <?php endforeach;?>
              </ul>
            <?php } ?>
            </div>
        </div>
        </div>
    </div>
    <?php }?>
    <legend>Daftar Semua Dokter</legend>
        <?php if ($this->session->userdata('level') ==3): 
                if ($this->session->userdata('pesan') <> '') {
                    echo '<div class="pesan">'.$this->session->userdata('pesan').'</div>';
                    echo '<br><br>';
                }
                $this->session->unset_userdata('pesan');
        ?>
            <div class="col-xs-10">
                <a href="<?php echo base_url ('C_admin/formTambahDokter')?>">
                  <button type="button" class="btn btn-primary" id="tambah-dokter"><i class="fa fa-plus"></i>Tambah Dokter</button></a>
                <br>
            </div>
            <br><br>
        <?php endif;?>
        <div class="col-md-8">
            <form action="<?php echo base_url('C_dokter/searchDokter')?>" method="post">
              <div class="input-group col-md-3 col-sm-3 col-xs-12">
                <input type="text" name="cari" class="form-control" id="cari"placeholder="Cari Dokter..."   style="auto;">
                <span class="input-group-btn ">
                  <button type="button" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
        </div>

        <div class="col-md-12"></div>
        <br><br><br>


            <!-- /.box-header -->
            
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body ">
                  <ul class="products-list product-list-in-box" id="list-dokter">
                  <?php foreach ($allDokter as $dr) :?>
                      
                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo base_url($dr->getImg())?>" style= "width: 70px; height:70px" class="img-circle"/>
                      </div>
                      <div class="dokter-info">
                        <a href="<?php echo ($this->session->userdata('level')==3) ? "#" : base_url('C_konsultasi/historyKonsul/'.$dr->getId())?>" class="product-title"><font size="3">Dr. <?php echo $dr->getNama()?></font>
                        <?php if($this->session->userdata('level')!=3){?>
                            <button type="submit" class="btn btn-primary pull-right" id="konsul-dokter">
                                <i class="fa fa-comments">&nbsp;&nbsp;Konsul</i>
                            </button>
                            <span class="product-description">
                                <?php if($dr->getStatus()=="Online"){?> 
                                <span class="label label-success"><?php echo $dr->getStatus()?></span>
                                <?php } else {?>
                                <span class="label label-warning"><?php echo $dr->getStatus()?></span>
                                <?php }?>
                            </span>
                        <?php }?>
                            <span class="product-description">
                              Pendidikan: <?php echo $dr->getPendidikan()?>
                            </span>
                            <span class="product-description">
                              Kota: <?php echo $dr->getKota()?>
                            </span>
                        </a>
                      </div>
                    </li>
                <?php endforeach;?>
                    
                  </ul>
                </div>
            </div>
        </div>
        
        </div>
    </section>
</div>

<script type='text/javascript'>
    $(document).ready(function() {
        //$("#search_results").slideUp();
        $("#search-btn").click(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
        $("#cari").keyup(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
    });
    function ajax_search() {
 
        var cari = $("#cari").val();
        $.ajax({
            type: "POST",
            url : "<?php echo base_url('C_dokter/searchDokter')?>",
            data : "cari=" + cari,
            success : function(data) {
                // jika data sukses diambil dari server, tampilkan di <select id=kota>
                $("#list-dokter").html(data);
            }
        });
    }
</script>