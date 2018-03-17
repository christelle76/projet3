
<?php ob_start(); ?>

<div class="articleAccueil">
    <h2 class="titreArticle"><?= $article['titre'] ?></h2>
    <p><?= $article['contenu'] ?></p>
    <p><?= $article['date'] ?></p>
</div>

<?php foreach($comments as $comment) : ?>
    <div class="article">
        <h2 class="titreArticle"><a href="index.php?article="<?= $article['id'] ?>".php"><?= $article['titre'] ?> </a></h2>
        <p><?= $comment['contenu'] ?></p>
        <p><?= $comment['date'] ?></p>
    </div>
<?php endforeach; ?>

<div id="addComment">
    <h3>Ajouter un commentaire:</h3>
    <form method="post" action="routeur.php"> 
        <label for "pseudo"><b>Auteur :</b></label> <input type="text" id="auteur" name="auteur"/>
        <label for "password"><b>Message :</b></label> <input type="text" id="message" name="message"/>
        <button type="submit"><b>Envoyer</b></button>
    </form>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>
