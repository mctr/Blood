<?php
include("layout/_head.php");
include("layout/_header.php");
?>

  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-ok"></i><span>Menü</span></a></li>
    <li><a href="#tab2" data-toggle="tab"><i class="icon-info-sign"></i><span>Kişisel Bilgiler</span></a></li>
    <li><a href="#tab3" data-toggle="tab"><i class="icon-lock"></i><span>Parola Degiştir</span></a></li>
    <li><a href="#tab4" data-toggle="tab"><i class="icon-leaf"></i><span>Saglık Bilgileri</span></a></li>
    <li><a href="#tab5" data-toggle="tab"><i class="icon-map-marker"></i><span>Acil Kan Bagışı İstegi</span></a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <p>Üst menüden işlemlerinizi gerçekleştirebilirsiniz..</p>
    </div>
    <div class="tab-pane" id="tab2">
		<?php// include "kullanicibilgiguncelle.php"; ?>
      <a href="kullanicibilgiguncelle.php">Kullanıcı Bilgilerinizi Güncelleyebilirsiniz..</a>
	</div>
	<div class="tab-pane" id="tab3">
      <?php //include "parolabilgiekrani.php"; ?>
      <a href="parolabilgiekrani.php">Parolanızı Degiştirebilirsiniz..</a>
	</div>
	<div class="tab-pane" id="tab4">
      <a href="kanvermedurumu.php">Son Kan Verme Tarihinizi Degiştirebilirsiniz..</a>
	</div>
	<div class="tab-pane" id="tab5">
      <a href="acilkantalebi.php">Acil Kan Talebinde Bulunabilirsiniz..</a>
	</div>
  </div>


<?php
include('layout/_footer.php');
?>
