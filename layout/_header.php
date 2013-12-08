<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      </button>
      <a class="brand" href="./index.php">Kan Merkezi</a>
      <div class="nav-collapse collapse">
	<ul class="nav">
	  <li class="">
	  <a href="./index.php">Anasayfa</a>
	  </li>
	  <li><a href="#">Hakkımızda</a></li>
	  <li><a href="#">İletişim</a></li>
	  </ul>
	  <ul class="nav pull-right">
	  <li>
<?php
  session_start();
  if(isset($_SESSION['admin']))
  {
?>
<li class="dropdown">
    <a class="dropdown-toggle"
       data-toggle="dropdown"
       href="#">
        <i class="icon-user"></i><?php echo $_SESSION['admin']; ?>
        <b class="caret"></b>
      </a>
    <ul class="dropdown-menu">
      <li><a href="adminemin.php">Anasayfa</a></li>
      <li><a href="logout.php">Çıkış Yap</a></li>
    </ul>
  </li>
<?php  } else if(isset($_SESSION['donor'])) { ?>
	<li class="dropdown">
    <a class="dropdown-toggle"
       data-toggle="dropdown"
       href="#">
        <i class="icon-user"></i><?php echo $_SESSION['donor']; ?>
        <b class="caret"></b>
      </a>
    <ul class="dropdown-menu">
      <li><a href="donor_index.php">Anasayfa</a></li>
      <li><a href="logout.php">Çıkış Yap</a></li>
    </ul>
  </li>
<?php }else if (isset($_SESSION['kurum'])) { ?>
	<li class="dropdown">
    <a class="dropdown-toggle"
       data-toggle="dropdown"
       href="#">
        <i class="icon-user"></i><?php echo $_SESSION['kurum']; ?>
        <b class="caret"></b>
      </a>
    <ul class="dropdown-menu">
      <li><a href="kurum_index.php">Anasayfa</a></li>
      <li><a href="logout.php">Çıkış Yap</a></li>
    </ul>
  </li>
<?php } else { ?>
	<li class="dropdown">
    <a class="dropdown-toggle"
       data-toggle="dropdown"
       href="#">
        Giriş Yap
        <b class="caret"></b>
      </a>
    <ul class="dropdown-menu">
      <li><a href="donor_login.php">Donör Girişi</a></li>
      <li><a href="kurum_login.php">Kurum Girişi</a></li>
      <li><a href="login.php">Yönetici Girişi</a></li>
    </ul>
  </li>
<?php } ?>


	  </li>
	  
	</ul>
      </div>
    </div>
  </div>
</div>

<div class="container main">
