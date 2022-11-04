<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>DOSSO SOCIETE EXPRESS</title>
    <link rel="stylesheet" href="Ajout_admin.css">
</head>

<body>
    <nav>
        <h1>DOSS'O SOCIETE EXPRESS</h1>
    </nav>
    <section>
        <!--Les codes de php-->
        <?php
        //Connexion à la base de données dosso_societe_express
        $conn = mysqli_connect('localhost', 'root', '87203150a', 'dosso societe express') or die('Connexion à la base de données echoué !!');

        // Les recuperateurs quand le formulaire est entrain d'être rempli
        $nom = $_POST['name'];
        $prenom = $_POST['firstname'];
        $mail = $_POST['email'];
        $numero = $_POST['phone'];
        $mot_de_passe = $_POST['password'];
        $confirmation = $_POST['c_password'];
        $genre = $_POST['gender'];

        // La requête permettant de recuperer les données des recuparateurs
        $req = "   INSERT INTO administrateur(nom,prenom,mail,numero,mot_de_passe,confirmation,genre) values ( '$nom','$prenom','$mail','$numero',
                    '$mot_de_passe','$confirmation','$genre')";

        // Execution de la requete
        $res = mysqli_query($conn, $req) or die(mysqli_error($conn));

        //Verification de l'execution
        if ($res) {
            $message = "Bonjour $nom $prenom Vous êtes maintenant un administrateur de la société. Vous pouvez ajouter, 
                                modifier et supprimer un employés";
        } else {
            $message = "L'ajout du nouveau administrateur a echoué";
        }
        ?>
        <!-- fin des codes de php-->
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <center>
            <h2>Ajout d'un nouveau administrateur</h2>
            <p class="text">
                <?php echo $message ?>
            </p>
            <p class="text">
                Connecter vous pour effectuer ces différentes opérations <a href="Verification.php" class="lien"> en cliquant ici</a> ou <a href="Ajout_admin.html" class="lien">cliquez ici</a> pour ajouter un nouveau administrateur.
            </p>
        </center>
    </section>
    <footer>
        <P>&copy; TOUTE REPRODUCTION EST INTERDITE - 2022</P>
    </footer>
</body>

</html>