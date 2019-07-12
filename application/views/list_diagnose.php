<div class="content-wrapper">
	<section class="content-header">
      <div class="callout callout-info">
          <h4>Diagnosis Otomatis</h4>
          <p>Diagnosis Otomatis merupakan fitur dari sistem telehealth dimana anda 
                dapat melakukan diagnosa secara otomatis dengan memilih gejala-gejala yang anda alami.</p>
      </div>
    </section>
	<section class="content">
		<div class="row">
	      <?php foreach ($jenis as $jp):?>
	        <div class="col-md-8 col-sm-6 col-xs-12">
	          <div class="info-box">
	          	
	            <span class="info-box-icon bg-aqua" style="width:300px;height:200px">
	            	<img src="<?php echo $jp->getImg()?>" style="margin-top:0px; width:300px;height:200px" >
	            </span>
	            <div class="info-box-content" style="height:200px">
	              <span class="info-box-text"><font size="4"><b><?php echo $jp->getJenis()?></b></font></span>
	              <span class="info-box-description"><?php echo $jp->getDeskripsi()?></span><br>
	              <a href="<?php echo base_url('C_Penyakit/daftarGejala/'.$jp->getId().'?img='.$jp->getImg())?>"><span class="btn btn-primary" style="margin-top:10px">Diagnosa</span></a>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	    <?php endforeach;?>
		</div>
	</section>
</div>