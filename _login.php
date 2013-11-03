
<?php
	session_start();
	include 'config.php';
?>

<?php
	
	if(isset($_SESSION['email']))
	{
		header("Location:index.php");
	}
?>

<?php
	
	

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		 
		try {
			$db = new PDO($dsn, $user, $parola);		
		} catch (PDOException $e) {
			echo "Baglantı hatalı: " . $e->getMessage();
		}
		
		$admin = $db->prepare("SELECT * FROM admins WHERE email=? AND password_digest=?");
		$admin->bindParam(1,$username);
		$admin->bindParam(2,$password);
		$admin->execute();
		
		if ($admin->rowCount() > 0) {
			$_SESSION['email'] = $username;
			$error_message = Null;
			header("Location:index.php");
		} else {
			$error_message = "Eksik yada Yanlış Bilgi Girdiniz!";
		}
	}
		
		
		//$admins = $db->query("SELECT * FROM admins WHERE email='$username' AND password_digest='$password'");
		//~ $sorgu = $db->prepare("SELECT email, password_digest FROM admins WHERE email='$username' or password_digest='$password'");
		//~ $sorgu->execute(array($email, $passwd));
		//~ $sorgu->bindColumn('email', $email);
		//~ $sorgu->bindColumn('password_digest', $passwd);
		//~ $sorgu->fetch(PDO::FETCH_BOUND);
		//~ 
		//~ if ($username === $email) {
			//~ echo "email dogru";
		//~ }
		//~ 
		//~ if ($password === $passwd) {
			//~ echo "parola dogru";
		//~ }
		
?>
