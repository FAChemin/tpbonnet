<?php
session_start();
include("navbar.php");
include("includes/cobdd.php");
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$sql = "SELECT * FROM `article`";
$query = $db->prepare($sql);
$query->execute();
$articles = $query->fetchAll();

$nom = isset($_POST['nom']);
$description = isset($_POST['description']);
$prix = isset($_POST['prix']);

// var_dump($articles);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql= "INSERT INTO `souhaits`(`article_nom`, `article_description`, `article_prix`, `user_name`) VALUES (:article_nom, :article_description, :article_prix, :user_name)";
    $query=$db->prepare($sql);
    $query->bindValue(':article_nom', $_POST['nom'], PDO::PARAM_STR);
    $query->bindValue(':article_description', $_POST['description'], PDO::PARAM_STR);
    $query->bindValue(':article_prix', $_POST['prix'], PDO::PARAM_INT);
    $query->bindValue(':user_name', $_SESSION['id'], PDO::PARAM_STR);
    $query->execute();
}
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .titre {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Articles</h1>
    <div class="info">
        <p>Pour ajouter des articles à votre liste de souhaits, veuillez vous connecter à votre compte, ou vous inscrire si vous n'avez pas encore de compte.</p>
    </div>
    <?php
        
        echo "<div class='articles'>";
        foreach ($articles as $article) {
            echo "<div class='result'>";
            echo '<img src="'.$article['image'].'"><br>';
            echo "<div class='resultd'>
            <form action='' method='POST'>";
            echo "<p><input type='hidden' name='nom' value='" . htmlspecialchars($article['nom'], ENT_QUOTES) . "'>"."<h5>".$article['nom']."</h5><br>";
            echo "<p><input type='hidden' name='description' value='" . htmlspecialchars($article['description'], ENT_QUOTES) . "'>" . $article['description'] . "<br>";
            echo "<p><input type='hidden' name='prix' value='" . htmlspecialchars($article['prix'], ENT_QUOTES) . "'>" . $article['prix'] . "€<br><br>";            
            if($_SESSION['id']){
                echo "<div class='coeurtext'><input style='width: 40px; height: 40px;' src='includes_images/coeur.svg' type='image' value='Ajouter à la liste de souhaits'>Cliquez sur le coeur pour ajouter</div>";
            }
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
        // include("footer.php");
    ?>

</body>
</htm