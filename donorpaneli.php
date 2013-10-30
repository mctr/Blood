<?php
include("layout/_head.php");
include("layout/_header.php");
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-ok"></i>Menü</a></li>
    <li><a href="#tab2" data-toggle="tab"><i class="icon-info-sign"></i>Kişisel Bilgiler</a></li>
    <li><a href="#tab3" data-toggle="tab"><i class="icon-lock"></i>Parola Degiştir</a></li>
    <li><a href="#tab4" data-toggle="tab"><i class="icon-leaf"></i>Saglık Bilgileri</a></li>
    <li><a href="#tab5" data-toggle="tab"><i class="icon-map-marker"></i>Acil Kan Bagışı İstegi</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <p>Üst menüden işlemlerinizi gerçekleştirebilirsiniz.</p>
    </div>
    <div class="tab-pane" id="tab2">
	<!-- kullanıcı bilgi güncelle -->
      <?php include("kullanicibilgiguncelle.php"); ?>
      
	<!-- kullanıcı bilgi güncelle bitiş -->
	</div>
	
<?php
include('layout/_footer.php');
?>
