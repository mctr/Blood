<?php
	//Veritabanı Baglantısı
	
	$dsn = "mysql:host=localhost;dbname=anket";
	$user = "root";
	$password = "";
 
	try {
		$db = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

	//////////////////////////
	// Veritabanındaki bilgileri listelemek
	
	if($Users = $db->query('SELECT * FROM users'))
	{
		foreach($Users as $row) {
			echo $row['id'].$row['email'] . $row['passwd'] . '<br/>';
		}
		// Sorgu başarıyla çalışırsa üyeleri listeleriz
	}
	else
	{
		echo "Sorguda bir hata meydana geldi.";
		$error = $db->errorInfo();
		echo "Hata mesajı: " . $error[2];
	}

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
	$db = DB::query('SELECT * FROM users');
 
	foreach($db as $row)
	{
		echo $row['email'] . '<br/>';
	}
	
	
	////////////////////////////////
	
	$email = DB::getVar('SELECT email FROM users WHERE id = 1 LIMIT 1');
 
	echo 'Selam ' . $email;
 
	// Ya da toplam kullanıcı sayısı
	$count = DB::getVar('SELECT COUNT(id) FROM users');
	
	echo 'Toplam üye sayımız ' . $count;

?>
