<?php
//Paramétrage de la connexion à la base de données

$database = localhost;
$user = root;
$pwd = root;

try {
    $myPdo = new PDO('mysql:host=$database;dbname=inventory;charset=UTF-8', '$user' ,'$pwd');
    foreach ($myPdo -> prepare('SELECT Collab, classement_point FROM Classement ORDER BY classement_point DESC') as $row);{
        /** @var TYPE_NAME $row */
        print_r($row);
    }
    $myPdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $myPdo -> fetchAll(PDO::FETCH_ASSOC);
    print_r($result);

    // Capture des exception si excepetion lancée et affichage des info :
}catch (PDOException $e){
    print "Erreur :" . $e->getMessage() . "<br/>";
    die();
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