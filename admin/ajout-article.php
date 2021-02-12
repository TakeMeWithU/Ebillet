<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style/admin_style.css">
<meta charset="utf-8" >
<title>Ajout l'article</title>
</head>

<body>
<?php include('includes/header.php') ?>
<section class="center">
	<form action="ajout-article.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Ajout article</legend>
			<label>Désignation: </label>
			<input type="text" name="designation" required>
			<label>Description: </label>
			<input type="text" name="description" required>
			<label>Adresse: </label>
			<input type="text" name="address" required> 
		</fieldset>
		
	</form>
</section>

</body>
</html>
