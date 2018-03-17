
<?php ob_start(); ?>

<div class="loginResult">
    ...
</div>

<?php $loginResult = ob_get_clean(); ?>

<?php require 'HomeTemplate.php'; ?>