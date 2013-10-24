<?php
	include 'db/config.php'; 
?>

<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		header("Location:index.php");
	}
?>

<?php
	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$login = mysql_query(
			"SELECT * FROM Users WHERE (
			username = '".mysql_real_escape_string($username)."')
			and ( password = '".mysql_escape_string($password)."')"
			);
			
		if (mysql_num_rows($login) == 1) {
			$_SESSION['username'] = $username;
			$error_message = Null;
			header("Location:index.php");
		} else {
			$error_message = "Eksik yada Yanlış Bilgi Girdiniz!";
		}
	}
?>
