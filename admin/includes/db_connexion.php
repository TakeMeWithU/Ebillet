<?php

define("SERVEUR","localhost");
define("USER","root");
define("MDP","mysql");
define("BD","e-billet");


function connectionBd($hote=SERVEUR,$username=USER,$mdp=MDP,$bd=BD)
 {
   try
   {
        $connex= new PDO('mysql:host='.$hote.';dbname='.$bd, $username, $mdp);
       $connex->exec("SET CHARACTER SET utf8");
            
       return $connex;
   }
 catch(Exception $e)
  {
         echo 'Erreur : '.$e->getMessage();
        echo 'N° : '.$e->getCode();
       return null;
   }
}

?>