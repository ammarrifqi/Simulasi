<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <div class="callout callout-info">
          <h4>Diagnosis Otomatis</h4>
          <p>Diagnosis Otomatis merupakan fitur dari sistem telehealth dimana anda 
                dapat melakukan diagnosa secara otomatis dengan memilih gejala-gejala yang anda alami.</p>
      </div>
    </section>
    <section class="content">
      <div class="row">
      <!-- Main row -->
          <?php foreach ($jenis as $jp):?>
              <!-- Left col -->
              <div class="col-md-5">
                <div class="box" style="height: 400px">
                  <div class="box-header">
                    <h3 class="box-title">Diagnosis <?php echo $jp->getJenis()?></h3>
                  </div>
                  <div class="box-body">
                  <img src="<?php echo base_url($jp->getImg())?>" style="width: 415px; height: 240px;">&nbsp;&nbsp;
                  <p><?php echo $jp->getDeskripsi()?></p>
                  </div>
                  <div class="box-footer clearfix">
                    <a href="<?php echo base_url('C_Penyakit/daftarGejala/'.$jp->getId().'?img='.$jp->getImg())?>"><button type="button" name="autocheck" class="pull-right btn btn-primary" id="autocheck">Diagnosa
                      <i class="fa fa-arrow-circle-right"></i></button></a>
                  </div>
                </div>
              </div>
              <!-- /.Left col -->
          <?php endforeach;?>
        </div>
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
