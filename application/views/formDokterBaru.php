<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header" align="center">

              <h3 class="box-title">Tambah Data Dokter Baru</h3>
            </div>
            <div class="box-body">
              <?php echo form_open_multipart('C_admin/tambahDokter')?>
                <div class="col-md-2">
                  <label>ID Dokter</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="text" required="" class="form-control" name="id" placeholder="ID" style="width:500px;">
                </div>
                <div class="col-md-2">
                  <label>Nama Lengkap</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="text" required="" class="form-control" name="nama" placeholder="Nama Lengkap" style="width:500px;">
                </div>
                <div class="col-md-2">
                  <label>Username</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="text" required="" class="form-control" name="username" placeholder="Username" style="width:500px;">
                </div>
                <div class="col-md-2">
                  <label>Tempat, Tanggal Lahir</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="text" class="form-control" name="ttl" placeholder="Tempat, Tanggal Lahir" style="width:500px;">
                </div>
                <div class="col-md-2">
                  <label>Jenis Kelamin</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="radio" class="form-control" name="jkl" value="Laki-laki">Laki-Laki &nbsp;&nbsp;&nbsp;
                  <input type="radio" class="form-control" name="jkl" value="Perempuan">Perempuan
                </div>
                <div class="col-md-2">
                  <label>Pendidikan</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan Universitas" style="width:500px;">
                </div>
                <div class="col-md-2">
                  <label>Kota Domisili</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="text" class="form-control" name="kota" placeholder="Kota Domisili(tempat tinggal)" style="width:500px;">
                </div>
                <div class="col-md-2">
                  <label>Foto Dokter</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="file" class="form-control" name="foto" required="true" style="width:500px;">
                </div>
                <div class="col-md-2">
                  <label>Password</label>
                </div>
                <div class="form-group col-md-10">
                  <input type="password" required="" class="form-control" name="password" placeholder="Password" style="width:500px;">
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