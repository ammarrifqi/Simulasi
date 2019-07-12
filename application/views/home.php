  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        Telehealth System
      </h1>
    </section>
    <?php if ($this->session->userdata('pesan') <> '') {
                    echo '<div class="pesan" align="center">'.$this->session->userdata('pesan').'</div>';
          }
          $this->session->unset_userdata('pesan');
        ?>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
      <?php if ($this->session->userdata('is_login')) {?>
      
      <h4>Selamat Datang, <?php echo $this->session->userdata('nama')?>.</h4>
      <?php }?>
        <h4>Tentang Sistem Telehealth</h4>
        <p>Sistem Telehealth adalah sebuah sistem yang dapat membantu anda untuk mendiagnosa penyakit yang anda alami, 
        berkonsultasi dengan dokter, ataupun menambah pengetahuan anda tentang penyakit dan kesehatan.</p>
      </div>

      <!-- Main row -->
      <div class="row">
        
        <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Fitur Sistem Telehealth</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  <?php if($this->session->userdata('level')!=3){?>
                    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                  <?php }?>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <a href="<?php echo base_url('C_Penyakit')?>">
                      <img src="<?php echo base_url()?>asset/dist/img/auto-check.jpg" style="width: 800px; height:350px" alt="First slide">

                      <div class="carousel-caption">
                      <h3>Diagnosis Otomatis</h3>
                        
                      </div>
                    </a>
                  </div>
                  <?php if($this->session->userdata('level')!=3){?>
                  <div class="item">
                    <a href="<?php echo base_url('C_konsultasi')?>">
                      <img src="<?php echo base_url()?>asset/dist/img/konsul-dokter.jpg" style="width: 800px; height:350px" alt="Second slide">

                      <div class="carousel-caption">
                        <h3>Konsultasi Dokter</h3>
                        
                      </div>
                    </a>
                  </div>
                  <?php }?>
                  <div class="item">
                    <a href="<?php echo base_url('C_konsultasi/tampilCheck')?>">
                      <img src="<?php echo base_url()?>asset/dist/img/imt.jpg" style="width: 800px; height:350px" alt="Third slide">
                      <div class="carousel-caption">
                        <h3>Cek IMT(Indeks Massa Tubuh)</h3>
                      </div>
                    </a>
                  </div>
                  <div class="item">
                    <a href="<?php echo base_url('C_konsultasi/tampilCheck')?>">
                      <img src="<?php echo base_url()?>asset/dist/img/gizi.png" style="width: 800px; height:350px" alt="Second slide">
                      <div class="carousel-caption">
                        <h3>Cek Kebutuhan Zat Gizi</h3>
                      </div>
                    </a>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Deskripsi Fitur</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#auto-diagnose">
                        Diagnosis Otomatis
                      </a>
                    </h4>
                  </div>
                  <div id="auto-diagnose" class="panel-collapse collapse in">
                    <div class="box-body">
                      Diagnosis Otomatis merupakan fungsi dari sistem telehealth dimana anda 
                      dapat melakukan diagnosa penyakit yang anda alami sesuai denan gejala-gejala yang
                      anda alami. Diagnosa akan diproses dengan proses perhitungan secara otomatis dan akan
                      menampilkan penyakit yang mungkin anda miliki.
                    </div>
                  </div>
                </div>
                <?php if($this->session->userdata('level')!=3){?>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#kosul-dokter">
                        Konsultasi Dokter
                      </a>
                    </h4>
                  </div>
                  <div id="kosul-dokter" class="panel-collapse collapse">
                    <div class="box-body">
                      Konsultasi Dokter merupakan fitur dari sistem telehealth dimana anda 
                      dapat melakukan konsultasi dengan dokter yang ada pada sistem.
                      Konsultasi anda dapat meliputi penyakit mungkin anda alami ataupun tentang menjaga kesehatan.
                      Namun, untuk menggunakan fungsi dari sistem ini anda harus login terlebih dahulu.
                    </div>
                  </div>
                </div>
                <?php }?>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#imt">
                        Cek IMT(Indeks Massa Tubuh)
                      </a>
                    </h4>
                  </div>
                  <div id="imt" class="panel-collapse collapse">
                    <div class="box-body">
                      Cek IMT merupakan fungsi dari sistem yang dapat membantu anda untuk mengetahui
                      kategori dari indeks massa tubuh anda. Kategori tersebut meliputi Sangat Kurus, Kurus, Normal,
                      Gemuk, dan Obesitas. Pengecekan IMT dilakukan dengan perhitungan tinggi badan dan berat badan anda.
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#gizi">
                        Cek Kebutuhan Zat Gizi
                      </a>
                    </h4>
                  </div>
                  <div id="gizi" class="panel-collapse collapse">
                    <div class="box-body">
                      Cek Kebutuhan Zat Gizi merupakan fungsi dari sistem yang dapat membantu anda untuk mengetahui
                      kebutuhan zat gizi anda berdasarkan aktivitas yang anda lakukan. Aktivitas yang anda lakukan
                      digolongkan menjadi sangat ringan, ringan, sedang, atau berat.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->




        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
