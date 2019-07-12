  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        Daftar Info <?php echo $jenis;?>
      </h1>
    </section>

    <section class="content">
    <!-- Main content -->
    <div class="row">
    <section class="col-md-12">
    <div>
      <form action="<?php echo base_url('C_konsultasi/searchInfo/'.$jenis)?>" method="post">
        <div class="input-group col-md-3 col-sm-3 col-xs-12">
          <input type="text" name="cari" class="form-control" placeholder="Cari..."   style="auto;">
          <span class="input-group-btn ">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
    </div>
    </section>
    </div>
    <br>
    <?php
    if ($search){
      echo '<font size="5">'.
         'Hasil Pencarian Info '. $inputSearch. ': '.
         '</font>';
    }

    if(count($info)==0){?>
      <h1 align="center">
        Tidak ada Info <?php echo $jenis;?>
      </h1>
    <?php }
    else {
      foreach ($info as $i):?>
      
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <div class="box box-default">
            <div class="box-header with-border">
              <a href="<?php echo base_url('C_konsultasi/detailInfo/'.$i->getId())?>">
                <h3 class="box-title"><?php echo $i->getJudul()?></h3>
              </a>
            </div>
            <div class="box-body">
              <div class="col-md-2" align="center">
                <img src="<?php echo base_url($i->getImage())?>" style="width: 120px; height: 120px">
              </div>
              <div class="col-md-10">
                <p><?php echo substr($i->getIsi_info(),0,500)?> 
                  <a href="<?php echo base_url('C_konsultasi/detailInfo/'.$i->getId())?>">Baca Selengkapnya</a>
                </p>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      
      <!-- /.content -->
      <?php endforeach;
      if($jumlah>4){
        echo "<div>".
        $this->pagination->create_links().
        "</div>";
      }
    }?>
      </section>
      
  </div>
  <!-- /.content-wrapper -->
