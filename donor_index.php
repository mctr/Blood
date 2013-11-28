<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>

<div class="span6 offset3 main">
	<center>
		<a class="btn btn-primary btn-large" href="kullanicibilgiguncelle.php">Kişisel Bilgilerim</a><br><br>
		<a class="btn btn-primary btn-large" href="parolabilgiekrani.php">Parola Degiştir</a><br><br>
		<a class="btn btn-primary btn-large" href="kanvermedurumu.php">Saglık Bilgilerim</a><br><br>
		<a class="btn btn-primary btn-large" href="acilkantalebi.php">Acil Kan Bagışı İstegi</a><br><br>
	</center>
</div>

<?php
include('layout/_footer.php');
?>
