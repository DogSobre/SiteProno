<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "sitePronoTest";

// Connection to database :
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
/*
// Choose the values from rows `Collab`
$sth = $conn -> prepare('SELECT Collab, classement_point FROM Collab ORDER BY classement_point');
$sth -> execute();

$result = fetchAsso([ int, $bestCollab = "FETCH_BOTH"]);

$results = $conn -> query('SELECT Collab, classement_point FROM Classement');

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
$conn = null;
echo 'DataBase closed.';*/
?>