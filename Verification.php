<?php
// Demarrons la session
session_start();

//Vérifions si les données des variables mail et password sont définies
if (isset($_POST['mail']) && isset($_POST['password'])) {
    //On relie ces variables dans d'autres variables. NB: $_post['mail'] et $_post['password'] sont les variables oû les données saisies seront loger
    $mail = $_POST['mail']; // ici la variable $mail reçoit la valeur logée dans la variable $_POST['mail']
    $password = $_POST['password']; // ici la variable $mail reçoit la valeur logée dans la variable $_POST['password']
    $erreur = "";
    // On se connecte à la base de données pour pouvoir verifier si les valeurs existe dans la base données
    $conn = mysqli_connect('localhost', 'root', '87203150a', 'dosso societe express') or die('Connexion à la base de données echoué !!');

    // on faire la requete pour selectionner le proprietaire des données saisies
    $req = "SELECT * FROM administrateur WHERE mail='$mail' AND mot_de_passe='$password' AND confirmation='$password'";

    // on execute la requete 
    $res = mysqli_query($conn, $req);

    // on compte le nombre de ligne ayant des rapports avec les données saisies par l'utilisateur
    $nbre_ligne = mysqli_num_rows($res);

    //on verifie s'il existe au moins une ligne
    if ($nbre_ligne > 0) {
        // on afficher la page Page_administrateur.html avec la fonction header()
        header("Location:Page_admin.php");
        // on cree une variable session 
        $_SESSION['mail'] = $mail;
    } else {
        $erreur = "Adresse E-mail ou Mot de passe incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="verification.css">
    <title>DOSSO SOCIETE EXPRESS</title>
</head>

<body>
    <nav>
        <h1>DOSS'O SOCIETE EXPRESS</h1>
    </nav>
    <section>
        <center>
            <form action="" method="POST">
                <p class="erreur">
                    <?php
                    if (isset($erreur)) // si la variable a une valleur alors l'E-mail ou mot de passe saisit est faux alors:
                    {
                        echo $erreur;
                    }
                    ?>
                </p>
                <p>
                    <input type="email" name="mail" placeholder="Entrez votre E-mail">
                </p>
                <p>
                    <input type="password" name="password" placeholder="Entrez votre mot de passe">
                </p>
                <input class="verification" type="submit" value="Connexion">
                <p></p>
                <p>
                    Pour ajouter un nouveau administrateur <a href="Ajout_admin.html"> cliquez ici</a>
                </p>

            </form>
        </center>
    </section>
    <footer>
        <P>&copy; TOUTE REPRODUCTION EST INTERDITE - 2022</P>
    </footer>
</body>

</html>