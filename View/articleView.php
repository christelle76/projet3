
<?php ob_start(); ?>
<div id="articleContent">
       
        <div class="articlePage">
        <?php foreach($articles as $article) : ?>
            <h2 class="titreArticle"><?= $article['article_titre']; ?></h2>
            <p><?= $article['article_contenu']; ?></p>
            <p class="dateArticle">Posté le <?= $article['article_date']; ?></p>
        <?php endforeach; ?>
        </div>
    

    <div id="commentContent">
        <?php foreach($comments as $comment) : ?>
            <div class="comments">
                <p><?= $comment['message'] ?></p>
                <p><b>Publié par <?= $comment['author'] ?> le <?= $comment['date'] ?> <span class="signaler"><form method="post" action='index.php'><input type="hidden" name="commentId" value="<?= $comment['id'] ?>"><input type="submit" class="signaler" value="Signalez ce commentaire"></form></span></b></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="addComment">
        <h3>Ajouter un commentaire:</h3>
        <form method="post" action="index.php"> 
            <label for "pseudo"><b>Auteur :</b></label> <input type="text" id="auteur" name="auteur"/>
            <label for "password"><b>Message :</b></label> <input type="text" id="message" name="message"/>
            <input type="hidden" name="articleId" value="<?= $_GET["article"]; ?>">
            <button type="submit"><b>Envoyer</b></button>
        </form>
    </div>
<div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>
