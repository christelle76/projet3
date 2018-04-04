<?php ob_start(); ?>
<div id="descriptionOngletAdminArea">
    <h2>Mes articles</h2>
    <p> ... </p>
</div>

<div id="tableauArticlesAdminArea">
    <table>
        <tr> 
            <td>Titre de l'article</td>
            <td>Posté le</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>
        <?php foreach($articles as $article) : ?>
            <tr>
                <td><?php $article['titre'];?></td>
                <td><?php $article['date'];?></td>
                <td><a href="index?page=admin;onglet=article<?php $article['id'];?>.php">Modifier cet article</a></td>
                <td><form method="post" action='index.php'><input type="hidden" name="deleteArticle" value="<?= $article['id'] ?>"><input type="submit" class="Supprimer" value="Supprimer ce commentaire"></form></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div id="CreerArticle"><a href="index?page=admin&onglet=nouvelArticle.php">Créer un article</a></div>
</div>

<?php $contenuAdminArea = ob_get_clean(); ?>

<?php require_once('adminView.php'); ?>