<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>
<!-- Silme - Onaylama İşlemleri -->
<?php
// donor silme - onaylama işlemleri
if ($_GET['donor_sil_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['donor_sil_id'];
		$query = "DELETE FROM donors WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php?donor_listele=1");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

if ($_GET['onaylı_donor_sil_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['onaylı_donor_sil_id'];
		$query = "DELETE FROM donors WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php?onaylı_donor_listele=1");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

if ($_GET['donor_onayla_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['donor_onayla_id'];
		$query = "UPDATE donors SET status=1 WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php?donor_listele=1");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

// Kurum sil - onaylama işlemleri

if ($_GET['kurum_sil_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['kurum_sil_id'];
		$query = "DELETE FROM institutes WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php?kurum_listele=1");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
if ($_GET['onaylı_kurum_sil_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['onaylı_kurum_sil_id'];
		$query = "DELETE FROM institutes WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php?kayıtlı_kurumlar=1");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

if ($_GET['kurum_onayla_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['kurum_onayla_id'];
		$query = "UPDATE institutes SET status=1 WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php?kurum_listele=1");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

if ($_GET['admin_sil_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['admin_sil_id'];
		$query = "DELETE FROM admins WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php?admin_listele=1");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

if ($_GET['kurum_rol_sil_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['kurum_rol_sil_id'];
		$query = "DELETE FROM roles WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php?kurum_rol_listele=1");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
} 
?>

<? if($_GET['donor_listele'] == 1) { ?>
<!-- Donörler (Start)-->
<div class="span12 alt">
<div class="span10 offset1">
	<center><h1>Donörler</h1></center><br>
<table class="table table-bordered">
				<thead>
					<tr>
					<th>id</th>
					<th>Adı</th>
					<th>Soyadı</th>
					<th>E-mail</th>
					<th>yes</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>
<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$query = "SELECT id,first_name, last_name, email FROM donors WHERE status = 2";

		$listele = $db->query($query);


		foreach($listele as $row) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".'<a href="admin.php?donor_onayla_id='.$row['id'].'"><i class="icon-ok"></i></a>'."</td>";
			echo "<td>".'<a href="admin.php?donor_sil_id='.$row['id'].'"><i class="icon-trash"></i></a>'."</td>";
			echo "</tr>";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	
?>
			</tbody>
	</table>
</div>
<div class="span2"><a href="adminemin.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
<!-- Donörler (Finish)-->
<?php }	if ($_GET['kurum_listele'] == 1) { ?>
<!-- Kurumlar (Start)-->
<div class="span10 offset1 alt">
	<center><h1>Onay Bekleyen Kurumlar</h1></center><br>
<table class="table table-bordered">
				<thead>
					<tr>
					<th>id</th>
					<th>Adı</th>
					<th>İl</th>
					<th>İlçe</th>
					<th>Kurum Tipi</th>
					<th>Onayla</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>
<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$query1 = "SELECT institutes.id, institutes.name, il.il_adi, ilce.ilce_adi, roles.institute_name FROM institutes INNER JOIN il ON institutes.city_id=il.ID INNER JOIN ilce ON institutes.district_id=ilce.ID INNER JOIN roles ON institutes.role_id=roles.id WHERE institutes.status=2";

		$kurumlar = $db->query($query1);


		foreach($kurumlar as $row) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['il_adi']."</td>";
			echo "<td>".$row['ilce_adi']."</td>";
			echo "<td>".$row['institute_name']."</td>";
			echo "<td>".'<a href="admin.php?kurum_onayla_id='.$row['id'].'"><i class="icon-ok"></i></a>'."</td>";
			echo "<td>".'<a href="admin.php?kurum_sil_id='.$row['id'].'"><i class="icon-trash"></i></a>'."</td>";
			echo "</tr>";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
			</tbody>
	</table>
</div>

<div class="span2"><a href="adminemin.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
<?php }	if ($_GET['kayıtlı_kurumlar'] == 1) { ?>
<!-- Kurumlar (Start)-->
<div class="span10 offset1 alt">
	<center><h1>Kayıtlı Kurumlar</h1></center><br>
<table class="table table-bordered">
				<thead>
					<tr>
					<th>id</th>
					<th>Adı</th>
					<th>İl</th>
					<th>İlçe</th>
					<th>Kurum Tipi</th>
					<th>Düzenle</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>
<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$query1 = "SELECT institutes.id, institutes.name, il.il_adi, ilce.ilce_adi, roles.institute_name FROM institutes INNER JOIN il ON institutes.city_id=il.ID INNER JOIN ilce ON institutes.district_id=ilce.ID INNER JOIN roles ON institutes.role_id=roles.id WHERE institutes.status=1";

		$kurumlar = $db->query($query1);


		foreach($kurumlar as $row) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['il_adi']."</td>";
			echo "<td>".$row['ilce_adi']."</td>";
			echo "<td>".$row['institute_name']."</td>";
			echo "<td>".'<a href="admin.php?kurum_edit_id='.$row['id'].'"><i class="icon-edit"></i></a>'."</td>";
			echo "<td>".'<a href="admin.php?onaylı_kurum_sil_id='.$row['id'].'"><i class="icon-trash"></i></a>'."</td>";
			echo "</tr>";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
			</tbody>
	</table>
</div>

<div class="span2"><a href="adminemin.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>

<!-- Kurumlar (Finish)-->
<? } if ($_GET['admin_listele'] == 1) {?>
	<div class="span10 offset1 alt">
	<center><h1>Yöneticiler</h1></center><br>
<table class="table table-bordered">
				<thead>
					<tr>
					<th>id</th>
					<th>Adı</th>
					<th>Soyadı</th>
					<th>Email</th>
					<th>Telefon Numarası</th>
					<th>Düzenle</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>
<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$query1 = "SELECT * FROM admins";

		$kurumlar = $db->query($query1);


		foreach($kurumlar as $row) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['phone_number']."</td>";
			echo "<td>".'<a href="yoneticiduzenle.php?admin_edit_id='.$row['id'].'"><i class="icon-edit"></i></a>'."</td>";
			echo "<td>".'<a href="admin.php?admin_sil_id='.$row['id'].'"><i class="icon-trash"></i></a>'."</td>";
			echo "</tr>";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
			</tbody>
	</table>
</div>

<div class="span2"><a href="adminemin.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
<? } if ($_GET['kurum_rol_listele'] == 1) {?>
	
	<div class="span10 offset1 alt">
	<center><h1>Kurum Rolleri</h1></center><br>
<table class="table table-bordered">
				<thead>
					<tr>
					<th>id</th>
					<th>Rol Adı</th>
					<th>Düzenle</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>
<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$query1 = "SELECT * FROM roles";

		$kurumlar = $db->query($query1);


		foreach($kurumlar as $row) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['institute_name']."</td>";

			echo "<td>".'<a href="kurum_rol.php?kurum_rol_edit='.$row['id'].'"><i class="icon-edit"></i></a>'."</td>";
			echo "<td>".'<a href="admin.php?kurum_rol_sil_id='.$row['id'].'"><i class="icon-trash"></i></a>'."</td>";
			echo "</tr>";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
			</tbody>
	</table>
</div>

<div class="span2"><a href="adminemin.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
<? } if ($_GET['kurum_edit_id']) {?>

<?php
$id = $_GET['kurum_edit_id'];
	try {
			$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
			$query18 = "SELECT * FROM institutes WHERE id='$id'";
			$hop = $db->query($query18);
			foreach($hop as $row) {
				$ad = $row['name'];
				$rol = $row['role_id'];
				$email = $row['email'];
				$telno = $row['phone_number'];
				$il = $row['city_id'];
				$ilce = $row['district_id'];
				$address = $row['address'];
			}
			
		
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		
		if ($_POST['update'] == 1) {
			$guncelle = $db->prepare("UPDATE institutes SET  name=?, phone_number=?, address=?  WHERE email='$mmail'");
			
			
			$guncelle->bindParam(1, $_POST['kurumadi']);
			//$guncelle->bindParam(2, $_POST['kurumtipi']);
			//$guncelle->bindParam(3, $_POST['il']);
			//$guncelle->bindParam(4, $_POST['ilce']);
			$guncelle->bindparam(2, $_POST['telno']);
			$guncelle->bindparam(3, $_POST['adres']);
			$guncelle->execute();
			
			$hata = "Başarılı Güncelleme yaptınız.";
		}
?>

<div class="offset1">
<form class="form-horizontal" method="post" action="admin.php?kurum_edit_id=<?=$id?>" >
<fieldset>

<!-- Form Name -->
<legend class="span10">Kurum Bilgileri Güncelleme Ekranı</legend>

<?php
	if ($hata) {
		echo "<center class='alert alert-success'>$hata</center>";
	}
?>
<input type="hidden" name="update" value="1" />
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="kurumadi">Kurum Adı (*)</label>
  <div class="controls">
    <input id="kurumadi" name="kurumadi" placeholder="Ondokuz Mayıs Üniversitesi" class="input-large" type="text" value="<?=$ad?> ">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="kurumtipi">Kurum Tipi (*)</label>
  <div class="controls">
    <select id="kurumtipi" name="kurumtipi" class="input-large">
      <option value="0" >Kurumunuzun Tipi</option>
      <?php
		try {
			$db = new PDO($dsn, $dbuser, $dbpassword);
			$kurumtipi = $db->query("SELECT * FROM roles ORDER BY id ASC");
			foreach($kurumtipi as $row){
		?>
			 <option value="<?= $rol?>"><?= $row['institute_name'] ?></option>
	<?php	}
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	?>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Email (*)</label>
  <div class="controls">
    <input id="email" name="email" placeholder="info@omu.edu.tr" class="input-large" type="text" value="<?=$email?>">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telno">Telefon Numarası (*)</label>
  <div class="controls">
    <input id="telno" name="telno" placeholder="" class="input-large" type="text" value="<?=$telno?>">
    <p class="help-block">Örnegin: 0505-689-4556</p>
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="il">İl(*)</label>
  <div class="controls">
    <select onChange="ilceListele(this.value)" id="il" name="il" class="input-large" value="<?=$il?>">
      <option value="0">İl Seçiniz</option>
      <?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$city = $db->query("SELECT ID, il_adi FROM il ORDER BY ID ASC");
		foreach($city as $row){
	  ?>
				<option value="<?= $row['ID'];?>"><?= $row['il_adi']; ?></option>

      <?php }
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		?>
    </select>
  </div>
</div>

<!-- Select Basic -->


<div class="control-group">
  <label class="control-label" for="ilce">İlçe(*)</label>
  <div class="controls">
    <select id="ilce" name="ilce" class="input-large" value="<?$ilce?>">
      <option value="0">Önce İl Seçiniz</option>
      
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="adres">Adres</label>
  <div class="controls">                     
    <textarea id="adres" name="adres"><?=$address?></textarea>
  </div>
</div>
<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label" for="guncelle"></label>
  <div class="controls">
    <button id="guncelle" name="guncelle" class="btn btn-success">Bilgilerimi Güncelle</button>
    <a href="admin.php?kayıtlı_kurumlar=1" class="btn btn-danger">İptal</a> 
  </div>
</div>

</fieldset>
</form>
</div>
<div class="span2"><a href="admin.php?kayıtlı_kurumlar=1" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>

<?php } ?>
</div>

<?php
include("layout/_footer.php");
?>
