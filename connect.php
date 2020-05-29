<?php
    
    session_start();
//connexion à la base de données
// Informations d'identification
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'rs');
     
    // Connexion à la base de données MySQL 
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
     
    // Vérifier la connexion
    if($db === false){
        die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
    }

    function islogged(){
        if(isset($_SESSION['pseudo'])){
            $logged = 1;

        }else{
            $logged = 0;
        }

        return $logged;
    }

?>