<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "sitePronoTest";
$dboption = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Connection to database :
try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, $dboption);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

session_start();

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

                <?php
                if (!empty($_POST['Collab_Name']) && !empty($_POST['Collab_Password'])){
                    $username = PDO::quote($_POST['Collab_Name']);
                    $password = PDO::quote($_POST['Collab_Password']);
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $email = PDO::quote($_POST['Collab_Mail']);

                    $isUsername = PDO::query("SELECT * FROM Collab WHERE Collab_Username = '".$username."'");
                    $isPasswordCorrect = password_verify($password, $hashedPassword);

                    if ($isPasswordCorrect = true){
                        echo ('Bienvenue');
                    }
                    else{
                        echo ('Undefined User or Password');
                    }
                }
                ?>

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
                                <input type="submit" name="check" placeholder="Ok" value="OK" onclick="document.location.href='indexAccueil.html'">
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