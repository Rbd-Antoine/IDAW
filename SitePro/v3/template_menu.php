<?php
    function renderMenuToHTML($currentPageId) {
        $mymenu = array(
            // idPage titre
            'index' => array( 'Accueil' ),
            'cv' => array( 'Cv' ),
            'projets' => array('Mes Projets'),
        );

        foreach($mymenu as $pageId => $pageParameters) {
            $pageTitre = $pageParameters[0];
            $class = '';
            if ($currentPageId === $pageId) {
                $class = ' class="active"';
            }
            echo '<a href="' . $pageId . '.php"' . $class . '>' . $pageTitre . '</a>';
        }
    }
?>

<nav data-toggled="false" data-transitionable="false">
  <div id="nav-logo-section" class="nav-section">
    <a href="index.php">
      <i class="fa-solid fa-dumpster-fire"></i>
    </a>
    <div id="nom-du-site" class="nom-site">
      <a>
        RIBEAUD ANTOINE 
      </a>
    </div>
  </div>
  <div id="nav-mobile-section">
    <div id="nav-link-section" class="nav-section">
      <a href="projets.php">MES PROJETS</a>
      <a href="cv.php">CV</a>
      <a href="index.php">ACCUEIL</a>
    </div>
    <div id="nav-social-section" class="nav-section">
      <a href="#">
        <i class="fa-brands fa-twitter"></i>
      </a>
      <a href="#" target="_blank">
        <i class="fa-brands fa-instagram"></i>
      </a>    
      <a href="#">
        <i class="fa-brands fa-linkedin"></i>
      </a>
    </div>
    <div id="nav-contact-section" class="nav-section">
      <div class="open-btn">
        <button class="open-button" onclick="openForm()"><strong>Contactez-moi</strong></button>
      </div>
      <div class="login-popup">
        <div class="form-popup" id="popupForm">
          <form action="/action_page.php" class="form-container">
            <h2>Veuillez vous connecter</h2>
            <label for="email">
              <strong>E-mail</strong>
            </label>
            <input type="text" id="email" placeholder="Votre Email" name="email" required />
            <label for="psw">
              <strong>Mot de passe</strong>
            </label>
            <input type="password" id="psw" placeholder="Votre Mot de passe" name="psw" required />
            <button type="submit" class="btn">Connecter</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <button id="nav-toggle-button" type="button" onclick="handleNavToggle()">
    <span>Menu</span>
    <i class="fa-solid fa-bars"></i>
  </button>
</nav>