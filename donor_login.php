<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
?>
<?php
	
	include 'config.php';
	
	if(isset($_SESSION['donor']))
	{
		header("Location:donorpaneli.php");
	}

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		 
		try {
			$db = new PDO($dsn, $dbuser, $dbpassword);		
		} catch (PDOException $e) {
			echo "Baglantı hatalı: " . $e->getMessage();
		}
		
		$donor = $db->prepare("SELECT * FROM donors WHERE email=? AND password_digest=?");
		$donor->bindParam(1,$username);
		$donor->bindParam(2,$password);
		$donor->execute();
		
		if ($donor->rowCount() > 0) {
			$_SESSION['donor'] = $username;
			$error_message = Null;
			header("Location:donorpaneli.php");
		} else {
			$error_message = "Eksik yada Yanlış Bilgi Girdiniz!";
		}
	}
?>




<br><br>
<div id="wrap">
  <div class="container">
    <div class="row">
      <div class="span6 offset3" id="form-login">
	<?php
	  if ($error_message) {
	    echo "<div class='alert alert-error'>$error_message</div>";
	  }
	?>
	<fieldset class="well">
	  <form class="form-horizontal" action="donor_login.php" method="post">
	    <legend>Donör Girişi</legend>
	    <div class="control-group">
	      <div class="control-label">
		<label>E-mail :</label>
	      </div>
	      <div class="controls">
		<input type="email" name="username" id="inputEmail"
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
