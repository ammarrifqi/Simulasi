<html>
<head>
<title>Rekam Medis PDF</title>
</head>
<body>
<div align="center">
    <h3>Rekam Medis <?php echo $pasien->getNama()?></h3>
    <img src="<?php echo base_url($pasien->getImg())?>" style="width: 100px; height: 100px">
</div>
<div>
    <div>
        <label>Nama: <?php echo $pasien->getNama()?></label>
    </div> <br>
    <div>
        <label>Tempat, Tanggal Lahir: <?php echo $pasien->getTtl()?></label>
    </div><br>
    <div class="col-md-2">
        <label>Jenis Kelamin: <?php echo $pasien->getJenis_kl()?></label>
    </div><br>
    <div class="col-md-2">
        <label>No. HP: <?php echo $pasien->getNo_telp()?></label>
    </div><br>
    <div class="col-md-2">
        <label>Alamat: <?php echo $pasien->getAlamat()?></label>
    </div>

</div><br> 
<?php if($rkmMedis==null){?>
    <div align="center">Belum Memiliki Rekam Medis</div>
<?php } else {?>
    <table border="1">
            <tr> 
                <th style="width: 20px">No.</th>
                <th align="center">Sesi Konsultasi</th>
                <th align="center">Dokter</th>
                <th align="center">Keluhan</th>
                <th align="center">Diagnosis</th>
                <th align="center">Penanganan</th>
                <th align="center">Saran Resep</th>
                <th align="center">Waktu</th>
            </tr>
        <?php 
            foreach ($rkmMedis as $i => $rkm) {
                echo '<tr>'.
                      '<td align="center">'.($i+1).'</td>'.
                      '<td>'.$rkm->getSesi().'</td>'.
                      '<td>'.$rkm->getDokter().'</td>'.
                      '<td>'.$rkm->getKeluhan().'</td>'.
                      '<td>'.$rkm->getDiagnosis().'</td>'.
                      '<td>'.$rkm->getPenanganan().'</td>'.
                      '<td>'.$rkm->getResep().'</td>'.
                      '<td>'.$rkm->getTime().'</td>'.
                    '</tr>';
            }
       echo '</table>';
    }?>
 
</body>
</html>