<?php
//Paramétrage de la connexion à la base de données
$db=  mysqli_connect('localhost:8889','root','root');
mysqli_init();

$recup_player = mysqli_query($db,'SELECT DISTINCT `Collab`, `classement_point` FROM `Classement` ORDER BY `classement_point` DESC ');

$compteur = 1;
while (mysqli_result::fetch_array([int $best_collab = MYSQLI_BOTH]) : mixed ){
    echo $compteur;
    echo $best_collab['Collab'];
    echo $best_collab['classement_point'];
    $compteur ++;
}