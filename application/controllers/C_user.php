<?php
// require_once(ENTITY_DIR  . "UserEntity.php");
// require_once(ENTITY_DIR  . "MemberEntity.php");
class C_user extends CI_Controller{
	private $dataUser;
	function __construct(){
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_member');
        $this->load->model('M_dokter');
    }

    public function index(){
		$data="";
		if($this->session->userdata('is_login')){
			redirect($this->session->userdata('link'));
		} else{
			if($this->input->get('register')=="true"){
				$this->load->view('formRegister',$data);
			} else if($this->input->get('login')=="true") {
				$this->load->view('formLogin',$data);
			} else {
				$this->session->set_userdata('title','Telehealth System');
				$this->load->view('header');
				$this->load->view('sidebar');
				$this->load->view('home',$data);
				$this->load->view('footer');
			}
		}
	}

	public function login(){
		$this->dataUser=$this->M_user->getUserByLogin($this->input->post('username'),$this->input->post('password'));
		$link = "C_user?login=true";
		if($this->dataUser!=null){
			$sessionData['is_login']=TRUE;
			switch($this->dataUser->getLevel()){
				case 1: {
					$link='C_member';
					break;
					}
				case 2:{
					$link='C_dokter';
					break;
				} 
				case 3: {
					$link='C_admin';
					break;
				}
			}
			$this->M_dokter->updateStatus("Online");
			$sessionData['link'] = $link;
			$this->session->set_userdata($sessionData);
		}
		else{
			$this->session->set_flashdata('error', 'Username atau Password Anda SALAH');
		}
		redirect($link);
	}

	
	public function loginHeader(){
		$this->dataUser=$this->M_user->getUserByLogin($this->input->post('username'),$this->input->post('password'));
		// var_dump($this->dataUser);
		if($this->dataUser!=null){
			$sessionData['is_login']=TRUE;

			switch($this->dataUser->getLevel()){
				case 1: {
					$link='C_member';
					break;
					}
				case 2:{
					$link='C_dokter';
					break;
				} 
				case 3: {
					$link='C_admin';
					break;
				}
			}
			$this->M_dokter->updateStatus("Online");
			$sessionData['link'] = $link;
			$this->session->set_userdata($sessionData);
			echo $link;
		}
		else{
			echo "Error";
		}
	}

	public function register(){
		if($this->input->post('password')!=$this->input->post('re_pass')){
				$this->session->set_flashdata('error', 'Password dan Ulangi Password tidak cocok');
				$this->session->set_flashdata('success', '');
				redirect('C_user?register=true');
		} else{
			$this->M_user->addUser('foto-default.png', 1);
			$this->M_member->addMember();

			$this->session->set_flashdata('error', '');
			redirect('C_member');
		}
	}

	public function gantiPass(){
        if($this->input->post('passBaru')!=$this->input->post('re_pass')){
            echo "Error";
        } else{
        	$this->session->set_userdata('pesan', 'Pergantian Password Berhasil');
        	$this->M_user->gantiPassword($this->session->userdata('id'),$this->input->post('passBaru'));
            if($this->session->userdata('level')==1){
            	echo "C_member/formeditprofile";
            } else if($this->session->userdata('level')==2){
            	echo "C_dokter/formeditprofile";
            } else{
            	echo "C_admin";
            }
        }
    }

    public function edit(){
    	$link="";
    	if($this->session->userdata('level')==1){
	        $this->M_member->editMember();
	       	$link="C_member/formeditprofile";
       	} else{
       		$this->M_dokter->editDokter();
       		$link="C_dokter/formeditprofile";
       	}
       	
       	$this->M_user->editUser();
       	$this->session->set_flashdata('pesan',"Perubahan Profil Anda Telah Disimpan");
       	redirect($link);
    }

    public function gantiFoto(){
    	$error="";
        $config['upload_path'] = BASEPATH.'../asset/dist/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '3074';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload("foto")){
            $error = array ('error'=>$this->upload->display_errors());
            print_r($this->upload->display_errors());
        }else {
            $img=$this->upload->data();
            $images=$img['file_name'];
        }
        $this->M_user->gantiFoto($images);
        if($this->session->userdata('level')==1){
        	$this->M_member->gantiFoto($images);
        	redirect("C_member/formeditprofile");
        } else{
        	$this->M_dokter->gantiFoto($images);
        	redirect("C_dokter/formeditprofile");
        }
    }

	public function logout(){
		if($this->session->userdata('level')==2){
			$this->M_dokter->updateStatus('Offline');
		}
		$this->session->sess_destroy();
		redirect('C_user?login=true');
	}
}