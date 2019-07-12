<!DOCTYPE html>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
        <?php if ($this->session->userdata('level')==2) {?>
            <legend>Daftar Konsultasi</legend>
        <?php } else{?>
            <legend>Daftar Semua Member</legend>
        <?php }?>
            <div class="col-md-8">
                <form action="" method="post">
                  <div class="input-group col-md-3 col-sm-3 col-xs-12">
                    <input type="text" name="find" class="form-control" id="find" placeholder="Cari Member..."   style="auto;">
                    <span class="input-group-btn ">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </form>
            </div>
            <br><br><br>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body ">
                    <?php if(count($member)==0) {
                        if($this->session->userdata('level')==2){?>
                            <div>Tidak ada konsultasi</div>
                        <?php } else {?>
                            <div>Tidak ada member</div>
                    <?php }
                    } else { ?>
                      <ul class="products-list product-list-in-box" id="list-member">
                      <?php foreach ($member as $m) :?>
                          
                        <li class="item">
                          <div class="product-img">
                            <img src="<?php echo base_url($m->getImg())?>" class="img-circle" 
                            style="<?php echo ($this->session->userdata('level')==3) ? "width: 100px; height: 100px" : ""?>"/>
                          </div>
                          <div class="member-info">
                            <?php if ($this->session->userdata('level')==2){?>
                                <a href="<?php echo base_url('C_konsultasi/historyKonsul/'.$m->getId())?>" class="product-title">
                                <?php } else{?>
                                <a href="#" class="product-title">
                                <?php }?>
                                <font size="3"><?php echo $m->getNama()?></font>
                                <?php if($this->session->userdata('level')==3){?>
                                    <a href="<?php echo base_url('C_admin/hapusMember/'.$m->getId().'?nama='.$m->getNama())?>" 
                                    onclick="return confirm('Anda yakin ingin menghapus member ini?')">
                                        <button type="button" class="btn btn-danger pull-right" id="submit"><i class="fa fa-trash"></i>&nbsp;Hapus User
                                        </button>
                                    </a>
                                    <span class="product-description">
                                      Tempat, Tanggal Lahir: <?php echo $m->getTtl()?>
                                    </span>
                                    <span class="product-description">
                                      Alamat: <?php echo $m->getAlamat()?>
                                    </span>
                                    <span class="product-description">
                                      Jenis Kelamin<?php echo $m->getJenis_kl()?>
                                    </span>
                                    <span class="product-description">
                                      No Telepon: <?php echo $m->getNo_telp()?>
                                    </span>
                                <?php } else{?>
                                    <a href="<?php echo base_url('C_konsultasi/historyKonsul/'.$m->getId())?>" class="product-title">
                                    <button type="button" class="btn btn-primary pull-right" id="konsul-member">
                                        <i class="fa fa-comments">&nbsp;&nbsp;Balas Konsul</i>
                                    </button>
                                    </a>
                                                                        
                                    <span class="product-description">
                                      Waktu: <?php echo $m->getTime()?>
                                    </span>
                                    <span>
                                        <a href="<?php echo base_url('C_konsultasi/rekamPDF/'.$m->getId())?>">
                                        <button type="button" class="btn btn-default" id="konsul-member">
                                        <i class="fa fa-download">&nbsp;&nbsp;Unduh Rekam Medis</i>
                                        </button>
                                    </a>
                                    </span>
                                <?php }?>
                            </a>       
                          </div>
                        </li>
                    <?php endforeach;?>
                      </ul>
                    <?php }?>
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
        $("#find").keyup(function(event) {
            event.preventDefault();
            //search_ajax_way();
            ajax_search();
        });
    });
    function ajax_search() {
 
        var cari = $("#find").val();
        $.ajax({
            type: "POST",
            url : "<?php echo base_url('C_member/searchMember')?>",
            data : "cari=" + cari,
            success : function(data) {
                // jika data sukses diambil dari server, tampilkan di <select id=kota>
                $("#list-member").html(data);
            }
        });
    }
</script>