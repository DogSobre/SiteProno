<?php
//Paramétrage de la connexion à la base de données
$db=  mysqli_connect('localhost:8889','root','root');
mysqli_init();

$recup_player = mysqli_query($db,'SELECT DISTINCT `Collab`, `classement_point` FROM `Classement` ORDER BY `classement_point`');

$compteur = 1;
while ($best_collab = mysqli_fetch_array($recup_player)){
    echo $compteur;
    echo $best_collab['Collab'];
    echo $best_collab['classement_point'];
    $compteur ++;
}