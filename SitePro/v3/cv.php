<?php
require_once('template_header.php');
?>
<body>
<?php
require_once('template_menu.php');
?>
<main>

<article data-index="1">    
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
</article>
</main>
</body>
</html>