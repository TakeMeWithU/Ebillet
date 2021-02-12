<?php
	require_once("includes/db_connexion.php");
	$conn = connectionBd();

 // Prendre des résultats après POST
	if(isset($_POST)){
		
		// Des valeurs obligées
		$user_email = $_POST['user_email'];
		$user_password = hash('sha256',$_POST['user_password']);
		$user_civility = $_POST['civility'];
		$user_name = $_POST['user_name'];
		$user_firstname = $_POST['user_firstname'];
		$user_birthday = $_POST['user_birthday'];
		
		
		if(!empty($_POST['address'])){
			$user_address = $_POST['address'];
		}else{
			$user_address = "";
		}
		if(!empty($_POST['postal_code'])){
			$user_postal_code = $_POST['postal_code'];
		}else{
			$user_postal_code = "";
		}
		if(!empty($_POST['user_city'])){
			$user_city = $_POST['user_city'];
		}else{
			$user_city = "";
		}
		if(!empty($_POST['user_country'])){
			$user_country = $_POST['user_country'];
		}else{
			$user_country = "";
		}
		if(!empty($_POST['user_phone'])){
			$user_phone = $_POST['user_phone'];
		}else{
			$user_phone = "";
		}
		
		//Vérifier si l'email est déja utilisé ? 
		$check_email_sql='SELECT * FROM client WHERE email = :email';
		$run_check_email = $conn -> prepare($check_email_sql);
		$run_check_email -> execute([
			'email' => $user_email,
		]);
		if($run_check_email->fetchColumn()> 0){ 
			echo "<script>alert(\"Email: $user_email est déjà utilisé.\");</script>";
			echo "<script>document.location.href='registration.php'</script>";
    	}else{
			
			$insert_client = 'INSERT INTO `client`(`email`, `password`,`civility`, `name`, `firstname`, `address`, `postal_code`, `city`, `country`, `birthday`, `phone`) VALUES (:email, :password, :civility, :name, :firstname, :address, :postal_code, :city, :country, :birthday, :phone)';
			$run_client = $conn -> prepare($insert_client);
			if($run_client -> execute([
			'email'	=> $user_email,
			'password' => $user_password,
			'civility'=> $user_civility,
			'name' => $user_name,
			'firstname' => $user_firstname,
			'address' => $user_address,
			'postal_code' => $user_postal_code,
			'city' => $user_city,
			'country' => $user_country,
			'birthday' => $user_birthday,
			'phone' => $user_phone,
			])){
				echo "<script>alert('Votre inscription a bien été enregistré. Un mail de confirmation vous a été envoyé via {$user_email}');</script>";
				
			}
		}	
   	
	}
	
	$conn = NULL;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	
	<?php include("includes/header.php"); ?>
	<section class="center">
		<section class="textCenter">
			<h3>Vous avez votre compte ? </h3>
			<a href="login.php">Connectez-vous ici. </a>
		</section>
		<form class="registration" action="registration.php" method="post">
			<fieldset>
				<legend>Inscription</legend>
				<label>Email: </label>
				<input type="email" name="user_email" required>
				<label>Mot de passe:</label>
				<input type="password" pattern=".{6,}" id="user_password" name="user_password" title="6 caractères minimum" required>
				<label>Confirmer votre mot de passe:</label>
				<input type="password" id="confirm_password" name="confirm_password" required>
				<label>Civilité :</label>
				<select name="civility" required>
					<option value="Monsieur">Monsieur</option>
					<option value="Madame">Madame</option>
				</select>
				<label>Votre Nom:</label>
				<input type="text" name="user_firstname" required>
				<label>Votre Prénom:</label>
				<input type="text" name="user_name" required>
				<label> Date de naissance:</label>
				<input type="date" name="user_birthday" required>
				<label>Adresse: </label>
				<input type="text" name="user_address">
				<label>Code postal :</label>
				<input type="text" name="user_postal_code">
				<label>Ville :</label>
				<input type="text" name="user_city" >
				<label>Pays :</label>
				<input type="text" name="user_country" >
				<label>Numéro téléphone: </label>
				<input type="text" name="user_phone">
				<button class="valideBtn" type="submit" name="register">S'inscrire </button>
			</fieldset>
		</form>
	</section>
	<script type="text/javascript" src="js/registration.js"></script>
	<?php include("includes/footer.php"); ?>
</body>
</html>
