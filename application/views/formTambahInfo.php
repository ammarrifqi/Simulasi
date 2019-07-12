<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header" align="center">
              <i class="fa fa-info"></i>

              <h3 class="box-title">Tambah Info Kesehatan atau Penyakit</h3>
            </div>
            <div class="box-body">
              <?php echo form_open_multipart('C_konsultasi/tambahInfo')?>
                <div class="col-md-2">
                  <label>Judul Info</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="text" class="form-control" name="judul" placeholder="Judul" style="width:500px;">
                </div>
                <div class="col-md-2">
                  <label>Tipe Info</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="radio" class="form-control" name="tipe" value="Kesehatan">Kesehatan &nbsp;&nbsp;&nbsp;
                  <input type="radio" class="form-control" name="tipe" value="Penyakit">Penyakit
                </div>
                <div class="col-md-2">
                  <label>Gambar Info</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="file" class="form-control" name="gambar" value="Kesehatan" style="width:500px;">
                </div>

                <div class="col-md-12">
                  <textarea class="textarea" name="isi_info" placeholder="Ketik info kesehatan atau penyakit disini..." style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-plus"></i>&nbsp;Tambah
                </button>
            </div>
            <?php echo form_close();?>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->