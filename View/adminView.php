<div id="adminArea">
    <?php echo /*$_SESSION['id'] . */" bonjour !"; ?>
</div>

<div id="adminNavigation">
    <div class="buttonNavigation"><a href="index?page=admin&onglet=articles.php">Articles</a></div>
    <div class="buttonNavigation"><a href="index?page=admin&onglet=commentaires.php">Commentaires</a></div>
</div>

<div id="contenuAdminArea">
    <?= $contenuAdminArea; ?>
</div> 


<?php require 'HomeTemplate.php'; ?>