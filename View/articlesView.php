
<?php ob_start(); ?>
<?php foreach($articles as $article) : ?>
    <div class="articleAccueil">
        <h2 class="titreArticle"><a href="index.php?article=<?= $article['id'] ?>"><?= $article['titre'] ?> </a></h2>
        <p><?= $article['contenu'] ?></p>
        <p><?= $article['date'] ?></p>
    </div>
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>
