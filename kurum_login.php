<?php
include("layout/_head.php");
include("layout/_header.php");

//include("_login.php");
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
	  <form class="form-horizontal" action="" method="post">
	    <legend>Kurum Girişi</legend>
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
