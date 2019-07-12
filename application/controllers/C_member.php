<?php

class C_member extends CI_Controller{
	private $dataMember;
	function __construct(){
        parent::__construct();
        $this->load->model('M_member');
    }

    public function index(){
    	$data="";
    	$dataMember = $this->M_member->memberById($this->session->userdata('id'));
    	$sessionData['nama'] = $dataMember->getNama();
    	$sessionData['ttl'] = $dataMember->getTtl();
    	$sessionData['jkl'] = $dataMember->getJenis_kl();
    	$sessionData['alamat'] = $dataMember->getAlamat();
    	$sessionData['no_telp'] = $dataMember->getNo_telp();
    	$sessionData['title'] = 'Member Telehealth | Home';
    	$this->session->set_userdata($sessionData);
    	$this->autoload('home',$data);
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

    public function listMember(){
        $this->session->set_userdata('title','Daftar Member');
        $this->dataMember= $this->M_member->allMember();
        $data['member'] = $this->dataMember;
        $this->autoload('list_member',$data);   
    }
    
    public function formeditprofile(){
        $data['status']= "Member Telehealth";
        $data['link']="C_member/edit";
        $this->session->set_userdata('title','Edit Profil');
        $this->autoload('editProfil',$data);
    }

    public function searchMember(){
        if($this->session->userdata('level')==3){
            $this->dataMember = $this->M_member->search($this->input->post('cari'));
        } else{
            $this->dataMember = $this->M_member->searchMemberByKonsul($this->input->post('cari'));
        }
        if(count($this->dataMember) != 0){
            foreach ($this->dataMember as $m) {?>
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo base_url($m->getImg())?>" class="img-circle" 
                    style="<?php echo ($this->session->userdata('level')==3) ? "width: 100px; height: 100px" : ""?>"/>
                  </div>
                  <div class="member-info">
                    <?php if ($this->session->userdata('level')==2){?>
                        <a href="<?php echo base_url('C_konsultasi/halamanKonsul/'.$m->getId())?>" class="product-title">
                        <?php } else{?>
                        <a href="#" class="product-title">
                        <?php }?>
                        <font size="3"><?php echo $m->getNama()?></font>
                        <?php if($this->session->userdata('level')==3){?>
                            <a href="<?php echo base_url('C_admin/hapusMember/'.$m->getId().'?nama='.$m->getNama())?>" 
                            onclick="return confirm('Anda yakin ingin menghapus member ini?')">
                                <button type="button" class="btn btn-danger pull-right" id="submit"><i class="fa fa-trash"></i>&nbsp;Hapus User
                                </button>
                            </a>
                            <span class="product-description">
                              Tempat, Tanggal Lahir: <?php echo $m->getTtl()?>
                            </span>
                            <span class="product-description">
                              Alamat: <?php echo $m->getAlamat()?>
                            </span>
                            <span class="product-description">
                              Jenis Kelamin<?php echo $m->getJenis_kl()?>
                            </span>
                            <span class="product-description">
                              No Telepon: <?php echo $m->getNo_telp()?>
                            </span>
                        <?php } else{?>
                            <button type="submit" class="btn btn-primary pull-right" id="konsul-member">
                                <i class="fa fa-comments">&nbsp;&nbsp;Balas Konsul</i>
                            </button>
                            <span class="product-description">
                              Waktu: <?php echo $m->getTime()?>
                            </span>
                        <?php }?>
                    </a>       
                  </div>
                </li>
            <?php }
        } else{
            echo '<div> <font size="3"> Member Tidak Ditemukan</font></div>';
        }
    }
}