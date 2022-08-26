<?php ob_start(); ?>
<?php if ($_SESSION['connexion']) : ?>
    <div class="alert alert-info" role="alert">
        <?= $_SESSION['connexion'] ?>
    </div>
<?php endif ?>

<h3 class="text-info text-center">Mon Profil</h3>
<div class="row">
    <div class="col-3 mx-auto">
        <?php if (empty($profil->illustration)) : ?>
            <form action="" method="post" enctype="multipart/form-data" class="form-group">
                <label for="illustation" class="form-label">Image de Profil </label>
                <input type="file" name="illustration" id="illustration" class="form-control">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">
                    envoyer
                </button>

            </form>
        <?php endif ?>
    </div>
    <div class="col-8">
        <?php if (!empty($profil)) : ?>
            <div class="text-center">
                <img src="../Profils/<?= $profil->illustration ?>" alt="" srcset="" width="100px" height="100px" class="rounded-circle border border-2 border-dark mb-5 ">
                <h2 class="text-info mb-4">Pseudo : <span class="text-warning"> <?= $profil->pseudo ?></span></h2>
                <p class="text-info mb-4 text-uppercase">
                    votre prénom : <?= $users->firstname ?>
                </p>
                <p class="text-info mb-4 text-uppercase">
                    votre nom : <?= $users->lastname ?>
                </p>
                <h4>
                    votre email : <?= $users->email ?>
                </h4>
            </div>
        <?php endif ?>
    </div>
</div>

<?php $content = ob_get_clean();
require_once ROOT . "./Views/template.php";
?>