<?php  
session_start();
include("includes/db_connexion.php");  
  
if(isset($_POST['admin_login']))//this will tell us what to do if some data has been post through form with button.  
{  
    $admin_email=$_POST['admin_email'];  
    $admin_password=hash('sha256',$_POST['admin_password']);  
  	
    $admin_query="select * from admin where email = :email AND password = :password";  
  	
  	$conn = connectionBd();

    $run_query= $conn->prepare($admin_query);

    $run_query -> execute([
    	'email' => $admin_email,
    	'password' => $admin_password,
    ]);
    
  
    if($run_query->rowCount())  
    {  
  		$_SESSION['admin_email'] = $admin_email;
        echo "<script>window.open('admin_panel.php','_self')</script>";  
    }  
    else {echo"<script>alert('Admin Details are incorrect..!')</script>";}  
  	
}  
  
?>  
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
<link rel="stylesheet" type="text/css" href="style/admin_style.css">
	<title>Adminty</title>
</head>
<body>
<section>
	<h3>Connecter</h3>
	<form role="form" method="post" action="index.php">
		<fieldset>
			<input placeholder="Email" name="admin_email" type="text" autofocus>
			<input placeholder="Password" name="admin_password" type="password">
			<input type="submit" name="admin_login" value="login">
		</fieldset>
	</form>
</section>
</body>
</html>

