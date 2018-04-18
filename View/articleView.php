
<?php ob_start(); ?>
<div id="articleContent">
       
        <div class="articlePage">
        <?php foreach($articles as $article) : ?>
            <h2 class="titreArticle"><?= $article['article_titre']; ?></h2>
            <p><?= $article['article_contenu']; ?></p>
            <p class="dateArticle">Posté le <?php $datearticle = date_create($article['article_date']); echo date_format($datearticle,'d-m-Y \à H:i:s');?></p>
        <?php endforeach; ?>
        </div>
    

    <div id="commentContent">
        <?php foreach($comments as $comment) : ?>
        <table class="comments">
            <tr>
                <td class="avatarComment"></td>
                <td class="contentComment">
                    <p><b>Publié par <?= $comment['author'] ?> - Le <?php $date = date_create($comment['date']); echo date_format($date,'d-m-Y \à H:i:s');?></b></p>
                    <p><?= $comment['message'] ?></p>
                    <div class="submitSignaler"><form method="post" action="index.php?article=<?=$_GET["article"];?>"><input type="hidden" name="commentId" value="<?= $comment['id'] ?>"><input type="submit" class="submit" value="Signaler ce commentaire"></form></div>
                </td>
            </tr>
        </table>
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
