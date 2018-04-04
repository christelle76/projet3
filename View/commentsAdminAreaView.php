<?php ob_start(); ?>
<div id="descriptionOngletAdminArea">
    <h2>Mes commentaires</h2>
    <p> ... </p>
</div>

<div id="tableauArticlesAdminArea">
    <table>
        <tr> 
            <td>Auteur</td>
            <td>Contenu</td>
            <td>Nb de report</td>
            <td>Valider</td>
            <td>Supprimer</td>
        </tr>
        <?php foreach($comments as $comment) : ?>
            <tr>
                <td><?php $comment['auteur'];?></td>
                <td><?php $comment['message'];?></td>
                <td><?php $comment['report'];?></td>
                <td><form method="post" action='index.php'><input type="hidden" name="commentId" value="<?= $comment['id'] ?>"><input type="submit" class="Valider" value="Valider ce commentaire"></form>?></td>
                <td><form method="post" action='index.php'><input type="hidden" name="commentId" value="<?= $comment['id'] ?>"><input type="submit" class="Supprimer" value="Supprimer ce commentaire"></form>?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</div>
<?php $contenuAdminArea = ob_get_clean(); ?>

<?php require 'adminView.php'; ?>