<?php
session_start();

require('includes/utile.php');
require('includes/db_connexion.php');
$conn = connectionBd();


$get_client = "SELECT * FROM client ORDER BY client_id";
$res_client = $conn -> prepare($get_client);
$res_client -> execute();
$client = $res_client -> fetchAll();
?>
<!DOCTYPE html> 
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style/admin_style.css">
<meta charset="utf-8" >
	<title>Admin Panel</title>
</head>
<body>
<?php include('includes/header.php') ?>
<section class="center;">

	<table>
		<thead>
			<th>Nouveautés : Clients</th>
			<tr>
				<th>Client_id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Email</th>
				<th>Date de naissance</th>
				<th>Téléphone</th>
				<th>Outils</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($client as $data): ?>
			<tr>
				<td><?=$data['client_id']?></td>
				<td><?=$data['firstname']?></td>
				<td><?=$data['name']?></td>
				<td><?php echo $data['address'].', '.$data['postal_code'].' '.$data['city'].', '.$data['country'] ?></td>
				<td><?=$data['email']?></td>
				<td><?=$data['birthday']?></td>
				<td><?=$data['phone']?></td>
				<td>
					<a href="#<?=$data['product_id']?>">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			
		<?php endforeach ?>		
		</tbody>
	</table>
</section>


</body>
</html>