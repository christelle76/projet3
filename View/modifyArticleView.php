<?php ob_start(); ?>
<?php include('adminView.php'); ?>

<div class="contentPage">
    <?php foreach($articles as $article) : ?>
        <form method="post" action='index.php'>
            <input type="text" name="titleNewArticle" value=""<?php echo $article['article_titre'];?>"">
            <textarea name="contentNewArticle"><?php echo $article['article_contenu'];?></textarea>
            <input type="submit" class="submit" name="editerArticle" value="Mettre à jour cet article">
        </form>
    <?php endforeach; ?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>