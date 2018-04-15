<?php ob_start(); ?>
<?php include('adminView.php'); ?>

<div class="contentPage">
    <div id="descriptionOngletAdminArea">
        <h2>Mes articles</h2>
        <p> ... </p>
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
                    <td><?php echo($article['date']); ?></td>
                    <td><a href="index?page=admin&modifierArticle=<?php echo($article['id']);?>">Modifier cet article</a></td>
                    <td><form method="post" action='index.php'><input type="hidden" name="deleteArticle" value="<?php echo($article['id']); ?>"><input type="submit" class="submit" value="X"></form></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div id="ajouterArticle"><a href="index?page=admin&onglet=nouvelArticle">Créer un article</a></div>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>