
<?php
include("layout/_head.php");
include("layout/_header.php");
include("config.php");
?>

<legend>Kayıtlı Kurum Ve Kuruluşlar
			<div class="pull-right"><a href="kurumekle.php" class="btn btn-primary">Yeni Kurum Kaydı</a></div>
			</legend>
			<br>
			<table class="table table-condensed">
				<thead>
					<tr>
					<th>Adı</th>
					<th>İl</th>
					<th>İlçe</th>
					<th>Kurum Tipi</th>
					</tr>
				</thead>
				<tbody>

<?php
	//Veritabanı Baglantısı
	//~ 
	//~ $dsn = "mysql:host=localhost;dbname=Blood";
	//~ $user = "root";
	//~ $password = "";
 
	try {
		$db = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	
	$kurum = $db->query("SELECT * FROM admins", PDO::FETCH_NUM);
	foreach($kurum as $row) {
					echo "<tr>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[5]."</td>";
					echo "</tr>";
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

	//~ if($sorgu = $db->query('SELECT * FROM users')) {
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
