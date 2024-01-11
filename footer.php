
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .footer {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
            flex-wrap: no-wrap;

            position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:black;
        }

        .footer a{
            text-decoration: none;
            color: white;
        }

        .footer a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="footer fixed-bottom">
    <a href="articles.php">ARTICLES</a>
        <?php
        if(empty($_SESSION['id'])){
            echo "<a href='connexion.php'>SE CONNECTER</a>
            <a href='inscription.php'>S'INSCRIRE</a>";
        }
        if(!empty($_SESSION['id'])){
            echo "<a href='souhaits.php'>LISTE DE SOUHAITS</a>
            <a href='deconnexion.php'>SE DECONNECTER</a>";
        }
        ?>
    </div>
</body>
</html>