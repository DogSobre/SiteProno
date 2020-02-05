<?php include 'index.php';?>

<?php

if (!empty($_POST['Collab_Name']) && !empty($_POST['Collab_Password'])) {
    $username = PDO::quote($_POST['Collab_Name']);
    $password = PDO::quote($_POST['Collab_Password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $email = PDO::quote($_POST['Collab_Mail']);

    $req = $db -> prepare("SELECT * FROM Collab WHERE Collab_Name = :pseudo");
    $req -> execute(array(
        'Collab_Name' => $username));
    $result = $req -> fetch();

    $isPasswordCorrect = password_verify($_POST['Collab_Password'], $result['Collab_Password']);

    if (!$result){
        echo 'Identifiant ou mot de passe incorrect';
    }
    else{
        if ($isPasswordCorrect){
            session_start();
            $_SESSION['idCollab'] = $result['idCollab'];
            $_SESSION['Collab_Name'] = $username;
            echo 'Bienvenue';
        }
        else{
            echo 'Identifiant ou mot de passe incorrect';
        }
    }
}

/*
if (!empty($_POST['Collab_Name']) && !empty($_POST['Collab_Password'])) {
    $username = PDO::quote($_POST['Collab_Name']);
    $password = PDO::quote($_POST['Collab_Password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $email = PDO::quote($_POST['Collab_Mail']);

    $isUsername = PDO::query("SELECT * FROM Collab WHERE Collab_Name = '" . $username . "'");
    $isPasswordCorrect = password_verify($password, $hashedPassword);

    if ($isPasswordCorrect == true && $isUsername == true) {
        //header('Location : indexAccuueil.html');
        echo('Bienvenue');
    } else {
        echo('Utilisateur ou Mot De Passe incorrect');
    }
}
*/
?>
<!DOCTYPE>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Pronostic CSE</title>
    <link rel="icon" href="assets/images/MPlogo.png" />
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
                                <input type="email" name="userMail" placeholder="collaborateur@carrefour.com" value="<?php if (isset($_POST['Collab_Mail'])) echo htmlentities(trim($_POST['Collab_Mail'])); ?>" required >
                            </td>
                        </tr>
                        <tr>
                            <td>Mot de Passe :</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="userPassword" placeholder="**********" value="<?php if (isset($_POST['Collab_Password'])) echo htmlentities(trim($_POST['Collab_Password']))?>" required >

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="check" placeholder="Ok" value="OK" onclick="document.location.href='indexAccueil.php'">
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