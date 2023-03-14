<?php
require_once('template_header.php');
?>
<body>
<nav data-toggled="false" data-transitionable="false">
  <div id="nav-logo-section" class="nav-section">
    <a href="#">
      <i class="fa-solid fa-dumpster-fire"></i>
    </a>
    <div id="nom-du-site" class="nom-site">
      <a>
        E-NEBULA 
      </a>
    </div>
  </div>
  <div id="nav-mobile-section">
    <?php
      require_once('template_menu.php');
    ?>
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
        <button class="open-button" onclick="openForm()"><strong>Contactez-nous</strong></button>
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

<main>
  <article data-index="0" data-status="active">
    <div class="article-image-section article-section"></div>
    <div class="article-description-section article-section">
      <p>
        <a class="source-link" href="" target="_blank"></a>
        <a class="yt-link" href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        Découvrez notre équipe de développeurs et de designers qui travaillent pour vous.
      </p>
    </div>
    <div class="article-title-section article-section">
      <h2>Accueil</h2>
      <i class="fa-solid fa-plus-large"></i>
    </div>
    <div class="article-nav-section article-section">
      <button class="article-nav-button" type="button" onclick="handleLeftClick()">
        <i class="fa-solid fa-arrow-left-long"></i>
      </button>
      <button class="article-nav-button" type="button" onclick="handleRightClick()">
        <i class="fa-solid fa-arrow-right-long"></i>
      </button>
    </div>
  </article>
  <article data-index="1" data-status="inactive">    
    <div class="article-image-section article-section"></div>
    <div class="article-description-section article-section">
      <?php 
        require_once('template_articles.php');
      ?>
    </div>
    <div class="article-title-section article-section">
        <h2>Développement d'applications mobile</h2>
      <i class="fa-solid fa-plus-large"></i>
    </div>
    <div class="article-nav-section article-section">
      <button class="article-nav-button" type="button" onclick="handleLeftClick()">
        <i class="fa-solid fa-arrow-left-long"></i>
      </button>
      <button class="article-nav-button" type="button" onclick="handleRightClick()">
        <i class="fa-solid fa-arrow-right-long"></i>
      </button>
    </div>
  </article>
  <article data-index="2" data-status="inactive">    
    <div class="article-image-section article-section"></div>
    <div class="article-description-section article-section">
      <p>
        Nous vous accompagnons dans la réalisation de vos projets et vous proposons des solutions adaptées à vos besoins 100% personnalisées et sécurisées.
      </p>
    </div>
    <div class="article-title-section article-section">
      <h2>Sécurité garantie</h2>
      <i class="fa-solid fa-plus-large"></i>
    </div>
    <div class="article-nav-section article-section">
      <button class="article-nav-button" type="button" onclick="handleLeftClick()">
        <i class="fa-solid fa-arrow-left-long"></i>
      </button>
      <button class="article-nav-button" type="button" onclick="handleRightClick()">
        <i class="fa-solid fa-arrow-right-long"></i>
      </button>
    </div>
  </article>
  <article data-index="3" data-status="inactive">    
    <div class="article-image-section article-section"></div>
    <div class="article-description-section article-section">
      <p>
        Plongez dans l'univers de la technologie et découvrez les dernières tendances du marché grâce à notre connexion avec les plus grands acteurs du secteur.
      </p>
    </div>
    <div class="article-title-section article-section">
      <h2>Un réseau global</h2>
      <i class="fa-solid fa-plus-large"></i>
    </div>
    <div class="article-nav-section article-section">
      <button class="article-nav-button" type="button" onclick="handleLeftClick()">
        <i class="fa-solid fa-arrow-left-long"></i>
      </button>
      <button class="article-nav-button" type="button" onclick="handleRightClick()">
        <i class="fa-solid fa-arrow-right-long"></i>
      </button>
    </div>
  </article>
</main>

</body>

</html>
