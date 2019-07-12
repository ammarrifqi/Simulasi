<div class="content-wrapper" id="form-booking">
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <?php if ($this->session->userdata('level')==2){?>
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-body">
              <div class="box-group" id="accordion">
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#rekam-medis">
                        Riwayat Rekam Medis Pasien
                      </a>
                    </h4>
                  </div>
                  <div id="rekam-medis" class="panel-collapse collapse collapse">
                    <div class="box-body">
                      <table id="tabel" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Sesi Konsultasi</th>
                          <th>Dokter</th>
                          <th>Keluhan</th>
                          <th>Diganosis</th>
                          <th>Penanganan</th>
                          <th>Saran Resep Obat</th>
                          <th>Waktu</th>
                        </tr>
                        </thead>
                        <tbody id="table-body">
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <?php }?>
        <!-- /.col -->
        <div class="col-md-12">
            <div class="col-md-5" >
              <!-- DIRECT CHAT -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Konsultasi: Sesi <?php echo $this->session->userdata('sesi')?></h3>
                  <?php if($status=='member'){?>
                    <div class="pull-right" id="status"></div>
                  <?php } else{?>
                    <div class="pull-right"><a href="#" class="link-resep" data-toggle="modal" data-target="#resep">
                    <button type="button" class="btn btn-primary">Saran Resep</button></a></div> 
                  <?php }?>
                </div>
                <!-- /.box-header -->
                <div class="box-body" id="body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="height: 450px;" id="body-konsul">
                  </div>
                  <!--/.direct-chat-messages-->
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="input-group">
                      <input type="text" name="isi" id="isi_konsul" placeholder="Silahkan tuliskan keluhan anda" class="form-control">
                          <span class="input-group-btn">
                            <button type="button" id="send_konsul" class="btn btn-primary btn-flat">Send</button>
                          </span>
                    </div>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->
      <!-- <div class="col-md-6"> -->
      <!-- <div class="row"> -->
      <div class="col-md-5">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <?php if($status=='member'){?>
            <div align="center">
            <img class="img-responsive center"  src="<?php echo base_url($usr->getImg())?>"></div>
            <h3 class="profile-username text-center"><?php echo "Dr. ".$usr->getNama()?></h3>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Nama</b> <a class="pull-right"><?php echo $usr->getNama()?></a>
              </li>
              <li class="list-group-item">
                <b>TTL</b> <a class="pull-right"><?php echo $usr->getTtl()?></a>
              </li>
              <li class="list-group-item">
                <b>Pendidikan</b> <a class="pull-right"><?php echo $usr->getPendidikan()?></a>
              </li>
              <li class="list-group-item">
                <b>Kota</b> <a class="pull-right"><?php echo $usr->getKota()?></a>
              </li>
            </ul>
            <?php } else{?>
            <h3 class="text-center">Rekam Medis Member</h3>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Nama</b> <a class="pull-right"><?php echo $usr->getNama()?></a>
              </li>
              <li class="list-group-item">
                <b>TTL</b> <a class="pull-right"><?php echo $usr->getTtl()?></a>
              </li>
              <li class="list-group-item">
                <b>Jenis Kelamin</b> <a class="pull-right"><?php echo $usr->getJenis_kl()?></a>
              </li>
              <li class="list-group-item">
                <b>Alamat</b> <a class="pull-right"><?php echo $usr->getAlamat()?></a>
              </li>
            <div style="margin-top:10px">
              <form>
              <label>Keluhan</label>
                <textarea name="keluhan" id="keluhan" placeholder="Ketik keluhan member disini..." value="<?php echo ($rkmSesi!=null)? '$rkmSesi->getKeluhan()' :''?>"
                 style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <label>Diagnosis</label>
                <textarea name="diagnosis" id="diagnosis" placeholder="Ketik diagnosis member disini..." value="<?php echo ($rkmSesi!=null)? '$rkmSesi->getDiagnosis()' :''?>"
                 style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                 <label>Penanganan</label>
                <textarea name="penanganan" id="penanganan" placeholder="Ketik penanganan yang diberikan disini..." value="<?php echo ($rkmSesi!=null)? '$rkmSesi->getPenanganan()' :''?>"
                 style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <button type="button" class="btn btn-primary" id="rkmMedis" style="margin-top:5px">
                <i class="fa fa-save"></i>&nbsp;Simpan
                </button>
              </form>
            </div>
            </ul>

              <?php }?>
            <div align="center" style="magin-top:15px">
              <a href="<?php echo base_url('C_konsultasi/historyKonsul/'.$usr->getId())?>">
                <font size="4"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali ke Riwayat Sesi</font>
              </a>
            </div>
              

          </div>
      <!-- /.box-body -->
        </div>
        </div>
        </div>
        <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-body">
              <div class="box-group" id="accordion">
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#file">
                        File Pendukung Kesehatan
                      </a>
                    </h4>
                  </div>
                  <div id="file" class="panel-collapse collapse">
                    <div class="box-body">
                      <?php if ($this->session->userdata('level')==1){
                        echo form_open_multipart('C_konsultasi/uploadFile/'.$id_recv)?>
                        <div class="col-md-12">
                          <label for="dataFile" class="control-label">Pilih File</label>
                        </div>
                        <div class="col-md-12">
                          <input type="file" class="form-control" id="file-baru" name="dataFile">
                        </div><br>
                        <div class="col-md-12"></div>
                        <div class="col-md-4" style="margin-top: 5px">
                          <button type="submit" id="upload-file" class="btn btn-primary">Unggah</button>
                        </div>
                        <?php echo form_close();?>
                        <div class="col-md-12"></div> <br><br>
                      <?php }?>
                      <div class="col-md-12">
                        <ul class="mailbox-attachments clearfix" style="margin-top:10px">
                          <?php 
                            if($dataFile==null){?>
                              <div align="center"><font size="4">Tidak ada file</font></div>
                            <?php } else{
                            foreach ($dataFile as $f):?>
                              <li >
                                <span class="mailbox-attachment-icon"><i class="fa fa-file"></i></span>
                                <div class="mailbox-attachment-info">
                                  <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo $f->getNamaFile()?></a>
                                  <span class="mailbox-attachment-size">
                                    Download
                                    <a href="<?php echo base_url('C_konsultasi/down_file/'.$f->getNamaFile())?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                  </span>   
                                </div>
                              </li>
                          <?php endforeach;
                          }?>
                        </ul>
                      </div> 
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
        <!-- <div class="col-md-12">
        <div class="box box-primary">
           <div class="box-body box-file">
             <div align="center">
              <h4>File Pendukung Kesehatan</h4>
            </div>
                <?php if ($this->session->userdata('level')==1){
                  echo form_open_multipart('C_konsultasi/uploadFile/'.$id_recv)?>
                  <div class="col-md-12">
                    <label for="dataFile" class="control-label">Pilih File</label>
                  </div>
                  <div class="col-md-12">
                    <input type="file" class="form-control" id="file-baru" name="dataFile">
                  </div><br>
                  <div class="col-md-12"></div>
                  <div class="col-md-4" style="margin-top: 5px">
                    <button type="submit" id="upload-file" class="btn btn-primary">Unggah</button>
                  </div>
                  <?php echo form_close();?>
                  <div class="col-md-12"></div> <br><br>
                  <?php }?>
            </div>
            <div class="box-footer">
            <ul class="mailbox-attachments clearfix" style="margin-top:10px">
              <?php 
                if($dataFile==null){?>
                  <div align="center"><font size="4">Tidak ada file</font></div>
                <?php } else{
                foreach ($dataFile as $f):?>
                  <li >
                    <span class="mailbox-attachment-icon"><i class="fa fa-file"></i></span>
                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo $f->getNamaFile()?></a>
                      <span class="mailbox-attachment-size">
                        Download
                        <a href="<?php echo base_url('C_konsultasi/down_file/'.$f->getNamaFile())?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                      </span>   
                    </div>
                  </li>
              <?php endforeach;
              }?>
            </ul>
            </div> 
        </div>
        </div> -->
      <!-- </div>  -->
      <!-- /.col -->

          

          <!-- <div class="modal fade" id="rekam-medis">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Rekam Medis <?php echo $usr->getNama()?></h4>
              </div>
              <div class="modal-body">
              <div class="box">
                <!-- /.box-header -->
               <!--  <div class="box-body" id="tabel-rekam">
                  
                </div>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tutup</button>
              </div>
            </div> -->
            <!-- /.modal-content -->
         <!--  </div> -->
          <!-- /.modal-dialog -->
        <!-- </div> -->
        <!-- /.modal -->

        <div class="modal fade" id="resep">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Kirim Saran Resep Obat</h4>
              </div>
              <div class="modal-body">
                  <label for="resep" class="col-md-3 control-label">Resep Obat</label>
                  <input type="text" class="col-md-4 form-control" id="isi-resep" placeholder="Masukkan Saran Resep Obat" style="width: 300px"><br><br>
                  
                  <div class="col-md-12"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="button" id="simpan-resep" class="btn btn-primary">Simpan Password</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
          </section>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var body_konsul = $("#body-konsul");
    var chat = $("body");
    var konsul = $('#isi_konsul');
    var id_recv = "<?php echo (isset($id_recv)) ? $id_recv : '' ?>";
    var keluhan =  $('#keluhan');
    var diagnosis = $('#diagnosis');
    var penanganan =  $('#penanganan');
    var resep = $('#isi-resep');
    keluhan.val('<?php echo strip_tags(str_replace("<br />","\\r\\n",$rkmSesi->getKeluhan()))?>');
    diagnosis.val('<?php echo strip_tags(str_replace("<br />","\\r\\n",$rkmSesi->getDiagnosis()))?>');
    penanganan.val('<?php echo strip_tags(str_replace("<br />","\\r\\n",$rkmSesi->getPenanganan()))?>');
    function cekStatus(){
      $.ajax({
        url : "<?php echo base_url('C_konsultasi/cekStatus')?>"+"/"+id_recv,
        success : function(data){
          $("#status").html(data);
        }
      });
    }

    function cekRekam(){
      $.ajax({
        url : "<?php echo base_url('C_konsultasi/cekRekam')?>"+"/"+id_recv,
        success : function(data){
          $("#table-body").html(data);
        }
      });
    }

    function tampilKonsul(is_init=false){
      if(id_recv) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('C_konsultasi/tampilKonsul')?>"+"/"+id_recv,
          success : function(data){
            body_konsul.html(data);
            if(is_init) {
              body_konsul.animate({ scrollTop: body_konsul[0].scrollHeight}, 1000);
              konsul.focus();
            }
          }
        });
      }
    }
    
    $('#send_konsul').click(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('C_konsultasi/tambahKonsul')?>",
        data: 'konsul='+ konsul.val() + '&penerima='+id_recv,
        success :function(data){
          body_konsul.html(data);
          konsul.val('');
        }
      });
      body_konsul.animate({ scrollTop: body_konsul[0].scrollHeight}, 1000);
    });

    $('#isi_konsul').on('keydown', function(e){
      if (e.keyCode === 13 && e.shiftKey === false) {
          if ("" == konsul.val()) {
              e.preventDefault();
              return;
          }
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('C_konsultasi/tambahKonsul')?>",
            data: 'konsul='+ konsul.val() + '&penerima='+id_recv,
            success :function(data){
              body_konsul.html(data);
            }
          });
          body_konsul.animate({ scrollTop: body_konsul[0].scrollHeight}, 1000);
          konsul.val('');
          e.preventDefault(); // stop 
          return false;
      }
    });

    $('#rkmMedis').click(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('C_konsultasi/simpanMedis')?>",
        data: 'keluhan='+ keluhan.val()+ '&diagnosis='+ diagnosis.val() + '&penanganan='+ penanganan.val()+'&pasien='+id_recv,
        success : function(data){
          alert("Data Rekam Medis Berhasil Disimpan");
          // keluhan.html(data);
          // diagnosis.html(data);
          // penanganan.html(data);
        }
      });
    });

    $('#simpan-resep').click(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('C_konsultasi/kirimResep')?>",
        data: 'resep='+ resep.val() + '&pasien='+id_recv,
        success : function(data){
          $('#resep').modal('hide');
        }
      });
    })

  tampilKonsul(true);
  cekRekam();
  setInterval(function(){
     tampilKonsul(); cekStatus(); cekRekam();
   },1000);
})
</script>