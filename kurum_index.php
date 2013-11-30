<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php.php');
?>

<div class ="span6 offset3 main">
	    <center>
			<a class = "btn btn-primary btn-large" href ='kurumbilgisiguncelle.php'> Kurum bilgisi güncelle </a> </br></br>
			<a class = "btn btn-primary btn-large" href ='kurumparolabilgiekrani.php'> Parola bilgi ekrenı </a></br></br>
			<a class = "btn btn-primary btn-large" href ='donorbulma.php'> Donör bulma </a>
		</center>

</div>
<?php
include('layout/_footer.php');
?>

