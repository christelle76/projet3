<?php ob_start(); ?>
<?php include('adminView.php'); ?>

<div class="contentPage">
    <?php foreach($articles as $article) : ?>
        <form method="post" action="index.php?page=admin&modifierArticle=<?php echo $_GET['modifierArticle'];?>">
            <input id="titreModifierArticle" type="text" name="titleModifyArticle" value="<?php echo $article['article_titre'];?>">
            <input type="hidden" id="modifierArticle" name="modifierArticle" value="<?php echo $article['article_id'];?>">
            <textarea name="contentModifyArticle"><?php echo $article['article_contenu'];?></textarea>            
            <input type="submit" class="submit" name="editerArticle" value="Mettre à jour cet article"> 
        </form>
    <?php endforeach; ?>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'HomeTemplate.php'; ?>