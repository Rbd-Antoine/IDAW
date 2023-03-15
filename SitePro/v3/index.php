<?php
  require_once('template_header.php');
  require_once('template_menu.php');

  $currentPageId = 'accueil';
  $currentLang = 'fr';
  if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
  }
  if(isset($_GET['LANG'])) {
    $currentLang = $_GET['LANG'];
  }


  renderMenuToHTML( $currentPageId, $currentLang);


  $pageToInclude = $currentPageId . '_' . $currentLang . '.php';
  if(is_readable($pageToInclude))
    require_once($pageToInclude);
  else
    require_once("error.php");
?>
