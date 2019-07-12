  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box box-info">
            <div class="box-header"align="center">
              <h2 class="box-title" >Diagnosis Penyakit <?php echo $this->session->userdata('jp')?></h2>
            </div>
            <div class="box-body">
            <div align="center">
              <img src="<?php echo base_url($this->session->userdata('img_gp'))?>" style="width: 400px; height: 200px;">
            </div>&nbsp;&nbsp;
            <?php if ($this->session->flashdata('error')!=''):?>
                <div  class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif?>
            <p>Silahkan pilih gejala-gejala di bawah ini sesuai dengan yang anda alami</p>
            <form action="<?php echo base_url('C_Penyakit/hitungDiagnosa/'.$idjenis)?>" method="post">
              <div class="col-md-4">
              <?php 
              for ($i=0; $i<ceil($jumlah/2) ; $i++) {?>
                <input type="checkbox" name="gejala[]" class="minimal" value="<?php echo $gejala[$i]->getGejala()?>">&nbsp;&nbsp;<?php echo $gejala[$i]->getGejala().'<br><br>';
              }?>
              </div>
              <div class="col-md-4">
              <?php
              for ($i=ceil($jumlah/2); $i<$jumlah ; $i++) {?>
                <input type="checkbox" name="gejala[]" class="minimal" value="<?php echo $gejala[$i]->getGejala()?>">&nbsp;&nbsp;<?php echo $gejala[$i]->getGejala().'<br><br>';
              }?>
              </div>
              <div class="col-md-12"></div>
              <div class="box-footer clearfix col-md-6">
                <button type="submit" name="autocheck" class="btn btn-primary" id="autocheck">Diagnosa</button>
              </div>
            </form>
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
