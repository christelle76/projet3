<?php ob_start(); ?>
<div id="erreur" class="contentPage">
    <p>Oops, cette page n'existe pas.</p>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>