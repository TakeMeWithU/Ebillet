<?php
	echo "<script>alert('contenu de l\'alerte')</script>"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>

	<form action="test.php" method="post">
			<fieldset>
				<legend>Inscription</legend>
				<input type="password" id="user_password" name="user_password" placeholder="Passwords" required>
				<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Passwords" required>
				<input type="submit" name="validator" value="Valide">
			</fieldset>
		</form>
		<script type="text/javascript" src="test.js"></script>

</body>
</html>