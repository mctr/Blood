<?php
session_start();
if ($_SESSION['kurum'] || $_SESSION['admin']) {
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$donor_id = $_GET['donor_id'];
		$query = "SELECT * FROM donors WHERE id='$donor_id'";
		$listele = $db->query($query);
		foreach($listele as $row) {
			$tc = $row['tc'];
			$ad = $row['first_name'];
			$soyad = $row['last_name'];
			$email = $row['email'];
			$telno = $row['phone_number'];
			$cinsiyet = $row['gender'];
			$d_tarihi = $row['birthday'];
			$kangrubu = $row['blood_group_id'];
			$il = $row['city_id'];
			$ilce = $row['district_id'];
			$blood_making = $row['blood_making_date'];
		}
		$query1 = "SELECT * FROM blood_groups WHERE id='$kangrubu'";
		$listele1 = $db->query($query1);
		foreach($listele1 as $row) {
			$y_kangrubu = $row['name'];
		}
		$query2 = "SELECT * FROM il WHERE ID='$il'";
		$listele2 = $db->query($query2);
		foreach($listele2 as $row) {
			$y_il = $row['il_adi'];
		}
		$query3 = "SELECT * FROM ilce WHERE ID='$ilce'";
		$listele3 = $db->query($query3);
		foreach($listele3 as $row) {
			$y_ilce = $row['ilce_adi'];
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>


<table class="table table-bordered">
  <thead>
    <tr>
      <th></th>
      <th>Kan Bagışcısı Bilgileri</th>
    </tr>
  </thead>
  <tbody>
	<tr>
      <td>Kan Grubu</td>
      <td><?=$y_kangrubu?></td>
    </tr>
	<tr>
      <td>Tc Kimlik Numarası</td>
      <td><?=$tc?></td>
    </tr>
	<tr>
      <td>Ad</td>
      <td><?=$ad?></td>
    </tr>
	<tr>
      <td>Soyad</td>
      <td><?=$soyad?></td>
    </tr>
	<tr>
      <td>E-mail</td>
      <td><?=$email?></td>
    </tr>
	<tr>
      <td>Telefon Numarası</td>
      <td><?=$telno?></td>
    </tr>
	<tr>
      <td>Cinsiyet</td>
      <td><?=$cinsiyet?></td>
    </tr>
	<tr>
      <td>En Son Kan Verme Tarihi</td>
      <td><?=$blood_making?></td>
    </tr>
	<tr>
      <td>Dogum Tarihi</td>
      <td><?=$d_tarihi?></td>
    </tr>
	<tr>
      <td>İl</td>
      <td><?=$y_il?></td>
    </tr>
	<tr>
      <td>İlçe</td>
      <td><?=$y_ilce?></td>
    </tr>
    </tbody>
</table>
<div class="span2"><a href="donorbulma.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
<?php
} else {
	header("Location:login.php");
}
	include_once("layout/_footer.php");
?>
