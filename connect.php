<?php
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');

?>
<table class="table table-condensed">
				<thead>
					<tr>
					<th>Adı</th>
					<th>Kurum Tipi</th>
					<th>İl</th>
					<th>İlçe</th>
					</tr>
				</thead>
				<tbody>
<?php
	try {
			$db = new PDO($dsn, $user, $password);
			$kurum_tipi = $db->query("SELECT institutes.name, il.ADI, ilce.ADI FROM institutes INNER JOIN İL ON institutes.il=il.id INNER JOIN ilce ON il.ID=ilce.IL_ID"); 
			$kurum = $db->query("SELECT institutes.name, il.ADI FROM institutes INNER JOIN il ON institutes.city_id=il.ID");
			foreach($kurum_tipi as $row) {
					echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['ADI']."</td>";
					//~ echo "<td>".$row['ADI']."</td>";
					//echo "<td>".$row['district_id']."</td>";
					//echo "<td>".$row['role_id']."</td>";
					echo "</tr>";
				}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

?>

</tbody>
</table>

<?php
	/*
	if($_POST['parola'] == $_POST['parolatekrar'])
	{
		$db->exec("INSERT INTO admins (first_name, last_name, email, password_digest, phone_number, status) VALUES ('$_POST[ad]', '$_POST[soyad]', '$_POST[email]', '$_POST[parola]', '$_POST[telno]', 0)");
		
		//~ $id = $db->lastInsertId();
		//~ echo 'Yeni eklenen üyenin IDsi: ' . $id;
	}
	else
	{
		echo 'Yeni kayıt eklerken bir hata meydana geldi.';
	}
	*/
	
	
	
	//~ if ($_POST['parola'] == $_POST['parolatekrar'])
	//~ {
		//~ echo "selam".$_POST['ad']."<br>";
		//~ echo "selam".$_POST['soyad']."<br>";
		//~ echo "selam".$_POST['email']."<br>";
		//~ echo "selam".$_POST['telno']."<br>";
	//~ }
	//~ else
	//~ {
		//~ echo "WARNING : parolalar farklı olamaz."
	//~ 
	//~ }	
	//////////////////////////
	// Veritabanındaki bilgileri listelemek
	
	//~ if($Users = $db->query('SELECT * FROM users'))
	//~ {
		//~ foreach($Users as $row) {
			//~ echo $row['id']."\t".$row['email']."\t".$row['passwd'] . '<br/>';
		//~ }
		//~ // Sorgu başarıyla çalışırsa üyeleri listeleriz
	//~ }
	//~ else
	//~ {
		//~ echo "Sorguda bir hata meydana geldi.";
		//~ $error = $db->errorInfo();
		//~ echo "Hata mesajı: " . $error[2];
	//~ }
	//~ 
	//~ 
	//~ if($email = $db->query('SELECT email FROM users'))
	//~ {
		//~ foreach($email as $row){
			//~ echo $row['email']."<br>";
		//~ }
	//~ }

	/////////////////////////////
	/*
	// Veritabına veri insert etmek
	
	if($db->exec('INSERT INTO users (email,passwd) VALUES ("koray.tahta@bil.omu.edu.tr", "1234")'))
	{
		$id = $db->lastInsertId();
		echo 'Yeni eklenen üyenin IDsi: ' . $id;
	}
	else
	{
		echo 'Yeni kayıt eklerken bir hata meydana geldi.';
	}
	*/
	//$db = null; //Baglantıyı kapattık..
	
	////////////////////////////////////
	
	 //  $db->exec('DELETE FROM users WHERE email = "koray.tahta@bil.omu.edu.tr"');
	
	
	/////////////////////////////////////////

	//~ if($sorgu = $db->query('SELECT * FROM admins')) {
 //~ 
		//~ foreach($sorgu as $row)
		//~ {
			//~ echo $row['email'] . '<br/>';
		//~ }
	//~ }
	
	////////////////////////////////
	
	//~ $email = DB::getVar('SELECT email FROM users WHERE id = 1 LIMIT 1');
 //~ 
	//~ echo 'Selam ' . $email;
 //~ 
	//~ // Ya da toplam kullanıcı sayısı
	//~ $count = DB::getVar('SELECT COUNT(id) FROM users');
	//~ 
	//~ echo 'Toplam üye sayımız ' . $count;
	
	
	//~ if $_POST['parola'] == $_POST['parolatekrar'] {
		//~ $query = $db->prepare('INSERT INTO admins (first_name, last_name, email, password_digest, phone_number, status) VALUES (?, ?, ?, ?, ?, 2)');
		//~ $query = $db->execute(array($_POST['ad'], $_POST['soyad'], $_POST['email'], $_POST['parola'], $_POST['telno']));	 
		//~ if ($sorgu = $db->guery('INSERT INTO admins (first_name, last_name, email, password_digest, phone_number, status) values ('.$_POST['ad'].','.$_POST['soyad'].','.$_POST['email'].','.$_POST['parola'].','.$_POST['telno'].', 0')')) {
			//~ echo "Başarıyla Eklendi.."
		//~ }
	//~ 
	//~ }
?>
<?php
include_once("layout/_footer.php");
?>
