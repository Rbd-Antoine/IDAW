<?php
    // on simule une base de données
    $users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'maitrejedi' );
    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            session_start();
            $login = $tryLogin;
            $_SESSION['username'] = $login;
            // Rediriger l'utilisateur vers la page d'accueil
            header("Location: index.php");
        } 
        else
            $errorText = "Erreur de login/password";
    } 
    else
        $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
        echo $errorText;
    } 
    else {
        echo "<h1>Bienvenue ".$login."</h1>";
    }
?>

