
<?php ob_start(); ?>
<div id="derniersArticles">
<?php foreach($articles as $article) : ?>
    <div class="articleAccueil">
        <i class="fas fa-quote-left"></i><h2 class="titreArticle"><a href="index.php?article=<?= $article['id']; ?>"><?= $article['titre']; ?> </a></h2>
        <p class="contenuArticleAccueil"><?= substr($article['contenu'], 0, 350) . "..." ; ?></p>
        <p class="dateArticle">Posté le <?= $article['date']; ?></p><i class="fas fa-quote-right"></i>
    </div>
<?php endforeach; ?>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>
