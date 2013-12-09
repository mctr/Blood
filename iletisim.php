<?php
include('layout/_head.php');
include('layout/_header.php');
?>
    <div class="container">
      <!-- sikayet
      ================================================== -->
      <ul class="pull-right"><a href="index.php" class="btn btn-danger">Anasayfa</a></ul>
      <div class="bs-docs-section">
        <div class="page-header">
          <div class="row">
            <div class="span12">
   	       	<div class="span6">
	           <div class="row">
	             <div class="span6">
					<strong><h1>Bağlantılar</h1></strong>
	             </div>          
	                     
	           </div>
            </div>
          </div>
        </div>
        <hr>
        
        <div class="row">
          <div class="span6">
           <div class="span4">
              <strong><h3>İstek-Şikayet Mesajı</h3></strong>
            </div>
            <hr>
            <div class="span6">

              <form class="bs-example">
                <div class="form-group">
                  <input type="text" class="form-control" id="inputDefault" placeholder="Ad ve Soyad">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="inputDefault" placeholder="E-posta" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="inputDefault" placeholder="Konu">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" id="textArea" placeholder="Mesaj"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Gönder</button>
                </div>        
              </form>
              
          </div>
        </div>
      <!-- iletişim
      ================================================== -->
        <div class="span6">
           <div class="span6">
              <strong><h3>İletişim Bilgileri</h3></strong>
            </div>
            <hr>
             <strong><h3>Ondokuz Mayıs Üniversitesi</h3></strong>
            <div>
              <address class="pull">
                <strong>Adress</strong><br>
                 Merkez, Kurupelit/Samsun<br>
                 TÜRKİYE<br>
              </address>
              <div class="pull-left">
                <div class="bottom-space">
                  <i><img src="bootstrap/img/phone.png"></i> (0362) 312 1919
                
                <a href="mailto:contact@bootbusiness.com" class="contact-mail">
                  <i><img src="bootstrap/img/mail.png"></i>
                </a> Ondokuzmayis@omu.edu.tr
              </div>
              
            </div>
          </div>
          </div>
        </div>
        
      </div>
    </div>
          <!-- Resim Mekomu
      ================================================== -->
	   <div class="container">
	       	<div class="span8">
	           <div class="row">
	             <div class="span2">
					<div class="row"></div>
	             </div>
	             <div class="span2">
					<div class="row"></div>
	             </div>
	             <div class="span2">
	               	<a class="thumbnail" href="https://github.com/mctr"><img alt=""  src="bootstrap/img/mesut.jpeg"></a>
					<center><strong><a href="http://mctr.github.com">mctr</a></strong></center>
	             </div>          
	             <div class="span2">
	              	<a class="thumbnail" href="https://github.com/krytht"><img alt="" src="bootstrap/img/koray.jpeg"></a>
					<center><strong><a href="http://koraytahta.com">krytht</a></strong></center>
	             </div>       
	           </div>
	    	</div>
	  	</div><br>
	<hr>
          <!-- Footer
      ================================================== -->
	<div id="footer">
		<div class="span12">
	      <center><i> Copyright &copy; 2014 Kan Veritabanı Web Portalı</i></center><br>
	    </div>
	</div>
<?php
include('layout/_footer.php');
?>
