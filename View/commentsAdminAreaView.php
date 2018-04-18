<?php ob_start(); ?>
<?php include('adminView.php'); ?>

<div class="contentPage">
    <div id="descriptionOngletAdminArea">
        <h2>Mes commentaires</h2>
        <p>Vous pouvez administrer les commentaires affichés sur votre site. Par défaut, ceux-ci sont affichés par ordre décroissant en fonction du nombre de report. 
        La validation d'un commentaire réinitialisera à zero le nombre de report et la suppression le supprimer définitivement. </p>
    </div>

    <div id="tableauArticlesAdminArea">
        <table>
            <tr> 
                <td class="titreColonne">Auteur</td>
                <td class="titreColonne">Contenu</td>
                <td class="titreColonne">Nb. de report</td>
                <td class="titreColonne">Valider ce commentaire</td>
                <td class="titreColonne">Supprimer ce commentaire</td>
            </tr>
            <?php foreach($comments as $comment) : ?>
                <tr>
                    <td class="colonneAuteur"><?php echo $comment['auteur'];?></td>
                    <td class="colonneCommentaire"><?php echo $comment['message'];?></td>
                    <td class="colonneReport"><?php echo $comment['report'];?></td>
                    <td class="colonneValiderCommentaire"><form method="post" action="index.php?page=admin&onglet=commentaires"><input type="hidden" name="commentIdValidate" value="<?= $comment['id']; ?>"><input type="submit" class="submit" value="✓"></form></td>
                    <td class="colonneSupprimerCommentaire"><form method="post" action="index.php?page=admin&onglet=commentaires"><input type="hidden" name="commentIdDelete" value="<?= $comment['id']; ?>"><input type="submit" class="submit" value="✘"></form></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>