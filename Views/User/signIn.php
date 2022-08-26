<?php
ob_start();
?>
<h2 class="text-info text-center">Connexion</h2>
<div class="container">

    <form action="" method="post" class="form-group">
        <label for="email" class="form-label">email</label>
        <input type="email" name="email" id="email" class="form-control">
        <label for="password" class="form-label">mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
        <button class="btn btn-primary mt-2">se connecter</button>
    </form>
</div>
<?php $content = ob_get_clean();
require_once ROOT . "./Views/template.php";
?>