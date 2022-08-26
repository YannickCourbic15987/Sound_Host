<?php ob_start(); ?>

<h2 class="text-info text-center">Inscription</h2>
<?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error'] ?>
    </div>
<?php endif ?>
<?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['success']  ?>
        <a href="<?= HEADER ?>sign" class="text-success"> connectez-vous </a>
    </div>
<?php endif ?>
<div class="container">
    <form action="" method="post" class="form-group">
        <label for="firstname" class="form-label"> nom</label>
        <input type="text" name="firstname" id="firstname" class="form-control mt-2" required>
        <label for="lastname" class="form-label">prénoms</label>
        <input type="text" name="lastname" id="lastname" class="form-control mt-2" required>
        <label for="email"> email</label>
        <input type="email" name="email" id="email" class="form-control mt-2" required>
        <label for="password">password</label>
        <input type="password" name="password" id="password" class="form-control mt-2" required>
        <label for="password_confirm">password à confirmer</label>
        <input type="password" name="password_confirm" id="password_confirm" class="form-control mt-2" required>
        <button type="submit" class="btn btn-primary outline mt-2">
            envoyer
        </button>
    </form>

</div>



























<?php $content = ob_get_clean();
require_once ROOT . "./Views/template.php";
?>