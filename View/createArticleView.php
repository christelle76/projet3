<?php ob_start(); ?>
<?php include('adminView.php'); ?>

<div class="contentPage">
    <form method="post" action='index.php'>
        <input type="text" name="titleNewArticle" placeholder="Titre de l'article" id="titleNewArticle">
        <textarea name="contentNewArticle">Ecrivez votre article...</textarea>
        <input type="submit" class="submit" name="newArticle" value="Ajouter cet article">
    </form>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>