<?php

// Paramétrage de la connexion à la base de données
$database = localhost;
$user = root;
$pwd = root;

try {
    $myPdo = new PDO('mysql:host=$database;dbname=inventory;charset=UTF-8', '$user' ,'$pwd');
    $myPdo -> setAttribute(ATTR_ERRMODE, ERRMODE_EXCEPTION);

    $sth = $myPdo -> prepare('SELECT Collab, classement_point FROM Classmement ORDER BY classement_point DESC');
    $result = $sth -> fetchAll(FETCH_ASSOC);
    print_r($result);
    echo 'Connexion à la b aseé de données effectuée. ';

    // Capture des exception si exception lancée, et affichage des info :
}catch (PDOException $e){
    print "Error :" . $e -> getMessage() . "<br/>";
    die();
}

$result = fetchAsso([ int, $bestCollab = "FETCH_BOTH"]);

$results = $myPdo -> query('SELECT Collab, classement_point FROM Classement');

// Affichage du tableau de classement
$count = 1;
while(($data = $results -> fetch()) && ($count <= 10)) {
    echo $count;
    echo $bestCollab['Collab'];
    echo $bestCollab['classement_point'];
    $count++;
}
$results -> closeCursor();

// Fermeture de la conneixon à la base de données :

$myPdo = null;
echo 'Base de données fermée.';


/*$best_collab = 0 ;

$recup_player = $myPdo->query("","","","");

public PDOStatement::fetchAsso([ int, $best_collab = "PDO::FETCH_BOTH" [array ]]) : mixed ;

$compteur = 1;
while (mysqli_result::fetch_array([int $best_collab = MYSQLI_BOTH]) : mixed ){
    echo $compteur;
    echo $best_collab['Collab'];
    echo $best_collab['classement_point'];
    $compteur ++;
}

//changer mysqli --> $PDO/*/
