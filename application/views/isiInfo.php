  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box box-info">
            <div class="box-header"align="center">
              <h1 class="box-title" ><b><?php echo $info->getJudul()?></b></h1>
            </div>
            <div class="box-body">
            <div align="center">
              <img src="<?php echo base_url($info->getImage())?>" style="width:300px; height:300px">
            </div>&nbsp;&nbsp;
            <div class="col-md-12"><?php echo $info->getIsi_info()?></div>
            </div>
          </div>
          </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
