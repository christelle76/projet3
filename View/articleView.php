
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
                <p><b>Publié par <?= $comment['author'] ?> le <?= $comment['date'] ?><form method="post" action="index.php?article=<?=$_GET["article"];?>"><input type="hidden" name="commentId" value="<?= $comment['id'] ?>"><input type="submit" class="submit" value="Signaler ce commentaire"></form>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="addComment">
        <h3>Ajouter un commentaire:</h3>
        <form method="post" action="index.php?article=<?=$_GET["article"];?>"> 
            <label for "auteur"><b>Auteur :</b></label> <input type="text" name="auteur"/>
            <label for "message"><b>Message :</b></label> <input type="text" name="message"/>
            <input type="hidden" name="articleId" value="<?= $_GET["article"]; ?>">
            <input type="submit" class="submit" value="Envoyer">
        </form>
    </div>
<div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>
