<?php
session_start();
ob_start(); // Démarre la temporisation de sortie
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        .articles {
            display: flex;
            flex-direction: row;
            flex-grow: 1;
            flex-wrap: wrap;
            padding-bottom: 2%;
        }
        .result {
            background-color: #ffffff;
            margin-top: 0.5%;
            margin-left: 2%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            border: solid 2px black;
            border-radius: 10px;
            width: 30%;
            height: 2%;
            padding-left: 2%;
        }

        .resultd {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            text-align: center;
        }

        form{
            text-align: center;
        }

        body{
            width: 100vw;
            height: 100vh;
            background-image: url('includes_images/cap.jpeg');
            background-position: cover;
        }

        .navbar{
            padding: 1%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
            background-color: black;
        }

        .souhaits{
            margin-bottom: 1%;
            margin-left: 10%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            background-color: white;
            border: solid 2px black;
            width: 40rem;
            height: 10rem;
            text-align: center;
            box-shadow: 3px 3px 3px black;
        }

        .liste{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .navbar a{
            text-decoration: none;
            color: white;
        }

        .navbar a:hover{
            text-decoration: underline;
        }

        h2{
            margin-left: 5%;
            margin-top: 2%;
            margin-bottom: 1%;
        }

        h1{
            padding-top: 2%;
            text-align: center;
            /* margin-top: 2%; */
            margin-bottom: 2%;
        }

        .coeurtext{
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .coeurtext p{
            
        }

        .info{
            padding-top: 0.7%;
            color: white;
            margin-left: 2%;
            /* display: flex; */
            /* flex-direction: column; */
            /* justify-content: space-between; */
            /* text-align: center; */
            border: solid 2px black;
            border-radius: 10px;
            border: 2px solid black; /* Remplacez la couleur et l'épaisseur de la bordure selon vos besoins */
            width: 70%;
            background-color: black;
        }

        .info p{
            margin-left: 3%;
        }

        a h1{
            text-decoration: none;
        }

        .bienvenue{
            color:white;
            font-size: 20px;
            font-weight: 500;
        }

        .result img {
            width: 20%;
        }

        .formulaire{
            padding: 5%;
            margin-top: 5%;
            display: flex;
            flex-direction: column;
            align-items : center;
            justify-content: space-around;
            border: solid 2px black;
            border-radius: 10px;
            width: 25%;
            height: 54%;
            margin-left: 35%;
            background: rgb(2,0,36);
            background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(11,47,7,1) 70%);
}

        .formulaire p{
            color: white;
        }

        .formulaire input{
            margin-top: 3%;
        }

    </style>
</head>
<body>
<a style='text-decoration: none; color: black; font-weight: 800;' href="articles.php"><h1>CATALOGUE ARTICLES</h1></a>
    <div class="navbar">
    <a href='articles.php'>ARTICLES</a>
        <?php
        if(empty($_SESSION['id'])){
            echo "<a href='connexion.php'>SE CONNECTER</a>
            <a href='inscription.php'>S'INSCRIRE</a>";
        }
        if(!empty($_SESSION['id'])){
            echo "<a href='souhaits.php'>LISTE DE SOUHAITS</a>
            <a href='deconnexion.php'>SE DECONNECTER</a>";
            echo "<p class='bienvenue'>BONJOUR ".$_SESSION['id']."</p>";
        }
        
        ?>
    </div>
</body>
</html>
