<?php 

	session_start();
	require_once("includes/db_connexion.php"); 

	$conn = connectionBd();

	$get_news = "SELECT product.*, artist.name, artist.firstname FROM product, contract, artist WHERE product.product_id = contract.contract_id AND contract.artist_id = artist.artists_id ORDER BY product_id DESC LIMIT 4";
	$res_news = $conn->query($get_news);
	$news = $res_news->fetchAll();

	$get_concert = "SELECT product.*, artist.name, artist.firstname FROM product, contract, artist WHERE category = 'concert' AND product.product_id = contract.contract_id AND contract.artist_id = artist.artists_id ORDER BY product_id DESC LIMIT 4";
	$res_concert = $conn->query($get_concert);
	$concert = $res_concert->fetchAll();

	$conn = NULL;
?>
	
<!DOCTYPE html>
<html>
<head>
	<title>E-Billet : Évènements | Spectacles | Concerts</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include "includes/header.php" ?>

<section class="center" id="center">
	<section class="galery">
		<h1 style="text-align: left;"> À l'affiche </h1>
		<?php foreach ($news as $data) : ?>
				<section class="product">
					<a href="article.php?name=<?=$data['designation']?>">
						<img src="<?=$data['image']?>">
						<h3><?=$data['designation']?></h3>
						<h4><?=$data['name']?> <?=$data['firstname']?></h4>
					</a>					
				</section>
		<?php endforeach ?>
	</section>
	
	<section class="galery">
		<a href="category.php?cat=concert"><h1 style="text-align: left;"> Concerts </h1></a>
		<?php foreach ($concert as $data) : ?>
				<section class="product">
					<a href="article.php?name=<?=$data['designation']?>">
						<img src="<?=$data['image']?>">
						<h3><?=$data['designation']?></h3>
						<h4><?=$data['name']?> <?=$data['firstname']?></h4>
					</a>					
				</section>
		<?php endforeach ?>
	</section>

</section>

<?php include "includes/footer.php" ?>	
</body>
</html>