<?php
    function renderMenuToHTML($currentPageId) {
        $mymenu = array(
            // idPage titre
            'INDEX' => array( 'Accueil' ),
            'CV' => array( 'Cv' ),
            'PROJETS' => array('Mes Projets'),
            'CONTACT' => array('Contact')
        );
        echo '<nav data-toggled="false" data-transitionable="false">
        <div id="nav-logo-section" class="nav-section">
          <a href="index.php?page=Accueil">
            <i class="fa-solid fa-dumpster-fire"></i>
          </a>
          <div id="nom-du-site" class="nom-site">
            <a href ="index.php?page=Accueil">
              RIBEAUD ANTOINE 
            </a>
          </div>
        </div>
        <div id="nav-mobile-section">';

        foreach($mymenu as $pageId => $pageParameters) {
            if ($pageId == 'INDEX') {
               echo' 
                  <div id="nav-link-section" class="nav-section">
                    <a href="index.php?page=Accueil">' . $pageId . '</a>
                  </div>';
            }
            else {
                echo '<div id="nav-link-section" class="nav-section">
                    <a href="index.php?page=' . $pageId . '">' . $pageId . '</a>
                  </div>';
            }
            
            }
            echo'
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
          </div>
          <button id="nav-toggle-button" type="button" onclick="handleNavToggle()">
            <span>Menu</span>
            <i class="fa-solid fa-bars"></i>
          </button>
        </nav>';
    }
?>