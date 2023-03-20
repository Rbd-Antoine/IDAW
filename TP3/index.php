<?php
if(isset($_GET['css'])) { //est ce que css a été envoyé ? 
  $style = $_GET['css']; // récupère la valeur de css
  setcookie('css', $style, time() + 3600, '/'); // set cookie  qui expirera dans 3600 secondes
}
?>
<?php
// Lire l'identifiant CSS dans les cookies
$style = isset($_COOKIE['css']) ? $_COOKIE['css'] : 'style1';

// Générer le code de la balise link avec le bon fichier CSS
echo '<link rel="stylesheet" type="text/css" href="' . $style . '.css">';
?>

<?php
session_start();
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  echo "<h1> Bonjour, $username ! </h1>";
  echo "<br><a href='logout.php'>Déconnexion</a>";
} 
else {
  echo "Vous n'êtes pas connecté.";
}
?>