<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header" align="center">

              <h3 class="box-title">IMT (Indeks Massa Tubuh) dan Kebutuhan Gizi</h3>
            </div>
            <form action="#" method="POST">
              <div class="box-body">
                
                  <div class="col-md-3">
                    <label>Berat Badan (kg)</label>
                  </div>
                  <div class="form-group col-md-8">
                    <input type="number" class="form-control" name="bb" placeholder="Berat Badan" id="bb" style="width:300px;">
                  </div>
                  <div class="col-md-3">
                    <label>Tinggi Badan (cm)</label>
                  </div>
                  <div class="form-group col-md-8">
                    <input type="number" class="form-control" name="tb" placeholder="Tinggi Badan" id="tb" style="width:300px;">
                  </div>
                  <div class="col-md-3">
                    <label>Usia/Umur (tahun)</label>
                  </div>
                  <div class="form-group col-md-8">
                    <input type="number" class="form-control" name="usia" placeholder="contoh: 18" id="usia" style="width:300px;">
                  </div>
                  <div class="col-md-3">
                    <label>Jenis Kelamin</label>
                  </div>
                  <div class="form-group col-md-8" id="jenis_kl">
                    <select id="jkl" class="form-control" style="width:300px;">
                      <option value="0">--Pilih Jenis Kelamin--</option>
                      <option class="jenis_kl" value="Laki-laki">Laki-laki</option>
                      <option class="jenis_kl" value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Kategori Aktivitas</label>
                  </div>
                  <div class="form-group col-md-8">
                    <select id="aktivitas" class="form-control" style="width:300px;">
                      <option value="0">--Pilih Kategori Aktivitas--</option>
                      <option class="pria" value="1.30">Sangat Ringan</option>
                      <option class="pria" value="1.65">Ringan</option>
                      <option class="pria" value="1.76">Sedang</option>
                      <option class="pria" value="2.10">Berat</option>
                      <option class="wanita" value="1.30">Sangat Ringan</option>
                      <option class="wanita" value="1.55">Ringan</option>
                      <option class="wanita" value="1.70">Sedang</option>
                      <option class="wanita" value="2.00">Berat</option>
                    </select>
                    <label><a href="#" class="link-jenis" data-toggle="modal" data-target="#jenis-aktivitas">Contoh Jenis Aktivitas</a></label>
                  </div>
              </div>
              <div class="box-footer clearfix">
                <button type="button" class="btn btn-primary" id="imt">Cek IMT
                  </button>
                <button type="button" class="btn btn-primary pull-right" id="gizi">Cek Kebutuhan Gizi
                  </button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-md-4" id="box_hasil">
          <div class="box box-info">
            <div class="box-header" align="center">
              <h3 class="box-title" id="title-hasil">Hasil Analisa</h3>
            </div>
            <div class="box-body">
              <div>
                  <font size="3" id="hasil-desc1"></font>
                  <span id="hasil1"></span>
                </div>
                <div id="bbi">
                  <font size="3">Berat Badan Ideal Anda: </font>
                  <span id="hasil2"></span>
                </div>
                <div id="rincian">
                <font size="3">Dengan Rincian: </font>
                  <div><font size="3">-Karbohidrat: </font>
                    <span id="karbo"></span>
                  </div>
                  <div><font size="3">-Lemak: </font>
                      <span id="lemak"></span>
                  </div>
                  <div><font size="3">-Protein: </font>
                      <span id="protein"></span>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="jenis-aktivitas">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Contoh Jenis Aktivitas</h4>
              </div>
              <div class="modal-body">
                <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Kategori Aktivitas</th>
                  <th>Contoh Jenis Aktivitas</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Sangat Ringan</td>
                  <td>
                    <span>Tidur, Berbaring, Menulis, Mengetik</span>
                  </td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Ringan</td>
                  <td>
                    <span> Menyapu, Menjahit, Mencuci piring, Menghias ruangan</span>
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Sedang</td>
                  <td>
                    <span>Sekolah, Kuliah, Kerja kantor, Mencangkul, Mancabut rumput</span>
                  </td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Berat</td>
                  <td>
                    <span> Menggergaji pohon dengan gergaji tangan, Mendaki gunung, Menarik becak</span>
                  </td>
                </tr>
                
              </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tutup</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function(){
      var box_hasil = $('#box_hasil');
      var rincian = $('#rincian');
      var bbi = $('#bbi');
      var bb = $('#bb');
      var tb = $('#tb');
      var usia = $('#usia');
      var jkl = $('#jkl');
      var aktivitas = $('#aktivitas');
      box_hasil.hide();
      rincian.hide();
      bbi.hide();
      bb.focus();
      $('.pria').hide();
      $('.wanita').hide();
      jkl.change(function(){
        if(jkl.val()=="Laki-laki"){
          $('.pria').show();
          $('.wanita').hide();
        } else{
          $('.pria').hide();
          $('.wanita').show();
        }
      })

      $('#imt').click(function(){
        if(bb.val()==""){
          alert("Masukkan berat badan anda");
          bb.focus();
        } else if(tb.val()==""){
          alert("Masukkan tinggi badan anda");
          tb.focus();
        }
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('C_konsultasi/hitungIMT')?>",
          data: 'bb='+ bb.val()+'&tb=' + tb.val(),
          success : function(data){
            $('#hasil-desc1').text('Kategori IMT Badan Anda: ');
            box_hasil.show();
            bbi.show();
            rincian.hide();
            $('#hasil1').html(data.k_imt);
            $('#hasil2').html(data.bbi);
            aktivitas.val(0);
            jkl.val(0);
            $('.pria').hide();
            $('.wanita').hide();
          }
        });
      })
      $('#gizi').click(function(){
        if(bb.val()==""){
          alert("Masukkan berat badan anda");
          bb.focus();
        } else if(tb.val()==""){
          alert("Masukkan tinggi badan anda");
          tb.focus();
        } else if(usia.val()==""){
          alert("Masukkan usia anda");
          usia.focus();
        } else if(jkl.val()=="0"){
          alert("Pilih jenis kelamin anda");
          jkl.focus();
        } else if(aktivitas.val()=="0"){
          alert("Pilih kategori aktivitas anda");
          aktivitas.focus();
        } else{
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('C_konsultasi/hitungGizi')?>",
            data: 'bb='+ bb.val()+'&tb=' + tb.val()+'&usia=' + usia.val()+'&jkl=' + jkl.val()+'&aktivitas=' + aktivitas.val(),
            success : function(data){
              $('#hasil-desc1').text('Kebutuhan Zat Gizi Anda: ');
              $('#hasil-desc2').text('Dengan Rincian: ');
              box_hasil.show();
              bbi.hide();
              rincian.show();
              $('#hasil1').html(data.gizi);
              $('#karbo').html(data.karbo);
              $('#lemak').html(data.lemak);
              $('#protein').html(data.protein);
              aktivitas.val(0);
              jkl.val(0);
              $('.pria').hide();
              $('.wanita').hide();
            }
          });
        }
      })
    })
  </script>