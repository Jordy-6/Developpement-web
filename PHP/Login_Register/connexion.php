<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="connexion.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="mail" id="email" placeholder="email@gmail.com">
        <br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" placeholder="">
        <br>
        <input type="submit" name="envoyer" value="Envoyer">
    </form>
    <a href="inscription.php"><h1>Inscription</a></h1>
    <a href="liste_utilisateur.php"><h1>Voir la liste totale d'utilisateur(nécessite la connexion)</a></h1>

    <?php 
        session_start();
        session_destroy();
        

        // Si le champ 'envoyer' (name) à été recu
        if( isset($_POST['envoyer']) ){
            
            $email = trim($_POST['mail']); //Recupère la valeur du champ 'mail' et trim supprime les espaces au debut et à la fin
            $mdpco = trim($_POST['mdp']);
            require 'cobdd.php';
            
            
            $sql = 'SELECT * FROM utilisateur WHERE email = :email';
            //Prepare l'insertion
            $select = $co->prepare($sql);
            // Execute l'insertion en ajoutant les données
            $select->execute([
                'email' => $email,
            ]);
            $utilisateur = $select->fetch();
            
            if(password_verify($mdpco ,$utilisateur['mdp'])){
                ?>
                <h1>Vous etes connecté</h1>       
                <?php
                 session_start();
                 $_SESSION['id'] = $utilisateur['id'];
                 

            }
                
        
                    
                    
            
            
           
        }
        
    
    
    ?>
    
    
   
</body>
</html>