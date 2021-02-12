<?php
session_start();

require('includes/utile.php');
require('includes/db_connexion.php');
$conn = connectionBd();
$get_article ="SELECT * FROM product ORDER BY product_id";
$res_article = $conn -> prepare($get_article);
$res_article -> execute();
$article = $res_article ->fetchAll();


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
			
			<tr>
				<th>Product_id</th>
				<th>Désignation</th>
				<th>Description</th>
				<th>Category - Sub_category</th>
				<th>Place</th>
				<th>Depart</th>
				<th>Fin</th>
				<th>Prix</th>
				<th>Outils</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($article as $data): ?>
			<tr>
				<td><?=$data['product_id']?></td>
				<td><?=$data['designation']?></td>
				<td><?=tronquer_texte($data['description']) ?></td>
				<td><?=$data['category']?> - <?=$data['sub_category']?></td>
				<td><?=$data['places']?></td>
				<td><?=date('d/m/y - H:i ',strtotime($data['departure']))?></td>
				<td><?php if(empty($data['enddate'])==false){
					echo date('d/m/y - H:i ',strtotime($data['enddate']));}else{echo "Null";}?></td>
				<td><?=$data['price']?>€</td>
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