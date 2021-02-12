
<header>
	<a href="index.php"><img class="logo" id="logo" name="logo" src="images/logo.png"></a>
	<nav id="topnav" class="topnav">

		<a href="index.php" class="active left">
			<i class="fa fa-home"></i> Home
		</a> 
      <div class="dropdown">
        <a href="category.php?cat=concert" class="dropbtn">Concert 
            <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content">
            <a href="category.php?cat=concert-electro">Electro</a>
            <a href="category.php?cat=concert-pop">Pop</a>
            <a href="category.php?cat=concert-jazz">Jazz</a>
        </div>
      </div> 
  		<div class="dropdown">
    		<a href="category.php?cat=festival" class="dropbtn">Festival 
      			<i class="fa fa-caret-down"></i>
    		</a>
	    	<div class="dropdown-content">
		      	<a href="category.php?cat=festival-electro">Electro</a>
            	<a href="category.php?cat=festival-pop">Pop</a>
            	<a href="category.php?cat=festival-jazz">Jazz</a>
	    	</div>
  		</div> 
      <div class="dropdown">
        <a href="category.php?cat=evenement" class="dropbtn">Évènements 
            <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content">
            <a href="category.php?cat=evenement-musee">Musée</a>
			<a href="category.php?cat=evenement-exposition">Expositions</a>
        </div>
      </div> 
  		<a href="#about" class="left">Contact</a>
		
		<?php 
			if(isset($_SESSION['email'])){
				
				echo "<a class='right' href='logout.php'>Déconnexion</a>";
				echo "<a class='right' href=\"user.php?nom:{$_SESSION['email']}\" >Votre compte</a>";
			}else{
				echo "<a class='right' href='login.php'>Connexion</a>";
				echo "<a class='right' href='registration.php' >Inscription</a>";
			}
		?>
 		<a class="right" href="panier.php">
 			<i class="fa fa-shopping-basket"></i>
 		</a>
  		
  		<a href="javascript:void(0);" class="icon" onclick="responsiveFunction()">&#9776;</a>
	</nav>
</header>
<script type="text/javascript" src="js/nav_respon.js"></script>