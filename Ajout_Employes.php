<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>DOSSO SOCIETE EXPRESS</title>
    <link rel="stylesheet" href="./Ajout_Employes.css">
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
        $telephone = $_POST['phone'];
        $sexe = $_POST['gender'];
        $commune = $_POST['town'];


        // La requête permettant de recuperer les données des recuparateurs
        $req = " INSERT INTO employes(nom,prenom,telephone,sexe,commune) values ( '$nom', '$prenom', '$telephone', '$sexe', '$commune' ) ";

        // Execution de la requete
        $res = mysqli_query($conn, $req) or die(mysqli_error($conn));

        //Verification de l'execution
        if ($res) {
            $message = "L'ajout du nouveau employé a été effectué avec succès !";
        } else {
            $message = "L'ajout du nouveau employé a echoué !";
        }
        ?>
        <!-- fin des codes de php-->
        <br>
        <br>
        <center>
            <h2>Ajout d'un nouveau employe</h2>
            <p class="text">
                <?php echo $message ?>
            </p>

            <button>
                <a href="Ajout_Employes.html" class="lien3">Ajouter un nouveau employés</a>
            </button>
            <button>
                <a href="Liste_Employes.php" class="lien3">Voir la liste des employes</a>
            </button>
        </center>
    </section>
    <footer>
        <P>&copy; TOUTE REPRODUCTION EST INTERDITE - 2022</P>
    </footer>
</body>

</html>