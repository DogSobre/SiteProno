<?php
//Paramétrage de la connexion à la base de données

$database = localhost;
$user = root;
$pwd = root;

try {
    $myPdo = new PDO('mysql:host=$database;dbname=inventory;charset=UTF-8', '$user' ,'$pwd');
    foreach ($myPdo->query('SELECT * from Classement') as $row);{
        /** @var TYPE_NAME $row */
        print_r($row);
    }
    $myPdo = null;
}catch (PDOException $e){
    print "Erreur :" . $e->getMessage() . "<br/>";
    die();
}

$sth = $myPdo -> prepare("SELECT `Collab`, `classement_point` FROM `Classement` ORDER BY `` DESC");
$sth -> execute();

$result = $sth -> fetchAll(PDO::FETCH_ASSOC);

print_r($result);

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