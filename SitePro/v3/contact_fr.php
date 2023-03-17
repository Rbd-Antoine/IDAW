<?php
 require_once('template_header.php');
?>
<body>
<main>
<article data-status="active">    
    <div class="article-description-section article-section">
      <p>
        Vous voulez me contacter  ?
      </p>
    </div>
    <div class="article-title-section article-section">
      <h2>Contact  </h2>
    
      <i class="fa-solid fa-plus-large"></i>
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
  </article>
</main>
</body>