<?php

//Paramétrage de la connexion à la base de données
$database = localhost;
$user = root;
$pwd = root;

try {
    $myPdo = new PDO('mysql:host=$database;dbname=inventory;charset=UTF-8', '$user' ,'$pwd');
    $myPdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $myPdo -> prepare('SELECT Collab; classement_point FROM Classmement ORDER BY classement_point DESC');
    $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
    print_r($result);

    // Capture des exception si exception lancée, et affichage des info :
}catch (PDOException $e){
    print "Error :" . $e -> getMessage() . "<br/>";
    die();
}

$result =  PDOStatement::fetchAsso([ int, $bestCollab = "PDO::FETCH_BOTH"]);

//affichage du tableau de classement
$compteur = 1;
while($result -> execute($sth)) {
    echo $compteur;
    echo $bestCollab['Collab'];
    echo $bestCollab['classement_point'];
    $compteur++;
}

?>



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