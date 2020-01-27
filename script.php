<!DOCTYPE html>
<html>
<head>
    <title>Team Buider : Concours Pronostic</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cours.css">
</head>
<body>
    <h1>CLASSEMENT</h1>

    <?php
    $servername = 'db812896877.hosting-data.io';
    $username = 'dbo812896877';
    $password = 'RtsCbnbMLRaipuEmqqkb';

    //On essaie de se connecter
    try{
        $dbco = new PDO("mysql:host=$servername;dbname=db812896877", $username, $password);
        //On définit le mode d'erreur de PDO sur Exception
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connexion réussie';
    }

        /*On capture les exceptions si une exception est lancée et on affiche
         *les informations relatives à celle-ci*/
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
    /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
    $sth = $dbco->prepare("SELECT pseudo, points FROM membre order by points DESC limit 0, 5");
    $sth->execute();

    /*Retourne un tableau associatif pour chaque entrée de notre table
     *avec le nom des colonnes sélectionnées en clefs*/
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

    /*print_r permet un affichage lisible des résultats,
     *<pre> rend le tout un peu plus lisible*/
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';
    ?>

    <? foreach($resultat as $resultats){
        echo"<table border='1'>"."<tr>"."<th>"."Pseudo"."Points"."</th>"."</tr>"."<br>";
        echo"<tr>"."<td>".$resultats['pseudo'].$resultats['points']."</td>"."</tr>"."</table>"."<br>";
    }

    // On recupere tout le contenu de la table news
    $reponse = $dbco->query('SELECT pseudo, points FROM membre');

    // On affiche le resultat
    $nombre_de_lignes = 1;

    while (($donnees = $reponse->fetch()) && ($nombre_de_lignes <= 100))
    {
        //On affiche les données dans le tableau
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td> $nombre_de_lignes </td>";
        echo "<td> $donnees[pseudo] </td>";
        echo "<td> $donnees[points] </td>";
        echo "</tr>";
        echo "</table>";
        $nombre_de_lignes++;
    }
    $reponse->closeCursor();?>

    <? $reponse = $dbco->query('SELECT pseudo, points FROM membre');

    while ($donnees = $reponse->fetch()){
        echo $donnees['points'] . '<br />';
    }

    $reponse->closeCursor();
    ?>
    <td align=center><?php echo $resultats['pseudo']; ?></td>
    <td align=center><?php echo $resultats['pseudo']; ?></td>
    <td align=center><?php echo $resultats['pseudo']; ?></td>
    <? //On ferme la connexion
    $conn = null;
    echo "la base est ferme" ;
    ?>
</body>
</html>