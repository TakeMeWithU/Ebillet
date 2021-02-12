<?php
	session_start();
	require('includes/db_connexion.php');
	include('fonctions-panier.php');
	if(isset($_SESSION['email'])){
		$erreur = false;

		$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
		if($action !== null)
		{
		   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
		   $erreur=true;

		   //récuperation des variables en POST ou GET
		   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
		   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
		   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

		   //Suppression des espaces verticaux
		   $l = preg_replace('#\v#', '',$l);
		   //On verifie que $p soit un float
		   $p = floatval($p);

		   //On traite $q qui peut etre un entier simple ou un tableau d'entier

		   if (is_array($q)){
			  $QteArticle = array();
			  $i=0;
			  foreach ($q as $contenu){
				 $QteArticle[$i++] = intval($contenu);
			  }
		   }
		   else
		   $q = intval($q);

		}

		if (!$erreur){
		   switch($action){
			  Case "ajout":
				 ajouterArticle($l,$q,$p);
				 break;

			  Case "suppression":
				 supprimerArticle($l);
				 break;

			  Case "refresh" :
				 for ($i = 0 ; $i < count($QteArticle) ; $i++)
				 {
					modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
				 }
				 break;

			  Default:
				 break;
		   }
		}
		if(isset($_POST['reserver'])){
			echo "<script>alert('Votre réservation est enregistrée. Merci de vérifier votre email.')</script>";
			echo "<script>document.location.href='index.php'</script>";
			supprimePanier();
		}
	}else{
		echo "<script>alert('Merci de bien vouloir vous connecter.')</script>";
		echo "<script>document.location.href='login.php'</script>";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Panier</title>
</head>

<body>
<?php include('includes/header.php') ?>
<section class="center"> 



  <?php
  if (creationPanier())
  {
     $nbArticles=count($_SESSION['panier']['libelleProduit']);
     if ($nbArticles <= 0)
     echo "<h2>Votre panier est vide </h2>";
     else
     {	echo "<form class=\"panier\" method=\"post\" action=\"panier.php\">
	 <table style=\"width: 400px\">
  <tr>
    <td colspan=\"4\">Votre panier</td>
  </tr>
  <tr>
    <td>Libellé</td>
    <td>Quantité</td>
    <td>Prix Unitaire</td>
    <td>Action</td>
  </tr>";
        for ($i=0 ;$i < $nbArticles ; $i++)
        {
           echo "<tr>";
           echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
           echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
           echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i]) . " €</td>";
           echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\"><i class=\"fa fa-trash\"></a></td>";
           echo "</tr>";
        }

        echo "<tr><td colspan=\"2\"> </td>";
        echo "<td colspan=\"2\">";
        echo "Total : ".MontantGlobal();
        echo "€</td></tr>";

        echo "<tr><td colspan=\"4\">";
        echo "<input  type=\"submit\" value=\"Rafraichir\"/>";
        echo "<input  type=\"hidden\" name=\"action\" value=\"refresh\"/>";

        echo "</td></tr>";
	  echo "</table>
	<button class=\"valideBtn\" name=\"reserver\" type=\"submit\">Réserver</button>
</form>";
     }
	  
  }
  ?>

</section>
<?php include('includes/footer.php')?>
</body>
</html>