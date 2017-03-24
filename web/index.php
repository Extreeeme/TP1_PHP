<?php 

	define('ROOT', dirname(__DIR__));
	require ROOT.'/web/class.php';
	if(isset($_POST["service"])){
		$pdo = new PDO('mysql:dbname=TP1;host=localhost',"root","tuning03");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$req = $pdo->query("SELECT 
		USERS.lastName,
		USERS.firstName,
		USERS.birth_Date,
		USERS.adress,
		USERS.zipcode,
		USERS.phone_Number,
		USERS.service,
		SERVICE.name 
		FROM USERS,
		SERVICE 
		WHERE SERVICE.id = ".$_POST['service']." AND USERS.service = SERVICE.id");
		$datas= $req->fetchAll();
	}else{
		$pdo = new PDO('mysql:dbname=TP1;host=localhost',"root","tuning03");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$req = $pdo->query("SELECT 
		USERS.lastName,
		USERS.firstName,
		USERS.birth_Date,
		USERS.adress,
		USERS.zipcode,
		USERS.phone_Number,
		USERS.service,
		SERVICE.name 
		FROM USERS,
		SERVICE 
		WHERE USERS.service = SERVICE.id");
		$datas= $req->fetchAll();
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TP 1</title>
	<link rel="stylesheet" href="style/css/style.css">
</head>
<body>
	<div id="container">
		<nav>
			<div class="nav-wrapper">
			  <a href="#" class="brand-logo">TP 1</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="index.php">UTILISATEURS</a></li>
					<li><a href="register.php">INSCRIPTION</a></li>
				</ul>
			</div>
	  </nav>

	<form action="" method="post">
	 <select name="service">
			<option value="1">Maintenance</option>
			<option value="2">Web Developper</option>
			<option value="3">Web Designer</option>
			<option value="4">Référenceur</option>
	</select>
	<button type="submit">DONE</button>


	</form>

		<?php foreach ($datas as $key=>$value) : ?>
			<ul>
			<li> <strong>Prénom :</strong> <?=$value->lastName?></li><li> <strong>Nom :</strong> <?=$value->firstName ?></li><li> <strong>Date de Naissance :</strong> <?=$value->birth_Date ?> </li><li><strong>Adresse : </strong><?=$value->adress?></li><li><strong>Code Postal : </strong><?=$value->zipcode?></li><li><strong>Numéro de téléphone :</strong><?=$value->phone_Number?></li><li><strong>Service :</strong><?=$value->name?></li>
			</ul>
		<?php endforeach ?>

	
	</div>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
</body>
</html>