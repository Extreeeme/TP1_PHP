<?php
	
	define('ROOT', dirname(__DIR__));
	require ROOT.'/web/class.php';
	$erreur = [];

	if(isset($_POST['firstName'], $_POST['lastName'], $_POST['birth_Date'], $_POST['adress'], $_POST['zip_Code'], $_POST['phone_Number'], $_POST['service'])){
		if($_POST['firstName'] == '' || $_POST['firstName'] == ' '){
			$erreur[] = "Nom non valide";
		}
		if($_POST['lastName'] == '' || $_POST['lastName'] == ' '){
			$erreur[] = "Prénom non valide";
		}
		if($_POST['adress'] == '' || $_POST['adress'] == ' '){
			$erreur[] = "Adresse non valide";
		}
		if($_POST['phone_Number'] != (int)$_POST['phone_Number']){
			$erreur[] = "Numéro de téléphone non valide";
		}
		if($_POST['zip_Code'] != (int)$_POST['zip_Code']){
			$erreur[] = "Code postal non valide";
		}

		if(empty($erreur)){
			$firstName = htmlspecialchars($_POST['firstName']);
			$lastName = htmlspecialchars($_POST['lastName']);
			$adress = htmlspecialchars($_POST['adress']);
			$birth_Date = htmlspecialchars($_POST['birth_Date']);
			$service = htmlspecialchars($_POST['service']);
			$phone_Number = htmlspecialchars($_POST['phone_Number']);
			$zip_Code = htmlspecialchars($_POST['zip_Code']);
			$user = new User($firstName, $lastName, $birth_Date, $adress, $zip_Code,$phone_Number, $service);
			$pdo = new PDO('mysql:dbname=TP1;host=localhost',"root","tuning03");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$req = $pdo->prepare("SELECT * FROM USERS WHERE firstName = ? AND lastName = ?");
			$req->execute([$user->firstName, $user->lastName]);
			$users = $req->fetch();
			if($users){
				$erreur = "Vous êtes déjà enregistré";
				header('location:register.php');
				exit();
			}else{
				$req2 = $pdo->prepare("
				INSERT INTO USERS
				SET firstName = ?,
				lastName = ?,
				adress = ?,
				birth_Date = ?,
				service = ?,
				phone_Number = ?,
				zipcode = ?
				");
				$req2->execute([$user->firstName,
				$user->lastName,
				$user->adress,
				$user->birth_Date,
				$user->service,
				$user->phone_Number,
				$user->zip_Code]);
				header('location:register.php');
				exit();
			}
		}else{
			header('location:register.php');
			exit();
		}
	}else{
		header('location:register.php');
		exit();
	}

?>