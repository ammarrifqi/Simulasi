<!DOCTYPE html>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
		            <div class="box-header" align="center">
		              <h2>Saran Resep Dokter</h2>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              <table id="tabel" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Sesi</th>
		                  <th>Dokter</th>
		                  <th>Saran Resep Obat</th>
		                  <th>Waktu</th>
		                </tr>
		                </thead>
		                <tbody>
		                <?php foreach ($resep as $i => $rsp) {
		                	if($rsp->getResep()==null){
		                		continue;
		                	} else {
				                echo '<tr>'.
				                  '<td>'.($i+1).'</td>'.
				                  '<td>'.$rsp->getSesi().'</td>'.
				                  '<td>'.$rsp->getDokter().'</td>'.
				                  '<td>'.$rsp->getResep().'</td>'.
				                  '<td>'.$rsp->getTime().'</td>'.
				                '</tr>';
			            	}
		                }?>
		                </tbody>
		              </table>
            		</div>
            	</div>
            <!-- /.box-body -->
        	</div>
        </div>
    </section>
</div>