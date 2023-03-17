<?php
session_start();
// Supprimer toutes les variables de session
session_unset();
// Détruire la session en cours
session_destroy();
// Rediriger l'utilisateur vers la page de connexion
header("Location: login.php");
exit;
?>
