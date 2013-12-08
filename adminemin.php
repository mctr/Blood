<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$kurum = "SELECT * From institutes WHERE status=1";
		$kurum_bekleyen = "SELECT * From institutes WHERE status=2";
		$donor = "SELECT * FROM donors WHERE status=1";
		$donor_bekleyen = "SELECT * FROM donors WHERE status=2";
		$role = "SELECT * FROM roles";
		$admin = "SELECT * FROM admins";
		$request = "SELECT * FROM donor_requests";
		
		$k_sayisi = $db->prepare($kurum);
		$k_b_sayisi = $db->prepare($kurum_bekleyen);
		$d_sayisi = $db->prepare($donor);
		$d_b_sayisi = $db->prepare($donor_bekleyen);
		$r_sayisi = $db->prepare($role);
		$a_sayisi = $db->prepare($admin);
		$req_sayisi = $db->prepare($request);
		
		$k_sayisi->execute();
		$k_b_sayisi->execute();
		$d_sayisi->execute();
		$d_b_sayisi->execute();
		$r_sayisi->execute();
		$a_sayisi->execute();
		$req_sayisi->execute();
		
		//~ echo $k_sayisi->rowCount(); 
		//~ echo $d_sayisi->rowCount(); 
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>

<div class="main">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Kayıtlar</th>
      <th>Sayı</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Yöneticiler</td>
      <td><?=$a_sayisi->rowCount()?></td>
      <td>
        <a href="admin.php?admin_listele=1">Listele</a> |
        <a href="yoneticiekle.php">Ekle</a>
      </td>
    </tr>
    <tr>
      <td>Kurum Rolleri</td>
      <td><?=$r_sayisi->rowCount()?></td>
      <td>
        <a href="admin.php?kurum_rol_listele=1">Listele</a> |
        <a href="kurum_rol.php?rol_ekleme=1">Ekle</a>
      </td>
    </tr>
    <tr>
      <td>Kurumlar</td>
      <td><?=$k_sayisi->rowCount()?></td>
      <td>
        <a href="admin.php?kayıtlı_kurumlar=1">Listele</a>
        <? if ($k_b_sayisi->rowCount() > 0) { ?>
			| <a href="admin.php?kurum_listele=1"><span class="badge btn-danger">Onay Bekleyen Yeni Bir Kurum Var</span></a>
		<? } ?>
      </td>
    </tr>
    <tr>
      <td>Donörler</td>
      <td><?=$d_sayisi->rowCount()?></td>
      <td>
        <a href="admin.php?onaylı_donorler=1">Listele</a>
        <? if ($d_b_sayisi->rowCount() > 0) { ?>
			| <a href="admin.php?donor_listele=1"><span class="badge btn-danger">Onay Bekleyen Yeni Bir Donör Var</span></a>
		<? } ?> 
      </td>
    </tr>
<!--
    <tr>
      <td>Donör Özel İstekleri</td>
      <td><? //=$req_sayisi->rowCount()?></td>
      <td>
        <?// if ($req_sayisi->rowCount() > 0) { ?>
			<a href="admin.php?donor_istek=1"><span class="badge btn-danger">Dönör Özel İsteği Var</span></a>
		<? //} ?>
      </td>
    </tr>-->
    <tr>
      <td>Kayıtlı Kan Verme</td>
      <td>Kayıtlı Kan verme sayısı</td>
      <td>
        <a href="/admin/bloodmakings">Listele</a>
      </td>
    </tr>
  </tbody>
</table>
<?php
include("layout/_footer.php");
?>
