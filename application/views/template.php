<html>
<head>
<title><?= $judul ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?=base_url()?>aset/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?=base_url()?>aset/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?=base_url()?>aset/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?=base_url()?>aset/css/font.css" type="text/css"/>
<link href="<?=base_url()?>aset/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>aset/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="<?=base_url()?>aset/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="<?=base_url()?>aset/js/jquery2.0.3.min.js"></script>
<script src="<?=base_url()?>aset/js/raphael-min.js"></script>
<script src="<?=base_url()?>aset/js/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="" class="logo">
        TOGAMEDIA
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="">
                <img alt="" src="<?=base_url()?>aset/images/3.png">
                <span class="username"><?=$_SESSION['nama_kasir']?> | <?=$_SESSION['level']?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="<?=base_url('index.php/kasir/logout')?>"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li><a href="<?=base_url('index.php/buku/dashboard')?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                <?php if ($this->session->userdata("level") =="Admin"):?>
                <li><a href="<?=base_url('index.php/buku')?>"><i class="fa fa-book"></i><span>Daftar Buku</span></a></li>
                
                  <li><a href="<?=base_url('index.php/transaksi/pesanan')?>"><i class="fa fa-list"></i><span>Daftar Pesanan</span></a></li>
                <?php endif ?>
                  <li><a href="<?=base_url('index.php/transaksi')?>"><i class="fa fa-credit-card"></i><span>Transaksi</span></a></li>
  
            </ul>
          </div>
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
    <?php $this->load->view($konten);  ?>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2018 Visitors. All rights reserved | Design by <a href="">Adam Fitrah Ramadhan</a></p>
			</div>
		  </div>
</section>
</section>
<script src="<?=base_url()?>aset/js/bootstrap.js"></script>
<script src="<?=base_url()?>aset/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=base_url()?>aset/js/scripts.js"></script>
<script src="<?=base_url()?>aset/js/jquery.slimscroll.js"></script>
<script src="<?=base_url()?>aset/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?=base_url()?>aset/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?=base_url()?>aset/js/jquery.scrollTo.js"></script>
</body>
</html>