<?php
include("includes/cobdd.php");
session_start();
include("navbar.php");

$erreur = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "SELECT * FROM `user` WHERE `user_name` = :identifiant";
    $query = $db->prepare($sql);
    $query->bindValue(':identifiant', $_POST['identifiant']);
    $query->execute();
    $verifConnexion = $query->fetch();
    $hash = $verifConnexion['user_pswd'];

    if ($verifConnexion['user_name'] === $_POST['identifiant'] && password_verify($_POST['mdp'], $hash) === TRUE) {
        $_SESSION['id'] = $verifConnexion['user_name'];
        header('Location: articles.php');
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        $erreur = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form class="formulaire" action="" method="POST">
        <img style='width:50%;' src="includes_images/portrait.svg" alt="">
        <h1 style=' color:white;'><b>Connexion</b></h1>
        <input class='form-control w-75' type="text" name="identifiant" placeholder="Identifiant">
        <input class='form-control w-75' type="password" name="mdp" placeholder="Mot de passe">
        <input class='btn btn-light' type="submit" value="Connexion"><br>

        <?php
        if ($erreur) {
            echo('<p style="color:#FF3333;">Identifiants incorrects</p>');
        }
        ?>

        <p>Vous n'êtes pas encore inscrit ? Créez votre compte <a href="inscription.php">ici</a></p>
    </form>
    <?php
    // include("footer.php");
    ?>
</body>
</html>
