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
	
	<form action="register_method.php" method="post">
		<input type="text" name="lastName" placeholder="Prénom"/>
		<input type="text" name="firstName" placeholder="Nom"/>
		<p>Date de Naissance</p>
		<input type="date" name="birth_Date" placeholder="Date de naissance"/>
		<input type="text" name="adress" placeholder="Adresse"/>
		<input type="number" name="zip_Code" placeholder="Code Postal"/>
		<input type="number" name="phone_Number" placeholder="Numéro de téléphone"/>
		<select name="service" >
			<option value="1">Maintenance</option>
			<option value="2">Web Developper</option>
			<option value="3">Web Designer</option>
			<option value="4">Référenceur</option>
		</select>
		<button type="submit">DONE</button>
	</form>

	</div>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
</body>
</html>