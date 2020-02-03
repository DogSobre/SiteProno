<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sitePronoTest";
$option = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Connection to database :
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $option);
    echo "Connected successfully";
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST) and !empty($_POST['pwd']) and !empty($_POST['login'])){
    $pseudo = $_POST['Collab_Mail'];
    $password = $_POST['Collab_Password'];

    $req = $db -> prepare('SELECT Collab_Name, Collab_Mail, Collab_Password FROM Collab');
    $req -> execute(array(
        ':nom' => $pseudo,
        ':password' => $password));

    $result = $req -> fecth();

    if (!$result){
        echo '<body onLoad = "alert(\'Undefined user\')">';
    }
    else{
        session_start();
        $_SESSION['Collab_Name'] = $pseudo;
        echo ('Bienvenue sur le site de Prono de MP/MPT');
        exit();
    }
}

?>

<!DOCTYPE>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Pronostic CSE</title>
    <link rel="icon" href="assets/images/logo.png" />
    <link rel="stylesheet" type="text/css" href="assets/CSS/styleLogin.css">
</head>

<body>

    <header>
        <div id="logoMP">
            <a href="https://cse-marketpay.fr/">
                <img src="assets/images/MPlogo.png">
            </a>
        </div>
        <div id="presentationTitre">
            <h1>Pronostic CSE</h1>
            <h2>Connectez-vous au site de pronostics du CSE</h2>
        </div>
    </header>

    <section class="loginContainer">
        <form>
            <div id="loginPres">
                <ul class="presentation">
                    Connectez-vous au site de Pronos du CSE et tentez de gagner des lots en faisant partie des premiers
                    du classement.
                </ul>
            </div>
            <div style="text-align: center;">
                <table>
                    <tbody>
                        <tr>
                            <td>Mail Collaborateur :</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" name="userMail" placeholder="collaborateur@carrefour.com" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Mot de Passe :</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="userPassword" placeholder="**********" required>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button>

                                    <a href="indexAccueil.html">OK</a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </section>
    <footer>
        <p>© 2019-2020 Market Pay & Market Pay Tech</p>
    </footer>
</body>

</html>