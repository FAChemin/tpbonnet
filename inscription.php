<?php
session_start();
include("includes/cobdd.php");
include("navbar.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['user_nom']) && !empty($_POST['user_prenom']) && !empty($_POST['user_name']) && !empty($_POST['user_email'])) {
    $hash = password_hash($_POST['user_pswd'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO `user`(`user_nom`, `user_prenom`, `user_name`, `user_email`, `user_pswd`) VALUES (:user_nom, :user_prenom, :user_name, :user_email, :user_pswd)";
    $query = $db->prepare($sql);
    $query->bindValue(':user_nom', $_POST['user_nom'], PDO::PARAM_STR);
    $query->bindValue(':user_prenom', $_POST['user_prenom'], PDO::PARAM_STR);
    $query->bindValue(':user_name', $_POST['user_name'], PDO::PARAM_STR);
    $query->bindValue(':user_email', $_POST['user_email'], PDO::PARAM_STR);
    $query->bindValue(':user_pswd', $hash, PDO::PARAM_STR);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form class="formulaire" action="" method="POST">
    <form class="formulaire" action="" method="POST">
        <h1 style='color:white; font-weight:bold;'>Inscription</h1>
        <input type="text" class="form-control w-75" name="user_nom" placeholder="Nom">
        <input type="text" class="form-control w-75" name="user_prenom" placeholder="Prénom">
        <input type="text" class="form-control w-75" name="user_name" placeholder="Nom d'utilisateur">
        <input type="text" class="form-control w-75" name="user_email" placeholder="Adresse email">
        <input type="password" class="form-control w-75" name="user_pswd" placeholder="Mot de passe">
        <input class="btn btn-light" type="submit" value="S'inscrire">
        <?php
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!empty($_POST['user_nom']) && !empty($_POST['user_prenom']) && !empty($_POST['user_name']) && !empty($_POST['user_email']) && $query->execute()){
            echo("<p>Compte créé avec succès !");
        }
        else{
            echo("<p style='color:#FF7F7F' class='mt-4'>Erreur lors de la création du compte, veuillez réessayer");
        }
    }
        ?>
    </form>
    </form>
    <?php
    // include("footer.php");
    ?>
</body>
</html>
