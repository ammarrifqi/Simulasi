  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU SISTEM</li>
        <li class="<?php echo ($this->session->userdata('title')=="Telehealth System") ? "active" : ""?>">
          <a href="<?php echo base_url()?>C_user"><i class="fa fa-home"></i> <span>Halaman Utama</span></a>
        </li>
        <li class="<?php echo (($this->session->userdata('title')=="Daftar Info ".$this->session->userdata('tipe_info'))) ? "active" : ""?> treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->session->userdata('tipe_info')=="Kesehatan") ? "active" : ""?>">
              <a href="<?php echo base_url('C_konsultasi/listInfo/'.'Kesehatan')?>"><i class="fa fa-circle-o"></i> Info Kesehatan</a>
            </li>
            <li class="<?php echo ($this->session->userdata('tipe_info')=="Penyakit") ? "active" : ""?>">
              <a href="<?php echo base_url('C_konsultasi/listInfo/'.'Penyakit')?>"><i class="fa fa-circle-o"></i> Info Penyakit</a>
            </li>
          </ul>
        </li>
        <li class="<?php echo ($this->session->userdata('title')=="Daftar Diagnosa Otomatis") ? "active" : ""?>">
          <a href="<?php echo base_url('C_Penyakit')?>"><i class="fa fa-pencil"></i> <span>Diagnosis Otomatis</span></a>
        </li>
        <li class="<?php echo ($this->session->userdata('title')=="Cek IMT dan Gizi") ? "active" : ""?>">
          <a href="<?php echo base_url('C_konsultasi/tampilCheck')?>"><i class="fa fa-male"></i> <span>Cek IMT dan Kebutuhan Gizi</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Login atau Register</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('C_user?login=true')?>"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="<?php echo base_url('C_user?register=true')?>"><i class="fa fa-circle-o"></i> Register</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>