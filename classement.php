<?php

// Setting the connection to the DataBase
$database = localhost;
$user = root;
$pwd = root;

try {
    $myPdo = new PDO('mysql:host=$database;dbname=inventory;charset=UTF-8', '$user' ,'$pwd');
    $myPdo -> setAttribute(ATTR_ERRMODE, ERRMODE_EXCEPTION);

    $sth = $myPdo -> prepare('SELECT Collab, classement_point FROM Classmement ORDER BY classement_point DESC');
    $result = $sth -> fetchAll(FETCH_ASSOC);
    print_r($result);
    echo 'Connection to the DataBase done.';

    // Catch the exceptions an showing them
}catch (PDOException $e){
    print "Error :" . $e -> getMessage() . "<br/>";
    die();
}

$result = fetchAsso([ int, $bestCollab = "FETCH_BOTH"]);

$results = $myPdo -> query('SELECT Collab, classement_point FROM Classement');

// Display ranking board
$count = 1;
while(($data = $results -> fetch()) && ($count <= 10)){
    echo $count;
    echo $bestCollab['Collab'];
    echo $bestCollab['classement_point'];
    $count++;
}
$results -> closeCursor();

// Closing the connection to the DataBase :
$myPdo = null;
echo 'DataBase closed.';