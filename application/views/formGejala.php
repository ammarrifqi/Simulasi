<div class="content-wrapper">
    <section class="content">
        <div class="row">
		    <div class="col-xs-12">
		        <div class="box">
		        	<div class="box-header" align="center">
		              <h3 class="box-title"><font size="5">Jenis Penyakit <?php echo $jp->getJenis()?></font></h3>
		            </div>
		        	<div class="box-header">
		              <button type="button" class="btn btn-primary" id="tambah" data-toggle="modal" data-target="#modal-gejala">
		              <i class="fa fa-plus">&nbsp;Tambah Gejala</i></button>
		            </div>
		        	<div class="box-body">
		            <table id="tabel" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Penyakit</th>
		                  <th>Gejala</th>
		                  <th>Densitas (Nilai Peluang)</th>
		                  <th>Aksi</th>
		                </tr>
		                </thead>
		                <tbody>
		                <?php 
		                	if($gejala==null){
		                		echo "";
		                	} else {
			                	foreach ($gejala as $i => $gjl) {
					                echo '<tr>'.
					                  '<td>'.($i+1).'</td>'.
					                  '<td>'.$gjl->getPenyakit().'</td>'.
					                  '<td>'.$gjl->getGejala().'</td>'.
					                  '<td>'.$gjl->getDensitas().'</td>'.
					                  '<td>'.
				                      '<a href="#"'.
				                      'data-toggle="tooltip" title="Edit" onclick="edit_gejala('."'".$gjl->getId()."'".')"'.
				                      '<button type="button" class="btn btn-success"'. 
				                      'id="edit">
				              			<i class="fa fa-edit"></i></button></a>';?>
				              		  <a href="<?php echo base_url('C_Penyakit/delGejala/'.$gjl->getId().'?kode='. $gjl->getKode().'&idJP='.$jp->getId())?>"
				                      data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus gejala ini?')"
				                      <button type="button" class="btn btn-danger" 
				                      id="hapus">
				              			<i class="fa fa-trash"></i></button></a>
				                    <?php echo '</td>'.
					                '</tr>';
		                		}
		                }?>
		                </tbody>
		              </table>

		            </div>
        		</div>
        	</div>
        </div>
        <div class="modal fade" id="modal-gejala">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		          <h4 class="modal-title" id="title">Gejala Penyakit</h4>
		        </div>
		        <div class="modal-body">
		        	<form action="#" id="form" class="form-horizontal">
			        	<input type="hidden" id="idRule" name="id">
			        	<input type="hidden" id="state" name="state">
			            <label for="penyakit" class="col-md-3 control-label">Nama Penyakit</label>
			            <input type="text" class="col-md-4 form-control" id="penyakit" name="penyakit" placeholder="Masukkan nama penyakit" style="width: 300px"><br><br>
			            <input type="hidden" id="penyakitH" name="penyakitH">
			            <label for="kode" class="col-md-3 control-label">Kode Gejala</label>
			            <input type="text" class="col-md-4 form-control" name="kode" id="kode" value="G"style="width: 300px"><br><br>
			            <input type="hidden" id="kodeH" name="kodeH">
			            <label for="gejala" class="col-md-3 control-label">Gejala</label>
			            <input type="text" class="col-md-4 form-control" name="gejala" id="gejala" placeholder="Masukkan gejala" style="width: 300px"><br><br>
			             <label for="densitas" class="col-md-3 control-label">Densitas</label>
			            <input type="text" class="col-md-4 form-control" name="densitas" id="densitas" placeholder="Masukkan densitas" style="width: 300px"><br><br>
		            </form>
		            <div class="col-md-12"></div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
		          <button type="submit" id="simpan-gejala" class="btn btn-primary">Simpan</button>
		        </div>
		      </div>
		      <!-- /.modal-content -->
		    </div>
		    <!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
    </section>
</div>
<script type="text/javascript">
	var kelolaGejala = $('#kelola-gejala');
	var title = $('#title');
	var penyakit =  $("#penyakit");
	var penyakitH = $("#penyakitH");
	var kode =  $("#kode");
	var kodeH = $("#kodeH");
	var gejala = $("#gejala");
	var densitas = $("#densitas");
	var idRule = $("#idRule");
	var idJP = "<?php echo $jp->getId()?>";
	var state = $('#state');
	var status = "<?php echo $this->session->userdata('status')?>";
	function edit_gejala(id){
		$.ajax({
	        url : "<?php echo base_url('C_Penyakit/ambilRule/')?>/"+id,
	        type: "GET",
	        dataType: "JSON",
	        success : function(data){
	          idRule.val(data.idRule);
	          penyakit.val(data.penyakit);
	          penyakitH.val(data.penyakit);
	          kode.val(data.kode);
	          kodeH.val(data.kodeH);
	          gejala.val(data.gejala);
	          densitas.val(data.densitas);
	          state.val('edit');
	          $('#modal-gejala').modal('show');
	          title.text('Edit Gejala Penyakit');
	          document.getElementById("penyakit").disabled = true;
	          document.getElementById("kode").disabled = true;
	          // kelolaGejala.show();
	        }
      });
	}

$(document).ready(function(){
	var desc = $('#deskripsi');
	// kelolaGejala.hide();
	desc.val('<?php echo $jp->getDeskripsi()?>');
	console.log(status);
	// if(status=='Tambah'){
	// 	$('#tabel-gejala').hide();
	// } else{
	// 	$('#tabel-gejala').show();
	// }
	$('#tambah').click(function(){
		kelolaGejala.show();
		title.text('Tambah Gejala Penyakit');
		document.getElementById("penyakit").disabled = false;
	    document.getElementById("kode").disabled = false;
	    penyakit.val('');
	    kode.val('G');
	    gejala.val('');
	    densitas.val('');
	    state.val('tambah');
	});
	$('#simpan-gejala').click(function(){
		$.ajax({
			url : "<?php echo base_url('C_Penyakit/kelolaGejala/')?>/"+idJP,
			type : "POST",
			data : $('#form').serialize(),
			//data : "id="+idRule.val()+"&penyakit="+penyakit.val()+"&kode="+kode.val()+"&gejala="+gejala.val()+"&densitas="+densitas.val()+"&state="+state,
			success : function (data){
				console.log(data);
				window.location.reload("<?php echo base_url() ?>" + data);
			}
		});
	});
})
	
</script>