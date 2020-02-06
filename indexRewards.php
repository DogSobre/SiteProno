<?php

include 'index.php';

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: indexLogin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Pronostic CSE</title>
    <link rel="icon" href="assets/images/MPlogo.png" />
    <link rel="stylesheet" type="text/css" href="assets/CSS/styleRewards.css">
</head>

<body>
    <header>
        <div id="logoMP">
            <a href="https://cse-marketpay.fr/">
                <img src="assets/images/MPlogo.png">
            </a>
        </div>

        <div id="presentationTitre">
            <h1>Consultez les différentes récompenses mises en jeu</h1>
        </div>

        <nav>
            <div class="conteneurNav">
                <ul>
                    <li>
                        <a href="indexAccueil.php" class="topNav">Accueil</a>
                    </li>
                    <li>
                        <a href="indexClassement.php" class="topNav">Classement</a>
                    </li>
                    <li>
                        <a href="indexCalendrier.php" class="topNav">Calendrier</a>
                    </li>
                    <li>
                        <a href="indexParis.php" class="topNav">Paris</a>
                    </li>
                    <li>
                        <a href="indexRewards.php" class="topNav">Récompenses</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <footer>
        <p>© 2019-2020 Market Pay & Market Pay Tech</p>
    </footer>
</body>

</html>