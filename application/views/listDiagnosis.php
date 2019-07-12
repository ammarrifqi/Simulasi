
<div class="content-wrapper">
    <section class="content">
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        			<div class="box-header" align="center">
		              <h3 class="box-title"><font size="5">Daftar Jenis Penyakit Diagnosis Otomatis</font></h3>
		            </div>
		            <div class="col-md-2">
		            	<a href="#" data-toggle="modal" data-target="#modal-jp">
		            	<button type="button" class="btn btn-primary" id="tambah">
		              	<i class="fa fa-plus">&nbsp;Tambah</i></button></a>
		            </div>
		            <div class="col-md-12"></div>
		            <!-- /.box-header -->
		            <div class="box-body" style="margin-top:40px">
		              <table id="tabel" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Jenis Penyakit</th>
		                  <th>Deskripsi</th>
		                  <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                <?php foreach ($dataJP as $i => $jp) {
			                echo '<tr>'.
			                  '<td>'.($i+1).'</td>'.
			                  '<td>'.$jp->getJenis().'</td>'.
			                  '<td>'.$jp->getDeskripsi().'</td>';?>
			                <td>
		                      <a href="#" data-toggle="tooltip" title="Edit" data-target="#modal-jp" onclick= "edit_jp('<?php echo $jp->getId()?>')">
		                        <span class="btn btn-success"><i class="fa fa-pencil"></i></span> 
		                      </a>
		                      <a href="<?php echo base_url('C_Penyakit/formGejala/'.$jp->getId().'?status=Kelola')?>" data-toggle="tooltip" title="Kelola">
		                        <span class="btn btn-primary"><i class="fa fa-folder-open"></i></span> 
		                      </a>
		                      <a href="<?php echo base_url('C_Penyakit/formGejala/'.$jp->getId().'?status=Hapus')?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus jenis diagnosis otomatis ini?')">
		                        <span class="btn btn-danger"><i class="fa fa-trash"></i></span> 
		                      </a>
		                    </td>  
			                </tr>
		                <?php }?>
		                </tbody>
		              </table>
		            </div>
        		</div>
        	</div>
        </div>
        <div class="modal fade" id="modal-jp">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		          <h4 class="modal-title" id="title">Jenis Penyakit</h4>
		        </div>
		        <?php echo form_open_multipart('C_Penyakit/kelolaJP')?>
		        <div class="modal-body">
			        	<input type="hidden" id="idJenis" name="id">
			        	<input type="hidden" id="state" name="state">
			            <label for="jp" class="col-md-3 control-label">Jenis Penyakit</label>
			            <input type="text" class="col-md-4 form-control" id="jp" name="jp" placeholder="Masukkan jenis penyakit" style="width: 300px"><br><br>
			            <input type="hidden" id="jpH" name="jpH">
			            <label for="desk" class="col-md-3 control-label">Deskripsi</label>
			            <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi..." class="col-md-4 form-control" 
                 style="width: 350px; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br><br>
			            <label for="gmbrJP" class="col-md-3 control-label" style="margin-top:5px">Ganti Gambar</label>
			            <input type="file" class="col-md-4 form-control" name="gmbrJP" id="gmbrJP" style="width: 300px; margin-top:5px">
		            <div class="col-md-12"></div>
		        </div><br><br><br>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
		          <button type="submit" id="simpan-jp" class="btn btn-primary">Simpan</button>
		        </div>
		        <?php echo form_close()?>
		      </div>
		      <!-- /.modal-content -->
		    </div>
		    <!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
    </section>
</div>

<script type="text/javascript">
	var title = $('#title');
	var jp =  $("#jp");
	var jpH = $("#jpH");
	var deskripsi = $("#deskripsi");
	var idJenis = $("#idJenis");
	var state = $('#state');
	function edit_jp(id){
		$.ajax({
	        url : "<?php echo base_url('C_Penyakit/ambilJP/')?>/"+id,
	        type: "GET",
	        dataType: "JSON",
	        success : function(data){
	          idJenis.val(data.idJenis);
	          jp.val(data.jenis);
	          jpH.val(data.jenis);
	          deskripsi.val(data.deskripsi);
	          state.val('edit');
	          $('#modal-jp').modal('show');
	          title.text('Edit Jenis Penyakit');
	          document.getElementById("jp").disabled = true;
	        }
      });
	}

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip({
			placement: 'top'
		});
		$('#tambah').click(function(){
			title.text('Tambah Jenis Penyakit');
			document.getElementById("jp").disabled = false;
		    jp.val('');
		    deskripsi.val('');
		    state.val('tambah');
		});
		// $('#simpan-jp').click(function(){
		// 	$.ajax({
		// 		url : "<?php echo base_url('C_Penyakit/kelolaJP')?>",
		// 		type : "POST",
		// 		data : $('#form').serialize(),
		// 		success : function (data){
		// 			window.location.reload("<?php echo base_url() ?>" + data);
		// 		}
		// 	});
		// });
	})
</script>
