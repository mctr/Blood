
<?php
session_start();
include ('config.php');

$mmail = $_SESSION['donor'];

	try {
			$db = new PDO($dsn, $dbuser, $dbpassword);
			$query18 = "SELECT * FROM donors WHERE email='$mmail'";
			$hop = $db->query($query18);
			foreach($hop as $row) {
				$_SESSION['ad'] = $row['first_name'];
				$_SESSION['soyad'] = $row['last_name'];
				$_SESSION['cinsiyet'] = $row['gender'];
				$_SESSION['kangrubu'] = $row['kangrubu'];
				$_SESSION['tcno'] = $row['tcno'];
			}
			
		
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		header("Location:donorpaneli.php");
	
	
	
if ($_GET['change'] == 1) {
	$mmail = $_SESSION['donor'];

	try {
			$db = new PDO($dsn, $dbuser, $dbpassword);
			$query18 = "SELECT * FROM donors WHERE email='$mmail'";
			$hop = $db->query($query18);
			foreach($hop as $row) {
				$pass = $row['password_digest']
			}
			
			echo $pass;
		
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
?>
