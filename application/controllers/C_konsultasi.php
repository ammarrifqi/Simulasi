<?php

class C_konsultasi extends CI_Controller{
	private $dataKonsul, $dataInfo, $dataNotif, $jlhnotif, $isiNotif;

	function __construct(){
		parent:: __construct();
		$this->load->library('session');
		$this->load->model('M_konsultasi');
		$this->load->model('M_dokter');
		$this->load->model('M_member');
		$this->load->model('M_user');
	}

	public function index(){
		if($this->session->userdata('is_login')){
			if ($this->session->userdata('level')==1) {
				$this->session->set_userdata('title','Konsultasi Dokter');
				$data['dokter']=$this->M_dokter->dokterByKonsul($this->session->userdata('id'));
				$data['allDokter']= $this->M_dokter->allDokter();
				$data['status']='member';
				$this->autoload('list_dokter',$data);
			} else{
				$this->session->set_userdata('title','Daftar Konsultasi');
				$data['member']=$this->M_member->memberByKonsul($this->session->userdata('id'));
				$data['status']='dokter';
				$this->autoload('list_member',$data);
			}
		} else {
			$this->session->set_flashdata('error', 'Silahkan Login Terlebih Dahulu');
			redirect('C_user?login=true');
		}
	}

	public function autoload($content, $data){
		if ($this->session->userdata('is_login')) {
			$this->casting($this->session->userdata('level'));
		} else{
			$this->load->view('header');
			$this->load->view('sidebar');
		}
		$this->load->view($content,$data);
		$this->load->view('footer');
	}

	public function casting($level){
		switch ($level) {
			case 1:
				$this->load->view('headerAkun');
				$this->load->view('sidebarMember');
				break;
			case 2:
				$this->load->view('headerAkun');
				$this->load->view('sidebarDokter');
				break;
			case 3:
				$this->load->view('headerAkun');
				$this->load->view('sidebarAdmin');
				break;
		}
	}
	public function halamanKonsul($idPenerima){
		$id="";
		$user="";
		if ($this->session->userdata('level')==1) {
			$this->session->set_userdata('title','Konsultasi Dokter');
			$user=$this->M_dokter->dokterById($idPenerima);
			$data['status']='member';
			$id = $user->getId();
		} else{
			$this->session->set_userdata('title','Daftar Konsultasi');
			$user=$this->M_member->memberById($idPenerima);
			$data['status']='dokter';
			$id = $user->getId();
		}
		$sesi=$this->input->post('sesi');
		if($this->input->get('sesi')!=''){
			$sesi = $this->input->get('sesi');
		}
		$data['usr'] = $user;
		if($this->input->post('sesi')!='' or $this->input->get('sesi')!=''){
			$this->session->set_userdata('sesi',$sesi);
		}
		$tempData = $this->M_konsultasi->rkmMedisBySesi($id);
		$data['rkmPasien'] = $this->M_konsultasi->getRekamMds($id);
		$data['dataFile'] = $this->M_konsultasi->getFile($this->session->userdata('id'),$idPenerima);
		$this->session->set_userdata('id_notif',$this->input->get('id'));
		$this->M_konsultasi->updateNotif($this->input->get('id'));
		$data['id_recv'] = $id;
		if($tempData!=null){
			$data['rkmSesi']=$tempData;
		} else{
			$data['rkmSesi']='';
		}
		$this->autoload('form_konsul',$data);
	}

	public function historyKonsul($idPenerima){
		$user="";
		if ($this->session->userdata('level')==1) {
			$user=$this->M_dokter->dokterById($idPenerima);
			$data['status']='member';
		} else{
			$user=$this->M_member->memberById($idPenerima);
			$data['status']='dokter';
		}
		$this->session->set_userdata('title','Daftar Sesi Konsultasi');
		$data['user'] = $user;
		$this->dataKonsul = $this->M_konsultasi->konsulBySesi($idPenerima);
		$data['history'] = $this->dataKonsul;
		$this->autoload('history_konsul', $data);
	}

	public function searchKonsulSesi($idPenerima){
		$cari = $this->input->post('cari');
		$this->dataKonsul = $this->M_konsultasi->searchSesi($idPenerima,$cari);
		if($this->dataKonsul != null){
			foreach ($this->dataKonsul as $k):
				echo '<li class="item">'.
                      '<div class="konsul-info">'.
                        '<a href="'. base_url('C_konsultasi/halamanKonsul/'.$idPenerima).'?sesi='.$k->getSesi().'" class="product-title"><font size="3">Sesi Konsultasi: '. $k->getSesi().'</font>'.
                            '<button type="submit" class="btn btn-primary pull-right" id="konsul-dokter">'.
                                '<i class="fa fa-comments">&nbsp;&nbsp;Lihat Konsultasi</i>'.
                            '</button>'.
                            '<span class="product-description">'.
                              'Waktu:'. $k->getTime().
                            '</span>'.
                           '</a>'.
                          '</div>'.
                      '</li>';
			endforeach;
		} else{
			echo '<div> <font size="3"> Sesi Tidak Ditemukan</font></div>';
		}
	}

	public function simpanMedis(){
		$this->M_konsultasi->simpanRekamMds($this->input->post('pasien'),$this->input->post('keluhan'),
			$this->input->post('diagnosis'),$this->input->post('penanganan'));
	}

	public function cekRekam($idPasien){
		$data = $this->M_konsultasi->getRekamMds($idPasien);
		$tampilrekam="";
		if($data==null){
          $tampilrekam ='';
        } else{
          foreach ($data as $i => $rkm){
            $tampilrekam .= '<tr>'.
              '<td>'.($i+1).'</td>'.
              '<td>'.$rkm->getSesi().'</td>'.
              '<td>'.$rkm->getDokter().'</td>'.
              '<td>'.$rkm->getKeluhan().'</td>'.
              '<td>'.$rkm->getDiagnosis(). '</td>'.
              '<td>'.$rkm->getPenanganan().'</td>'.
              '<td>'.$rkm->getResep().'</td>'.
              '<td>'.$rkm->getTime().'</td>'.
            '</tr>';
          }
        }
        echo $tampilrekam;
	}

	public function rekamPDF($idPasien){
		ob_start();
		$data['rkmMedis'] = $this->M_konsultasi->getRekamMds($idPasien);
		$data['pasien'] = $this->M_member->memberById($idPasien);
		$nama = $data['pasien']->getNama();
		$this->load->view('rekam_medis_PDF',$data);
		$html = ob_get_contents();
		ob_end_clean();
		require_once('./asset/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Rekam Medis '.$nama.'.pdf','D');
	}

	public function kirimResep(){
		$this->M_konsultasi->simpanResep($this->input->post('pasien'),$this->input->post('resep'));

	}

	public function saranResep(){
		$data['resep']=$this->M_konsultasi->getRekamMds($this->session->userdata('id'));
		$this->session->set_userdata('title','Saran Resep Obat');
		$this->autoload('saranResep',$data);
	}

	public function tampilKonsul($id){
		$this->dataKonsul = $this->M_konsultasi->konsulByPengirim($this->session->userdata('id'),$id, $this->session->userdata('sesi'));
		$img="";
		if($this->dataKonsul==null){
			echo "";
		} else{
			foreach ($this->dataKonsul as $k):
				if($k->getId_dokter()!=null){
	            	$nama=$k->getD_nama();
	            	$img = $k->getD_img();
	            }
	            else{
	            	$nama=$k->getM_nama();
	            	$img = $k->getM_img();
	            }

	            if($this->session->userdata('id')==$k->getPengirim()){
	                // <!-- Message to the right -->
	                echo '<div class="direct-chat-msg right">'.
	                    '<div class="direct-chat-info clearfix">'.
	                      '<span class="direct-chat-name pull-right">Anda</span>'.
	                      '<span class="direct-chat-timestamp pull-left">'.$k->getTime(). '</span>'.
	                    '</div>'.
	                    // <!-- /.direct-chat-info -->
	                    '<img class="direct-chat-img" src="'. base_url($img). '" alt="message user image">'.
	                    // <!-- /.direct-chat-img -->
	                    '<div class="direct-chat-text">'.
	                      $k->getIsi_konsul().
	                    '</div>'.
	                    // <!-- /.direct-chat-text -->
	                  '</div>';
	                  // <!-- /.direct-chat-msg -->
	            } else{
		              // <!-- Message. Default to the left -->
		            echo '<div class="direct-chat-msg">'.
		                '<div class="direct-chat-info clearfix">'.
		                  '<span class="direct-chat-name pull-left">'.$nama.'</span>'.
		                  '<span class="direct-chat-timestamp pull-right">' .$k->getTime(). '</span>'.
		                '</div>'.
		                // <!-- /.direct-chat-info -->
		                '<img class="direct-chat-img" src="'.base_url($img).'" alt="message user image">'.
		                '<div class="direct-chat-text">'.
		                  $k->getIsi_konsul().
		                '</div>'.
		                // <!-- /.direct-chat-text -->
		              '</div>';
		              // <!-- /.direct-chat-msg -->
	            }
	        endforeach;
    	}
	}

	public function tambahKonsul(){
		$this->M_konsultasi->addKonsul($this->input->post('penerima'),$this->session->userdata('sesi'));
		$this->M_konsultasi->tambahNotif($this->input->post('penerima'),$this->session->userdata('sesi'));
		// $this->session->set_userdata('penerima',$this->input->post('penerima'));
		// redirect('konsulController/tampilKonsul/'.$this->input->post('penerima'));
	}

	public function cekStatus($id){
		$dokter=$this->M_dokter->dokterById($id);
		if ($dokter->getStatus()=="Online") {
			echo '<span class="label label-success">Online</span>';
		} else {
			echo '<span class="label label-warning">Offline</span>';
		}

	}

	public function tampilCheck(){
		$data="";
		$this->session->set_userdata('title','Cek IMT dan Gizi');
		$this->autoload('formCheck',$data);
	}

	public function imt($bb,$tb){
		$imt = number_format($bb/(($tb/100)*($tb/100)),1);
		$k_imt="";
		if($imt<17){
			$k_imt = 'Sangat Kurus';
		} else if($imt>=17 && $imt<=18.4){
			$k_imt = 'Kurus';
		} else if($imt>=18.5 && $imt <=25){
			$k_imt = 'Normal';
		} else if($imt>=25.1 && $imt <=27){
			$k_imt = 'Gemuk';
		} else{
			$k_imt = 'Obesitas';
		}
		return $k_imt;
	}

	public function bbi($tb){
		$bbi = (float)($tb-100) - ((10/100)*($tb-100));
		return $bbi;
	}
	public function hitungIMT(){
		header('Content-Type: application/json');
		$data=$this->M_user->dataUserGizi($this->input->post('bb'),$this->input->post('tb'),null,null,null);
		$imt = $this->imt($data['bb'],$data['tb']);
		$k_imt = '<font size="3"><b>'.$imt.'</b></font>';
		
		$bbiTemp = $this->bbi($data['tb']);
		$bbi = '<font size=3><b>'.$bbiTemp.'</b></font>';
		$result = array(
			'k_imt'=> $k_imt,
			'bbi'=> $bbi);
		echo json_encode($result);
	}

	public function hitungGizi(){
		header('Content-Type: application/json');
		$giziTemp ="";
		$rincian="";
		$data=$this->M_user->dataUserGizi($this->input->post('bb'),$this->input->post('tb'),$this->input->post('usia'),$this->input->post('jkl'),$this->input->post('aktivitas'));
		$bb = $data['bb'];
		$tb= $data['tb'];
		$imt = $this->imt($bb,$tb);
		if($imt!="Normal"){
			$bb= $this->bbi($tb);
		}
		$usia = $data['usia'];
		$aktivitas = $data['aktivitas'];
		if($this->input->post('jkl')=="Laki-laki"){
			$giziTemp = (66 + (13.7*$bb)+(5*$tb)-(6.8*$usia))*$aktivitas;
		} else{
			$giziTemp = (655 + (9.6*$bb)+(1.8*$tb)-(4.7*$usia))*$aktivitas;
		}

		$gizi = '<font size="3"><b>'.$giziTemp.' kkal(kilo kalori)</b></font>';
		$karbo1= (60/100)*$giziTemp;
		$karbo2= (75/100)*$giziTemp;
		$karbo = '<b>'.number_format(($karbo1/4),2).' - '.number_format(($karbo2/4),2).' gram </b>';
		$lemak1= (10/100)*$giziTemp;
		$lemak2= (25/100)*$giziTemp;
		$lemak = '<b>'.number_format(($lemak1/9),2).' - '.number_format(($lemak2/9),2).' gram </b>';
		$protein1= (10/100)*$giziTemp;
		$protein2= (15/100)*$giziTemp; 
		$protein = '<b>'.number_format(($protein1/4),2).' - '.number_format(($protein2/4),2).' gram </b>';
		$result= array(
			'gizi'=>$gizi,
			'karbo' => $karbo,
			'lemak' => $lemak,
			'protein'=>$protein
			);
		echo json_encode($result);
	}

	public function lihatNotif(){
		header('Content-Type: application/json');
        if ($this->input->is_ajax_request()) {
			$this->dataNotif=$this->M_konsultasi->notifByPenerima($this->session->userdata('id'));
			$this->jlhnotif=$this->M_konsultasi->jumlahNotif($this->session->userdata('id'));

			if($this->jlhnotif==0){
				$this->isiNotif = "<li><span style=\"color:black\"> Anda tidak memiliki pemberitahuan</span></li>";
			} else{
		  		foreach ($this->dataNotif as $n) {
		  			if($this->session->userdata('level')==1){
		  				$notify='dr. '.$this->M_dokter->dokterById($n->getPengirim())->getNama(). ' menanggapi konsultasi anda';
		  			} else{
		  				$notify='Anda mendapatkan konsultasi dari '.$this->M_member->memberById($n->getPengirim())->getNama();
		  			}
		  			$this->isiNotif .= "<li>" .
			  				'<a href="' . base_url('C_konsultasi/halamanKonsul/'.$n->getPengirim().'?id='.$n->getId()) . '&sesi='.$n->getSesi().'">' .
			  					'<i class="fa fa-users text-aqua"></i>' .
			  					'<span style="color:lightskyblue">' . $notify . '</span>' .
			  				'</a>' .
		            		'</li>';
	  			}
	  		}

	  		$result = array(
                'jumlah' => $this->jlhnotif,
                'notif' => $this->isiNotif
            );
            echo json_encode($result);
        }
	}

	public function configPage($jumlah, $link){
		$this->load->library('pagination');
		$config['base_url']=base_url().$link;
	    $config['total_rows']= $jumlah;
	    $config['per_page']=4;
	    $config['num_links'] = 1;
 
        // Tambahan untuk styling
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
 
        $config['first_link']='< Pertama ';
        $config['last_link']='Terakhir > ';
        $config['next_link']=' > ';
        $config['prev_link']='< ';
	  	
	  	$this->pagination->initialize($config);
	}

	public function listInfo($tipe){
		$this->session->set_userdata('title','Daftar Info '.$tipe);
		$this->session->set_userdata('tipe_info',$tipe);
		
		$jumlah= $this->M_konsultasi->jumlahInfo($tipe);
		$offset=$this->uri->segment(4);
		$this->configPage($jumlah,'C_konsultasi/listInfo/'.$tipe);

		$data['search'] = false;
	  	$data['jenis']=$tipe;
	  	$data['jumlah']=$jumlah;
	  	$data['info'] = $this->M_konsultasi->infoByTipe($tipe,4,$offset);
		$this->autoload('list_info',$data);
	}

	public function searchInfo($tipe){
		$this->session->set_userdata('title','Daftar Info '.$tipe);
		$this->session->set_userdata('tipe_info',$tipe);
		$cari=$this->input->post('cari');
		if($this->input->get('state')=='diagnosis'){
			$cari = $this->input->get('cari');
		}
		if($cari!=''){
			$this->session->set_userdata('cari',$cari);
		}
		$jumlah= $this->M_konsultasi->jumlahInfoSearch($tipe,$cari);
		$offset=$this->uri->segment(4);
		if($offset==null){
			$offset = 0;
		}
		
		$this->configPage($jumlah,'C_konsultasi/searchInfo/'.$tipe);

		$data['search'] = true;
		$data['inputSearch'] = $this->session->userdata('cari');
	  	$data['jenis']=$tipe;
	  	$data['jumlah']=$jumlah;
	  	$data['info'] = $this->M_konsultasi->infoBySearch($tipe,$this->session->userdata('cari'),4,$offset);
		$this->autoload('list_info',$data);
	}

	public function tambahInfo(){
		$images="info-default.jpg";
        $error="";
        $config['upload_path'] = BASEPATH.'../asset/dist/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '3074';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload("gambar")){
            $error = array ('error'=>$this->upload->display_errors());
            print_r($this->upload->display_errors());
        }else {
            $img=$this->upload->data();
            $images=$img['file_name'];
        }
        $this->M_konsultasi->tambahInfoBaru($images);
        $pesan='Info Berhasil Ditambahkan';
        $this->session->set_userdata('pesan', $pesan);
        redirect('C_konsultasi/listInfo/'.$this->input->post('tipe'));
	}

	public function detailInfo($id){
		$this->dataInfo = $this->M_konsultasi->getDetailInfo($id);
		$data['info'] = $this->dataInfo;
		$this->session->set_userdata('tipe_info',$this->dataInfo->getTipe());
		$this->session->set_userdata('title','Info '.$data['info']->getJudul());
		$this->autoload('isiInfo',$data);
	}

	public function uploadFile($idPenerima){
		$datafile="";
		$config['upload_path'] = BASEPATH.'../asset/dist/file/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|docx|pdf|xlsx';
        $config['max_size']    = '5012';
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload("dataFile")){
            $error = array ('error'=>$this->upload->display_errors());
            print_r($this->upload->display_errors());
        }else {
            $file=$this->upload->data();
            $datafile=$file['file_name'];
        }
        $this->M_konsultasi->tambahFile($datafile, $idPenerima);
        redirect('C_konsultasi/halamanKonsul/'.$idPenerima);
	}

	public function down_file($namaFile){
		force_download('asset/dist/file/'.$namaFile,null);
	}


}