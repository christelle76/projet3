<div id="adminArea">
    <?php echo "Bonjour, " . $_SESSION['id'] . " !"; ?>
</div>

<div id="adminNavigation">
    <div class="buttonNavigation"><a href="index?page=admin&onglet=articles">Gérer mes articles</a></div>
    <div class="buttonNavigation"><a href="index?page=admin&onglet=commentaires">Gérer mes commentaires</a></div>
</div>
