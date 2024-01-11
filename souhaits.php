<?php
session_start();
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    include("includes/cobdd.php");
    include("navbar.php");

    $sql= "SELECT * FROM `souhaits` WHERE `user_name` = :session_username";
    $query=$db->prepare($sql);
    $query->bindValue(':session_username', $_SESSION['id'], PDO::PARAM_STR);
    $query->execute();
    $souhaits = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h2>Liste de souhaits</h1>
        <div class="liste">
        <?php
            foreach ($souhaits as $souhait) {
                echo "<div class='souhaits'>";
                echo "<b><u>".$souhait['article_nom']."</u></b><br>" .
                $souhait['article_description'] . "<br><br>" .
                $souhait['article_prix'] . " €<br><br>";
                echo "</div>";
            }
        ?>
        </div>
        <?php
            // include("footer.php");
        ?>
    </body>
</html>