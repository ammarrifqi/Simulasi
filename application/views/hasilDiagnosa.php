  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-6">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header" align="center">
              <h3>Diagnosis Penyakit <?php echo $this->session->userdata('jp')?></h3>
              <div>
              <img src="<?php echo base_url($this->session->userdata('img_gp'))?>" width="50%">
              </div><br>
              <h4 class="box-title">Gejala Penyakit Yang Anda Alami</h4>
            </div>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php 
                $gejala = $this->session->userdata('gejala');
                foreach ($gejala as $gjl):?>
                  <li class="item">
                    <span><?php echo $gjl?></span>
                  </li>
                <?php endforeach;?>
              </ul>
            </div>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header" align="center">
              <h3>Hasil Diganosis Otomatis</h3>
            </div>
            <div class="box-body">
              <font size="4">
              <?php
                $result = $this->session->userdata('hasil');
                $hasil = array_unique($result[0]);
                $jlhHsl = count($hasil);
                if($jlhHsl==1){
                  $tulis = "";
                  foreach ($hasil as $hsl) {
                    if($hsl=='0' || $hsl == '1'){
                      $tulis .= "Anda diperkiran tidak terkena penyakit ";
                      foreach ($penyakit as $i => $val) {
                        if($i != (count($penyakit)-1)){
                          $tulis .= $val['penyakit'].', ';
                        } else {
                          break;
                        }
                        
                      }
                      $tulis .= "atau ".$penyakit[count($penyakit)-1]['penyakit'];
                      echo $tulis;
                    } else{
                      echo '<a href="'.base_url('C_konsultasi/searchInfo/Penyakit?state='.'diagnosis'.'&cari='.$hsl).'">'.$hsl.'</a><br>';
                      echo "Klik nama penyakit untuk mengetahui penyakit lebih lanjut";
                    }
                  }
                } else {
                  foreach ($hasil as $i=>$hsl) {
                    if ($i != $jlhHsl-1) {
                      echo '<a href="'.base_url('C_konsultasi/searchInfo/Penyakit?state='.'diagnosis'.'&cari='.$hsl).'">'.$hsl.'</a>';
                      if($jlhHsl!=2)
                        echo ' , ';
                    } else{
                      echo ' atau ';
                      echo '<a href="'.base_url('C_konsultasi/searchInfo/Penyakit?state='.'diagnosis'.'&cari='.$hsl).'">'.$hsl.'</a><br>';
                    }
                  }
                  echo "Klik nama penyakit untuk mengetahui penyakit lebih lanjut";
                }
              ?>
              </font>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
