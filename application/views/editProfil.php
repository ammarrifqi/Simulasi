<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">

          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" id ="img" src="<?php echo base_url($this->session->userdata('img'))?>" alt="User profile picture">
             
              <div align="center">
                
              </div>
              
              <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama')?></h3>

              <p class="text-muted text-center"><?php echo $status?></p>
              <?php if ($this->session->userdata('pesan') <> '') {
                    echo '<div class="pesan" align="center">'.$this->session->userdata('pesan').'</div>';
                }
                $this->session->unset_userdata('pesan');
              ?>
              
              <div class="box-footer clearfix">
                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal-foto"><i class="fa fa-camera">&nbsp;Ganti Foto</i></a>
                <a href ="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-password">
                  Ganti Password
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-8 ">
              <div class="box box-primary" id="settings" style="width: 650px">
                <div class="box-header" align="center">
                  <h3 class="box-title">Edit Profil Anda</h3>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('C_user/edit')?>" method="post">
                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">ID</label>

                    <div class="col-sm-10">
                      <input type="text" name="id" class="form-control" id="id" disabled="true" value="<?php echo $this->session->userdata('id')?>" style="width: 500px">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="fullname" value="<?php echo $this->session->userdata('nama')?>" style="width: 500px">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jkl" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                      <input type="text" name="jkl" class="form-control" id="ttl" value="<?php echo $this->session->userdata('jkl')?>" disabled="" style="width: 500px">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo $this->session->userdata('username')?>" style="width: 500px">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ttl" class="col-sm-2 control-label">TTL</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ttl" id="ttl" value="<?php echo $this->session->userdata('ttl')?>" style="width: 500px">
                    </div>
                  </div>
                  <?php if($this->session->userdata('level')==1){?>
                    <div class="form-group">
                      <label for="no" class="col-sm-2 control-label">No Telepon</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="no" name="no" value="<?php echo $this->session->userdata('no_telp')?>" style="width: 500px">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="almt" class="col-sm-2 control-label">Alamat</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="almt" name="alamat" value="<?php echo $this->session->userdata('alamat')?>" style="width: 500px">
                      </div>
                    </div>
                  <?php } else{ ?>
                    <div class="form-group">
                      <label for="pendidikan" class="col-sm-2 control-label">Pendidikan Tinggi</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="pend" name="pendidikan" value="<?php echo $this->session->userdata('pendidikan')?>" style="width: 500px">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kota" class="col-sm-2 control-label">Kota Domisili</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $this->session->userdata('kota')?>" style="width: 500px">
                      </div>
                    </div>
                  <?php }?>
                  <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-edit"></i>&nbsp;Edit
                      </button>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              </div>
      </div>
      <!-- /.row -->
   
      <div class="modal fade" id="modal-foto">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ganti Foto</h4>
              </div>
              <?php echo form_open_multipart('C_user/gantiFoto')?>
              <div class="modal-body">
                <label for="foto" class="col-md-3 control-label">Pilih Foto</label>
                <input type="file" class="col-md-4 form-control" id="foto-baru" name="foto" style="width: 300px"><br><br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="simpan-foto" class="btn btn-primary">Simpan Foto</button>
              </div>
              <?php echo form_close()?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->