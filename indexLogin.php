<?php
session_start();
include 'index.php';



/*if (isset($_POST["login"]) && $_POST["login"] == "Ok"){
    if((isset($_POST["login"]) && $_POST["login"]) && (isset($_POST["pass"]) && $_POST["pass"])){

    // Prepare SQL request.
        $sql = 'SELECT * FROM Collab WHERE Collab_Name="'.PDO::quote($_POST["login"]).'" AND Collab_Password="'.PDO::quote($_POST["pass"]).'"';
        $req = PDO::query($sql) or die ("Error ! <br/>".$sql."<br/>".PDO::errorInfo());
        $data = PDOStatement::fetch($req);

        PDOStatement::closeCursor($req);
        $db = null; // Close the connection to the Database.

    // If we have a reply, the user is correct and he is redirected to the next page.
        if ($data[0] == 1){
            $_SESSION["Collab_Name"] = $_POST["Collab_Name"];
            $_SESSION["Collab_Password"] = $_POST["Collab_Password"];
            header("Location: indexAccueil.php");
            echo('hello world');
            exit();
        }

    // If we don't have any reply, the user did mistakes in the login or in the password.
        else if ($data[0] == 0){
            $err = "Account was not found";
            echo($err);
        }
        else{
            $err = "Error in Database. Many accounts have the same login connection";
            echo($err);
        }
    }
    else{
        $err = "One of the fields is empty";
        echo($err);
    }
}*/


if (!empty($_POST["login"]) && !empty($_POST["password"])){

    /*$sql = "SELECT * FROM Collab WHERE Collab_Name ='".PDO::quote["login"]."' AND Collab_Password='".PDO::quote["password"]."'";
    $req = PDO::query($sql) or die();
    $data = PDOStatement::fetch($req);*/


    $sql = "SELECT * FROM Collab WHERE Collab_Name ='".PDO::quote["login"]."' AND Collab_Password='".PDO::quote["password"]."'";
    $req = PDO::query($sql) or die();
    $data = PDOStatement::fetch($req);

    $login = $_POST['Collab_Name'];
    $password = $_POST['Collab_Password'];

    $_SESSION["Collab_Name"] = $login;
    //$_SESSION["Collab_Name"] = $_POST["login"];
    //$login = $_SESSION['Collab_Name'];
    $_SESSION["Collab_Password"] = $password;
    //$_SESSION["Collab_Password"] = $_POST["password"];
    //$password = $_SESSION['Collab_Password'];


    if ($data[0] == 0){
        $_SESSION[$login];
        $_SESSION[$password];
        header("Location: indexAccueil.php");
    }
    elseif ($data[0]== 1){
        $err = "Identifiant/Mot de passe, combinaison incorrecte";
        echo $err;
    }
}
else{
    echo "Un des champs est vide";
}


/*/

if (isset($_POST["Collab_Name"]) && $_POST["Collab_Name"] == "Collab_Name"){
    if (empty($_POST["login"]) || empty($_POST["login"])){
        echo 'Un des champs est vide';
    }
    else if (!empty($_POST["login"]) && !empty($_POST["login"])){
        $sql = 'SELECT * FROM Collab WHERE Collab_Name="'.PDO::quote($_POST["login"]).'" AND Collab_Password="'.PDO::quote($_POST["pass"]).'"';
        $req = PDO::query($sql) or die ("Error ! <br/>".$sql."<br/>".PDO::errorInfo());
        $data = PDOStatement::fetch($req);


        if ($data[0] == 1){
            $_SESSION['Collab_Name'] = $_POST['Collab_Name'];
            $_SESSION['Collab_Password'] = $_POST['Collab_Password'];
            echo"Connection au serveur";
            header("Location: indexAccueil.php");
            exit();
        }
        else if ($data[0] == 0){
            echo "Une erreur c\'est produite, veuillez réessayer";
        }

        PDOStatement::closeCursor($req);
        $db = null;
    }
    else{
        echo "Une erreur c'est produite, veuillez réessayer";
    }

}*/
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
        <form action="indexLogin.php" method="post">
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
                                <input type="text" name="login" value="<?php if (!empty($login)) echo htmlentities(trim($login)); ?>" placeholder="collaborateur@carrefour.com"  >
                            </td>
                        </tr>
                        <tr>
                            <td>Mot de Passe :</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="pass" value="<?php if (!empty($password)) echo htmlentities(trim($password)); ?>" placeholder="********"  >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="connection" value="Ok" >
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