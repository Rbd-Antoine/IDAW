<?php
    function renderMenuToHTML($currentPageId, $currentLang) {
        $mymenu = array(
            // idPage titre
            'Accueil' => array( 'Accueil' ),
            'CV' => array( 'CV' ),
            'PROJETS' => array('MES PROJETS'),
            'CONTACT' => array('CONTACT'),
        );
        echo '<nav data-toggled="false" data-transitionable="false">
        <div id="nav-logo-section" class="nav-section">
          <a href="index.php?page=Accueil&LANG=fr">
            <i class="fa-solid fa-dumpster-fire"></i>
          </a>
          <div id="nom-du-site" class="nom-site">
            <a href ="index.php?page=Accueil&LANG=fr">
              RIBEAUD ANTOINE 
            </a>
          </div>
        </div>
        <div id="nav-mobile-section">';

        foreach($mymenu as $pageId => $pageParameters) {
            if($currentLang == 'fr') {
                $pageId = $pageId . '&LANG=fr';
            }
            else {
                $pageId = $pageId . '&LANG=' . $currentLang;
            }
            if ($pageId == 'INDEX') {
               echo' 
                  <div id="nav-link-section" class="nav-section">
                    <a href="index.php?page=Accueil&LANG=fr"></a>
                  </div>';
            }
            else {
                echo '<div id="nav-link-section" class="nav-section">
                    <a href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a>
                  </div>';
            }
            
          }
        if ($currentLang == 'fr') {
          echo '<div id="nav-link-section" class="nav-section">
                  <a href="index.php?page=Accueil&LANG=en">EN</a>
                </div>';
        }
        else {
          echo '<div id="nav-link-section" class="nav-section">
                  <a href="index.php?page=Accueil&LANG=fr">FR</a>
                </div>';
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