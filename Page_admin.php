<?php
session_start();
// On se connecte à la base de données pour pouvoir verifier si les valeurs existe dans la base données
$conn = mysqli_connect('localhost', 'root', '87203150a', 'dosso societe express') or die('Connexion à la base de données echoué !!');
$email = $_SESSION['mail'];

// on faire la requete pour selectionner le proprietaire des données saisies
$req = "SELECT nom,prenom FROM administrateur WHERE mail= '$email' ";

// on execute la requete 
$res = mysqli_query($conn, $req) or die(mysqli_error($conn));

// on recupere le nom et prenom de l'utlisateur connecté
$listes = mysqli_fetch_assoc($res);
$nom_admin = $listes['nom'];
$prenom_admin = $listes['prenom'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Page_admin.css">
    <title>DOSSO SOCIETE EXPRESS</title>
</head>

<body>
    <nav>
        <h1>DOSS'O SOCIETE EXPRESS</h1>
        <p>
            <?php echo  '<strong>Administrateur connecté :</strong> ' . $nom_admin . ' ' . $prenom_admin ?>
        </p>
    </nav>
    <section>
        <center>
            <button>
                <a href="#">Ajouter un nouveau employés</a>
            </button>
            <button>
                <a href="Liste_Employes.php">Voir la liste des employes</a>
            </button>
        </center>
    </section>
    <footer>
        <P>&copy; TOUTE REPRODUCTION EST INTERDITE - 2022</P>
    </footer>
</body>

</html>