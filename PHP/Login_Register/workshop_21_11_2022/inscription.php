<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="inscription.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="mail" id="email" placeholder="email@gmail.com">
        <br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" placeholder="">
        <br>
        <input type="submit" name="envoyer" value="Envoyer">
    </form>
    <a href="connexion.php"><h1>Connexion</a></h1>
    <a href="liste_utilisateur.php"><h1>Voir la liste totale d'utilisateur(nécessite la connexion)</a></h1>

    <?php 
        session_start();
        session_destroy();

        
        
        
        if( isset($_POST['envoyer']) ){
            
            $email = trim($_POST['mail']); //Recupère la valeur du champ 'mail' et trim supprime les espaces au debut et à la fin
            $mdp = trim($_POST['mdp']);
            $mdp_hashed = password_hash($mdp, PASSWORD_DEFAULT);
        

            $erreur = false; //On considere qu'il n'y a pas d'erreur pas defaut

            if(empty($email)){
                echo '<p>Le champ email est vide</p>';
                $erreur = true; // Dès qu'on rencontre une erreur, on la passe à True
            }

            if(empty($mdp)){
                echo '<p>Le champ mot de passe est vide</p>';
                $erreur = true;
            }

            
            //S'il n'a pas d'erreurs
            if($erreur == false){
                
                //On se connecte à la BDD
                require 'cobdd.php';

                $sql = 'INSERT INTO utilisateur(email,mdp) VALUES (:e, :m)';

                //Prepare l'insertion
                $insert = $co->prepare($sql);
                // Execute l'insertion en ajoutant les données
                $insert->execute([
                    'e' => $email,
                    'm' => $mdp_hashed,
                ]);

                if($insert->rowCount()> 0){
                    echo '<p>Inscription validée</p>';
                }
                else{
                    echo '<p>Erreur</p>';
                }
            }

        }
        
    
    
    ?>
</body>
</html>