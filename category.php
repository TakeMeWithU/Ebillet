<?php 

	session_start();
	require_once("includes/db_connexion.php"); 

	$conn = connectionBd();
	
	if(isset($_GET)){
		switch($_GET['cat']){
			case 'concert':
				$cat = 'concert';
				break;
			case 'concert-electro':
				$cat = 'concert';
				$sub_cat= 'electro';
				break;
			case 'concert-pop':
				$cat = 'concert';
				$sub_cat = 'pop';
				break;
			case 'concert-jazz':
				$cat = 'concert';
				$sub_cat = 'jazz';
				break;
				
			case 'festival':
				$cat = 'festival';
				break;
			case 'festival-electro':
				$cat = 'festival';
				$sub_cat= 'electro';
				break;
			case 'festival-pop':
				$cat = 'festival';
				$sub_cat = 'pop';
				break;
			case 'festival-jazz':
				$cat = 'festival';
				$sub_cat = 'jazz';
				break;
			
			case 'evenement':
				$cat = 'evenement';
				break;
			case 'evenement-musee':
				$cat = 'evenement';
				$sub_cat ='musee';
				break;
			case 'evenement-exposition':
				$cat = 'evenement';
				$cat = 'exposition';
				break;
		}
		
		if(isset($sub_cat)){;
			$get_cat = "SELECT product.*, artist.name, artist.firstname FROM product, contract, artist WHERE category = :cat AND sub_category = :sub_cat AND product.product_id = contract.contract_id AND contract.artist_id = artist.artists_id";
			$res_cat = $conn -> prepare($get_cat);
			$res_cat -> execute([
				'cat' => $cat,
				'sub_cat' => $sub_cat,
			]);
		}else{
			$get_cat = "SELECT product.*, artist.name, artist.firstname FROM product, contract, artist WHERE category = :cat AND product.product_id = contract.contract_id AND contract.artist_id = artist.artists_id";
			$res_cat = $conn -> prepare($get_cat);
			$res_cat -> execute([
				'cat' => $cat,
				
			]);
		}
		
		$data_cat = $res_cat -> fetchAll();
	}
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

<section class="center">
	<section class="galery">
		<?php foreach ($data_cat as $data) : ?>
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