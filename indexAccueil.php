<?php

include 'index.php';
include 'indexLogin.php';

    //Init session.
session_start();

    //Check if the user is already connected and redirect him to login page if it's not true.

$_SESSION["Collab_Name"] = $_POST["login"];
$login = $_SESSION['Collab_Name'];
$_SESSION["Collab_Password"] = $_POST["password"];
$password = $_SESSION['Collab_Password'];

if (!empty($_SESSION["Collab_Name"]) || !empty($_SESSION["Collab_Password"]) !== true){
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
    <link rel="stylesheet" type="text/css" href="assets/CSS/styleAccueil.css">
</head>

<body>
    <header>
        <div id="logoMP">
            <a href="https://cse-marketpay.fr/">
                <img src="assets/images/MPlogo.png">
            </a>
        </div>

        <div id="presentationTitre">
            <h1>Bienvenue sur le site de Prono du CSE</h1>
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
                        <a href="indexRewards.php" class="topNav">Récompenses</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <section class="mainContainer">
        <aside class="g1">
            <div class="carrousel">
                <div class="mySlide">
                    <a href="indexClassement.php" title="classement" target="_blank">
                        <img src="assets/images/forbesc.jpg" name="classement" alt="Classement">
                    </a>
                </div>
                <div class="mySlide">
                    <a href="indexCalendrier.php" title="match du jour" target="_blank">
                        <img src="assets/images/rencontreJour.jpg" name="match du jour" alt="match_du_jour">
                    </a>
                </div>
                <div class="mySlide">
                    <a href="indexRewards.php" title="récompenses" target="_blank">
                        <img src="assets/images/reward.jpg" name="reward" alt="recompense_vainqueurs">
                    </a>
                </div>
            </div>
        </aside>
        <article class="g2Conteneur">
            <div id="corpsDeTexte">
                <ul id="presentation">
                    <h2>
                        Bienvenue sur le site de pronostics du CSE. Chaque jour venez pariez sur quelle
                        équipe
                        gagnera son match.
                    </h2>
                    <p>
                        Les règles du jeu son les suivantes :
                        <br>
                        Chaque jour vous pourrez parier sur quelle équipe gagnera. Si vous avez juste et que vous
                        trouvez le
                        score final, 5 points vous serons attribués, sinon 3 points vous sont accordés. Dans le cas
                        où ne trouverez pas le vainqueur, aucun points ne vous serins distribués. Le classement
                        s'effectuera en fonctions de vos points. À la fin de
                        l'Euro,
                        ceux ou celles qui auront accumulés le plus de points auront des lots proportionnel à leur
                        classement
                    </p>
                </ul>
            </div>
        </article>
    </section>
    <footer>
        <p>© 2019-2020 Market Pay & Market Pay Tech</p>
    </footer>
</body>

<script>
    var slideIndex = 0;

    function carrousel() {
        var i = 0;
        var x = document.getElementsByClassName('mySlide');
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex].style.display = "block";
        slideIndex++;
        if (slideIndex == x.length) {
            slideIndex = 0;
        }
        setTimeout(carrousel, 2500); //choose duration in ms
    }
    carrousel();
</script>

</html>