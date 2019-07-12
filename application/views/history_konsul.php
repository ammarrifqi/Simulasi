<!DOCTYPE html>
<div class="content-wrapper">
<section class="content">
<div class="row">
    <legend>Riwayat Konsultasi dengan <?php if($this->session->userdata('level')==1) echo 'Dr. ';echo $user->getNama()?></legend>
        
        <?php if($this->session->userdata('level')==1){?>
        
        <div class="col-md-10">
            <label>Tambah Sesi Baru</label> <br>
            <form action="<?php echo base_url('C_konsultasi/halamanKonsul/'.$user->getId())?>" method="post">
              <div class="input-group col-md-3 col-sm-3 col-xs-12">
                <input type="text" name="sesi" class="form-control" id="cari" required="" placeholder="Tambah Sesi"   style="auto;">
                <span class="input-group-btn ">
                  <button type="submit" name="newSesi" id="add-btn" class="btn btn-flat"><i class="fa fa-plus"></i></button>
                </span>
              </div>
            </form>
        </div>
        <div class="col-md-12"></div>
        <?php }?>

        <div class="col-md-8" style="margin-top: 30px">
            <form action="<?php echo base_url('C_konsultasi/searchKonsulSesi')?>" method="post">
              <div class="input-group col-md-3 col-sm-3 col-xs-12">
                <input type="text" name="cari" class="form-control" id="cari" placeholder="Cari Sesi..."   style="auto;">
                <span class="input-group-btn ">
                  <button type="button" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
        </div>

        <div class="col-md-12"></div>

            <!-- /.box-header -->
            
        <div class="col-md-8" style="margin-top:15px">
            <div class="box box-primary">
                <div class="box-body ">
                  <ul class="products-list product-list-in-box" id="list-sesi">
                  <?php 
                    if($history == null){
                        echo "Tidak ada riwayat konsultasi";
                    } else {
                        foreach ($history as $h):?>
                            <li class="item">
                              <div class="konsul-info">
                                <a href="<?php echo base_url('C_konsultasi/halamanKonsul/'.$user->getId()).'?sesi='.$h->getSesi()?>" class="product-title"><font size="3">Sesi Konsultasi: <?php echo $h->getSesi()?></font>
                                    <button type="submit" class="btn btn-primary pull-right" id="konsul-dokter">
                                        <i class="fa fa-comments">&nbsp;&nbsp;Lihat Konsultasi</i>
                                    </button>
                                    <span class="product-description">
                                      Waktu: <?php echo $h->getTime()?>
                                    </span>
                                </a>
                              </div>
                            </li>
                        <?php endforeach;
                    }?>
                    
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
            url : "<?php echo base_url('C_konsultasi/searchKonsulSesi/'.$user->getId())?>",
            data : "cari=" + cari,
            success : function(data) {
                // jika data sukses diambil dari server, tampilkan di <select id=kota>
                $("#list-sesi").html(data);
            }
        });
    }
</script>