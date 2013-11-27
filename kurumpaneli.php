<?php
include('layout/_head.php');
include('layout/_header.php');
?>

<div class="tabbable tabs-left">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-ok"></i>Menü</a></li>
        <li><a href="#tab2" data-toggle="tab"><i class="icon-info-sign"></i>Kurum Bilgileri</a></li>
        <li><a href="#tab3" data-toggle="tab"><i class="icon-lock"></i>Parola Degiştir</a></li>
        <li><a href="#tab4" data-toggle="tab"><i class="icon-search"></i>Sorgula</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <div class="container">
              <div class="row">  
                <p class="offset1">Üst menüden işlemlerinizi gerçekleştirebilirsiniz.</p>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="tab2">
            <div class="container">
              <div class="row">
                  <?php include('kurum_paneli/kurumbilgisiguncelle.php'); ?>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="tab3">
            <div class="container">
              <div class="row">
                    <?php include('kurum_paneli/parolabilgiekrani.php'); ?>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="tab4"> 
            <div class="container">
              <div class="row">
                    <?php include('kurum_paneli/donorbulma.php'); ?>                       
              </div>
             </div>
        </div>
      </div>
    </div>
</div>

<?php
include('layout/_footer.php');
?>

