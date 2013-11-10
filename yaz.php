<?php
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>
<?php
	try {
			$db = new PDO($dsn, $user, $password);	
			if ($_POST['kurumadi'] && $_POST['kurumtipi'] && $_POST['email'] && $_POST['il'] && $_POST['ilce'] && $_POST['parola']) {
				if ($_POST['parola'] == $_POST['parolatekrar']){	
					
					$kurumekle = $db->prepare("INSERT INTO institutes(name, email, password_digest, phone_number, status, role_id, city_id, district_id, address) VALUES (?,?,?,?,?,?,?,?,?)");
					
					$kurumekle->bindParam(1, $_POST['kurumadi']);
					$kurumekle->bindParam(2, $_POST['email']);
					$kurumekle->bindParam(3, $_POST['parola']);
					$kurumekle->bindParam(4, $_POST['telno']);
					$kurumekle->bindParam(5, $_POST['status']);
					$kurumekle->bindParam(6, $_POST['kurumtipi']);
					$kurumekle->bindParam(7, $_POST['il']);
					$kurumekle->bindParam(8, $_POST['ilce']);
					$kurumekle->bindParam(9, $_POST['adres']);
					
					$kurumekle->execute();
					
					$mesaj = "Başarılı bir şekilde kurum kaydı yaptınız.";
				} else {
					$error = "İki parola birbirine eşit olmalıdır.";
				} 
			} else {
				$error = "Lütfen yıldızlı(*) alanları boş bırakmayınız.";
			}
	} catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
	}


if($mesaj) {
	echo $mesaj;
}
if($error) {
	echo $error;
}
?>




<?php
include_once("layout/_footer.php");
?>
