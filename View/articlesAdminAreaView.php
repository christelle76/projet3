<?php ob_start(); ?>
<?php include('adminView.php'); ?>

<div class="contentPage">
    <div id="descriptionOngletAdminArea">
        <h2>Mes articles</h2>
        <p> Vous pouvez modifier, supprimer ou ajouter des articles à votre guise sur cette page. </p>
    </div>

    <div id="tableauArticlesAdminArea">
        <table>
            <tr> 
                <td class="titreColonne" class="colonneTitreArticle">Titre de l'article</td>
                <td class="titreColonne" class="colonneDateArticle">Posté le :</td>
                <td class="titreColonne" class="colonneModifierArticle">Modifier cet article</td>
                <td class="titreColonne" class="colonneSupprimerArticle">Supprimer cet article</td>
            </tr>
            <?php foreach($articles as $article) : ?>
                <tr>
                    <td class="colonneTitreArticle"><?php echo($article['titre']); ?></td>
                    <td class="colonneDateArticle"><?php $date = date_create($article['date']); echo date_format($date,'d-m-Y \à H:i:s');?></td>
                    <td class="colonneModifierArticle"><a class="submit" href="index.php?page=admin&modifierArticle=<?php echo($article['id']);?>">Modifier cet article</a></td>
                    <td class="colonneDeleteArticle"><form method="post" action="index.php?page=admin&modifierArticle=<?php echo($article['id']);?>"><input type="hidden" name="deleteArticle" value="<?php echo($article['id']); ?>"><input type="submit" class="submit" value="✘"></form></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div id="ajouterArticle"><a href="index.php?page=admin&onglet=nouvelArticle">Créer un article</a></div>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>