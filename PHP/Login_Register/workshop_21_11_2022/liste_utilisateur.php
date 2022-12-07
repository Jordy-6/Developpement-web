
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste utilisateur</title>
</head>
<body>
    <?php 
    
    session_start();
    
                
    if (array_key_exists('id' , $_SESSION)) {
         $sql = 'SELECT * FROM utilisateur';
                
                require 'cobdd.php';

                $voir = $co->prepare($sql);

                $voir->execute();
                $utilisateur = $voir->fetchAll();
                
                foreach($utilisateur as $u){
                    $date = new DateTime($u['inscription']);
                    echo 'Id : '.$u['id'].' | Email : '.$u['email'].' | Mot de passe : '.$u['mdp'].' | Date Inscription :  '.$date ->format('Y-m-d H:i:s');
                    ?>
                    <br>
                    <br>
                    <?php

                }  
      }
      
      else{
            echo 'Connectez vous ici avant de consulter la liste';
            ?>
            <a href="connexion.php">Connexion</a>
            <?php
        }
        ?>
        <a href="inscription.php">Inscrivez-vous</a>
     <?php
      
    
?>
</body>
</html>
