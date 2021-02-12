<?php 
	session_start();
	require('includes/db_connexion.php');
	$conn = connectionBd();
	if(isset($_GET['name'])){
		$article_name = $_GET['name'];
		
		$get_article = "SELECT product.*, artist.name, artist.firstname FROM product, contract, artist WHERE designation = :name AND product.product_id = contract.contract_id AND contract.artist_id = artist.artists_id ";
		$res_article = $conn -> prepare($get_article);
		$res_article -> execute([
			'name' => $article_name,
		]);
		
		$article = $res_article -> fetchAll();
	}

	foreach($article as $data):

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title><?=$data['designation']?></title>
</head>

<body>
<?php include('includes/header.php')?>
<section class="center">
	<article class="detail-article">
		<img src="<?=$data['image']?>">
		<div class="info">
			<h2><?=$data['designation']?></h2>
			<h4>Artist: <?php echo $data['name'].' '.$data['firstname']?></h4>
			<p><strong>Description: </strong><?=$data['description']?></p>
			<p><strong>Date: </strong><?php if(empty($data['departure'])==false){
						echo date('d/m/y - H:i ',strtotime($data['departure']));}?></p>
			<p><?php if(empty($data['enddate'])==false){
						echo "<strong>Fin: </strong>".date('d/m/y - H:i ',strtotime($data['enddate']));}?></p>
			<p><strong>Lieu: </strong> <?=$data['address']?></p>
			<p><strong>Prix: </strong><?=$data['price']?>€</p>
			<form method="get" action="panier.php">
			<strong>Quantité: </strong>
			<select name="q" class="autoSelect">
				<script>
					$(function(){
						var $select = $(".autoSelect");
						for (i=1;i<=30;i++){
							$select.append($('<option></option>').val(i).html(i))
						}
					});
				</script>
			</select>
			<input type="hidden" name="l" value="<?=$data['designation']?>">
			<input type="hidden" name="p" value="<?=$data['price']?>">
			<button name="action" value="ajout" class="valideBtn" type="submit">Ajouter au panier</button>
		</form>
		</div>
	</article>
	
</section>
<?php endforeach ?>
<?php include('includes/footer.php') ?>
</body>
</html>