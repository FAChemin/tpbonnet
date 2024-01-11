<?php

$sql= "INSERT INTO souhaits (`article_nom`, `article_description`, `article_prix`, `user_name`) VALUES (:article_nom, :article_description, :article_prix, :user_name);
$query=prepare($sql);
$query=$db->bindValue(':article_nom', PDO::PARAM_STR);
$query=$db->bindValue(':article_description', PDO::PARAM_STR);
$query=$db->bindValue(':article_prix', PDO::PARAM_STR);
$query=$db->bindValue(':user_name', $_SESSION['id'], PDO::PARAM_STR);
$query->execute();
$souhaits=$query->fetch();

?>