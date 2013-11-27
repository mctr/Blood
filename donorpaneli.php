<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>

     
    <div class="tabbable tabs-left">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-ok"></i>Menü</a></li>
        <li><a href="#tab2" data-toggle="tab"><i class="icon-info-sign"></i>Kişisel Bilgiler</a></li>
        <li><a href="#tab3" data-toggle="tab"><i class="icon-lock"></i>Parola Degiştir</a></li>
        <li><a href="#tab4" data-toggle="tab"><i class="icon-leaf"></i>Saglık Bilgileri</a></li>
        <li><a href="#tab5" data-toggle="tab"><i class="icon-map-marker"></i>Acil Kan Bagışı İstegi</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <div class="container">
              <div class="row">  
                <p class="offset1">Sol menüden işlemlerinizi gerçekleştirebilirsiniz.</p>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="tab2">
            <div class="container">
              <div class="row">
                  <?php include('kullanicibilgiguncelle.php'); ?>                       
              </div>
            </div>
        </div>
        <div class="tab-pane" id="tab3">
            <div class="container">
              <div class="row">
                    <?php include('parolabilgiekrani.php'); ?>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="tab4"> 
            <div class="container">
              <div class="row">
                    <?php include('donor_paneli/kanvermedurumu.php'); ?>                       
              </div>
             </div>
        </div>
        <div class="tab-pane" id="tab5"> 
            <div class="container">
              <div class="row">
                    <?php include('donor_paneli/acilkantalebi.php'); ?>
              </div>
            </div>
        </div>
      </div>
    </div>

</div>

<?php
include('layout/_footer.php');
?>
