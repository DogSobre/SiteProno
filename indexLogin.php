<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header("location : indexAccueil.php");
    exit;
}

require_once "index.php";

$userMail = $password = "";
$userMailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == $_POST){
    if (empty(trim($_POST["Collab_Mail"]))){
        $userMailErr = "Please enter email";
    }
    else{
        $userMail = trim($_POST["Collab_Mail"]);
    }

    if (empty($userMailErr) && empty($passwordErr)){
        $sql = "SELECT * FROM Collab WHERE Collab_Mail = :userMail";

        if ($stmt = $db -> prepare($sql)){
            $stmt -> bindParam(":userMail", $paramUsermail, PDO::PARAM_STR);

            $paramUsermail = trim($_POST["Collab_Mail"]);
            if ($stmt -> execute()){
                if ($stmt -> rowCount() == 1){
                    if ($row = $stmt -> fetch()){
                        $id = $row["idCollab"];
                        $userMail = $row["Collab_Mail"];
                        $hashedPassword = $row["Collab_Password"];
                        if (password_verify($password, $hashedPassword)){

                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["idCollab"] = $id;
                            $_SESSION["Collab_Mail"] = $userMail;
                            header("location = indexAccueil.php");

                        }
                        else{
                            $passwordErr = "Unvalid Password";
                        }
                    }
                }
                else{
                    $userMailErr = "Unvalid eMail";
                }
            }
            else{
                echo "Something went wrong. Please try again.";
            }
        }
        unset($stmt);
    }
    unset($db);
}


/*

$login = $_POST['Collab_Mail'];
$password = $_POST['Collab_Password'];


if (isset($_POST['submit'])){
    if (!empty($_POST['Collab_Mail']) && !empty($_POST['Collab_Password'])){
        $username = PDO::quote($db, $_POST['Collab_Name']);
        $password = PDO::quote($db, $_POST['Collab_Password']);
        $mail = PDO::quote($db, $_POST['Collab_Mail']);

        $isCorrect = PDOStatement::query($db , 'SELECT * FROM Collab WHERE Collab_Mail = "$mail" AND Collab_Password = "$password"');

        $nbRows = PDOStatement::rowCount($isCorrect);
        if ($nbRows > 0){
        else{
            echo 'Wrong login/password';
        }
    }
    else{
        echo 'Please complete all boxes';
    }
}
*/

/*
if (isset($_POST['Collab_Mail']) && isset($_POST['Collab_Password'])){

    if($login == $_POST['Collab_Mail'] && $password == $_POST['Collab_Password']){

        session_start();

        $_SESSION['Collab_Mail'] = $_POST['Collab_Mail'];
        $_SESSION['Collab_Password'] = $_POST['Collab_Password'];

        header('location : indexAccueil.php');
    }
    else{
        echo '<body onload="alert(\'Membre non reconnu\'">';
        echo '<meta http-equiv="refresh">';
    }
}
else{
    //echo '<body onload="alert(\'Veuillez renseigner les champs de connexion\'">';
}

*/

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
                                <input type="email" name="userMail" placeholder="collaborateur@carrefour.com" value="<?php echo $userMail; ?>" required >
                            </td>
                        </tr>
                        <tr>
                            <td>Mot de Passe :</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="userPassword" placeholder="**********" required >

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="check" value="OK">
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