<?php  
session_start();  
  
include("includes/db_connexion.php");  
$conn = connectionBd();
if(isset($_POST['login']))  
{  
    $user_email=$_POST['user_email'];  
    $user_password=hash('sha256',$_POST['user_password']);  
  
    $check_user="SELECT * FROM client WHERE email = :email AND password= :password";  
  	$run_check_user = $conn -> prepare($check_user);
	$run_check_user -> execute([
		'email' => $user_email,
		'password' => $user_password,
	]);
  	
    if($run_check_user->rowCount())  
    {  
         
  		$data_user = $run_check_user -> fetchAll();
		
		//here session is used and value of $user_email store in $_SESSION.
		foreach($data_user as $data){
			$_SESSION['email']=$data['email'];
			$_SESSION['civility']=$data['civility'];
			$_SESSION['name']=$data['name'];
			$_SESSION['firstname']=$data['firstname'];
		}
		echo "<script>alert('Bienvenue {$_SESSION['civility']} {$_SESSION['firstname']}');</script>";
		echo "<script>window.open('index.php','_self')</script>"; 
        
		
    }  
    else  
    {  
      echo "<script>alert('Identifiant ou mot de passe est incorrect')</script>";  
    }  
	$conn = null;
}  
?>  
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<?php include('includes/header.php') ?>
	<section style="height: 550px;" class="center">
		<form class="registration" action="login.php" method="post">
			<fieldset>
				<legend>Connecter</legend>
				<label>Email : </label>
				<input type="text" id="user_email" name="user_email" required>
				<label>Mot de passe : </label>
				<input  type="password" id="user_password" name="user_password" required>
				<button class="valideBtn" type="submit" name="login">Se connecter </button>
				
				<section class="textCenter">
					<a style="margin: 0 auto; font-size: 12px" href="#" >Oubliez votre mot de passe ?</a>
				</section>
			</fieldset>
			
		</form>
		
	</section>
	<?php include('includes/footer.php') ?>
</body>
</html> 