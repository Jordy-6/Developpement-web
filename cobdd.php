<?php
    $host = 'localhost';
    $bdd = 'workshop_21_11_2022';
    $identifiant = 'root';
    $mdp = 'root';

    //essaie quelque chose
    try{
        //Connexion à la base de données
        $co = new PDO('mysql:host='.$host.':8889;dbname='.$bdd,$identifiant, $mdp);
                                           //rajouter le port
    }
    
    
    //si le try ne fonctionne pas
    catch(Exception $e){
        echo $e->getMessage();
        die(); //arrete tout le programme
    }

?>