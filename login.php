<?php
include("layout/_head.php");
include("layout/_header.php");
//include '_login.php';
?>

<?php
	session_start();
	include 'config.php';
	
	if(isset($_SESSION['email']))
	{
		header("Location:index.php");
	}

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
		
		if ($admin->rowCount() == 1) {
			$_SESSION['email'] = $username;
			$error_message = Null;
			header("Location:index.php");
		} else {
			$error_message = "Eksik yada Yanlış Bilgi Girdiniz!";
		}
	} else {
		$error_message = "Lütfen kullanıcı adınızı ve şifrenizi giriniz";
	}
?>

<br><br>
<div id="wrap">
  <div class="container">
    <div class="row">
      <div class="span6 offset3" id="form-login">
	
	<fieldset class="well">
	  <form class="form-horizontal" action="" method="post">
	    <legend>Yönetici Girişi</legend>
	    <?php
			if ($error_message) {
				echo "<center><div class='alert alert-error'>$error_message</div></center>";
			}
		?>
	    <div class="control-group">
	      <div class="control-label">
		<label>Kullanıcı Adı :</label>
	      </div>
	      <div class="controls">
		<input type="text" name="username" id="inputEmail"
		placeholder="foobar"  class="input-large">
	      </div>
	    </div>
	    <div class="control-group">
	      <div class="control-label">
		<label>Parola :</label>
	      </div>
	      <div class="controls">
		<input type="password" name="password" id="inputPassword" placeholder="Password" class="input-large">
	      </div>
	    </div>

	    <div class="control-group">
	      <div class="controls">
		<button type="submit" class="btn btn-primary">Giriş</button>
	      </div>
	    </div>
	  </form>
	</fieldset>
      </div>
    </div>
  </div>
</div>

<?php
include("layout/_footer.php");
?>
