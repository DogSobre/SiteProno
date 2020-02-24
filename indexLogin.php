<?php

    //Init session.
session_start();

    //Check if the user is already connected and redirect him to welcome page if it's true.
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header("location: indexAccueil.php");
    exit;
}

    //Configuration file to the Database.
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
            $stmt->bindParam(":userMail", $paramUsermail, PDO::PARAM_STR);

            $paramUsermail = trim($_POST["Collab_Mail"]);
            if ($stmt->execute()){
                if ($stmt->rowCount() == 1){
                    if ($row = $stmt->fetch()){
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