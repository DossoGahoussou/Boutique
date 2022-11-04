<?php
session_start();
// On se connecte à la base de données pour pouvoir verifier si les valeurs existe dans la base données
$conn = mysqli_connect('localhost', 'root', '87203150a', 'dosso societe express') or die('Connexion à la base de données echoué !!');

// on faire la requete pour selectionner le proprietaire des données saisies
$req = "SELECT * FROM employes ";

// on execute la requete 
$res = mysqli_query($conn, $req) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Liste_Employes.css">
    <title>DOSSO SOCIETE EXPRESS</title>
</head>

<body>
    <nav>
        <h1>DOSS'O SOCIETE EXPRESS</h1>
    </nav>
    <section>
        <center>
            <br>
            <h2>LISTES DES EMPLOYES DE LA SOCIETE</h2>
            <table border="2">
                <tr>
                    <th>CODE</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>TELEPHONE</th>
                    <th>SEXE</th>
                    <th>COMMUNE</th>
                </tr>
                <!-- Début de la boucle while-->
                <?php while ($employe = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <td><?php echo $employe['id'] ?></td>
                        <td><?php echo $employe['nom'] ?></td>
                        <td><?php echo $employe['prenom'] ?></td>
                        <td><?php echo $employe['telephone'] ?></td>
                        <td><?php echo $employe['sexe'] ?></td>
                        <td><?php echo $employe['commune'] ?></td>
                    </tr>
                <?php } ?>
                <!-- Fin de la boucle while-->

            </table>
            <button>
                <a href="Ajout_Employes.html" class="lien3">Ajouter un nouveau employés</a>
            </button>
        </center>
    </section>
    <footer>
        <P>&copy; TOUTE REPRODUCTION EST INTERDITE - 2022</P>
    </footer>
</body>

</html>