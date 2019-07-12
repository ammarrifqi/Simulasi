<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->session->userdata('title')?></title>
  <link rel="icon" type="image/png" href="<?php echo base_url('asset/dist/img/tele-icon.png')?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <script type="text/javascript" src="<?php echo base_url()?>asset/dist/js/jquery-1.4.3.min.js"></script>
  
  <script type="text/javascript">
  $(document).ready(function(){
    function notif(){
      $.ajax({
              url: "<?php echo base_url('C_konsultasi/lihatNotif')?>",
              cache: false,
              success: function(msg){
                  $("#jlhNotif").html(msg.jumlah);
                  $("#notify").html(msg.notif);
              }
          });
    }
    setInterval(function(){
      notif();
    },1000);
    var error = $('#error_pass');
      error.hide();
      var passBaru = $('#passBaru');
      var re_pass= $('#re-pass');
      $('#simpan-pass').click(function(){
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('C_user/gantiPass')?>",
          data: 'passBaru='+passBaru.val()+'&re_pass='+ re_pass.val(),
          success :function(data){
            if ('Error'==data) {
              error.show();
              passBaru.val('');
              re_pass.val('');
            } else {
              window.location.href = "<?php echo base_url() ?>" + data;
            }
          }
        });
      })
  });
  </script>

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bootstrap/css/bootstrap.min.css">

  <style>
    .pesan{
        display: none;
        position: center;
        border: 1px solid blue;
        width: 330px;
        top: 10px;
        left: 200px;
        padding: 5px 10px;
        background-color: lightskyblue;
        text-align: center;
    }
  </style>

  <script src="<?php echo base_url()?>asset/bootstrap/js/jquery.min.js"></script>

  <script type="text/javascript">
//            angka 100 dibawah ini artinya pesan akan muncul dalam 0,1 detik setelah document ready
    $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 100);});
//            angka 5000 dibawah ini artinya pesan akan hilang dalam 5 detik setelah muncul
    setTimeout(function(){$(".pesan").fadeOut('slow');}, 5000);
  </script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/iCheck/all.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/morris/morris.css"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/datatables/dataTables.bootstrap.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url($this->session->userdata('link'))?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HEAL</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Telehealth</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php if ($this->session->userdata('level')!=3):?>
          <!-- Messages: style can be found in dropdown.less-->
          <!-- <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="mainNotif">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="jlhNotif"></span>
            </a>
            <ul class="dropdown-menu" id="menuNotif" style="width: 375px;">
              <li class="header"><b style="color:blue">Pemberitahuan</b></li>
              <li>
                  <ul class="menu" id="notify">
                  </ul>
                </li>
            </ul>
          </li> -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="jlhNotif"></span>
            </a>
            <ul class="dropdown-menu" id="menuNotif" style="width: 300px;">
              <li class="header"><b style="color:blue">Pemberitahuan</b></li>
              <li>
                <!-- inner menu: contains the actual data -->
                 <ul class="menu" id="notify">
                  </ul>
              </li>
            </ul>
          </li>
        <?php endif;?>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" id="content">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url($this->session->userdata('img'))?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url($this->session->userdata('img'))?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama');?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer" >
              <?php if($this->session->userdata('level')!=3){?>
                <div class="pull-left">
                  <?php if($this->session->userdata('level')==1){?>
                          <a href="<?php echo base_url()?>C_member/formeditprofile" class="btn btn-default btn-flat">Edit Profile</a>
                        <?php } else {?>
                          <a href="<?php echo base_url()?>C_dokter/formeditprofile" class="btn btn-default btn-flat">Edit Profile</a>
                        <?php }?>
                </div>
              <?php } else{?>
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-password">Ganti Password</a>
                </div>
                <?php }?>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>C_user/logout" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>

            </ul>
      </div>

      
    </nav>

  </header>
  <div class="modal fade" id="modal-password">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ganti Password</h4>
        </div>
        <div class="modal-body">
            <div id="error_pass"><label class="alert alert-danger col-md-12" > Password salah</label><br><br><br><br></div>
            <label for="passLama" class="col-md-3 control-label">Password Baru</label>
            <input type="password" class="col-md-4 form-control" id="passBaru" placeholder="Masukkan Password Baru" style="width: 300px"><br><br>
            <label for="passLama" class="col-md-3 control-label">Ulangi Password</label>
            <input type="password" class="col-md-4 form-control" id="re-pass" placeholder="Ulangi Password Baru" style="width: 300px"><br><br>
            <div class="col-md-12"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
          <button type="button" id="simpan-pass" class="btn btn-primary">Simpan Password</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
        <!-- /.modal -->