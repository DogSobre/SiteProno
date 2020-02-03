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
/*
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$req = $db->prepare('INSERT INTO Collab(Collab_Name, Collab_Password, Collab_email) VALUES(:pseudo, :pass, :email)');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));


$pass_hash = password_hash('password1', PASSWORD_DEFAULT);
echo '// Voici le mdp hashé : ';
echo ($pass_hash);
*/
$pseudo = 0;

$req = $db->prepare('SELECT Collab_Name, Collab_Password FROM Collab WHERE Collab_Name = :pseudo');
$req->execute(array('pseudo' => $pseudo));
$result = $req->fetch();

$isPasswordCorrect = password_verify($_POST['Collab_Password'], $result['Collab_Password']);

if (!$result)
{
    echo 'Undefined User';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['idCollab'] = $result['idCollab'];
        $_SESSION['Collab_Name'] = $pseudo;
        echo 'Connected Successfully';
    }
    else {
        echo 'Undefined User';
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