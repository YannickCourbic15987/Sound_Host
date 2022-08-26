<?php ob_start(); ?>

<div class="container mt-5">
    <h1 class="text-warning text-center text-uppercase"><?= $detail->title ?></h1>
</div>
<div class="container" style=" display:flex; justify-content: space-between">
    <p>Catégorie : <span class="text-primary"><?= $detail->category ?></span></p>
    <p>Date de création : <span class="text-primary"> <?= $detail->created_at ?> </span></p>
</div>
<div class="container">
    <?php foreach ($message as $champs => $messages) : ?>
        <div class="container bg-warning rounded">
            <div class="d-flex align-items-center">
                <img src="../../Profils/<?= $messages->illustration ?>" alt="" class="rounded-circle border border-dark" width="50px" height="50px">
                <p class="text-white mt-3 mx-2"> <?= $messages->pseudo ?></p>
            </div>
            <p class="text-white text-center py-2">
                <?= $messages->text ?>
            </p>
        </div>
    <?php endforeach ?>
</div>

<?php if (isset($_SESSION['connexion'])) : ?>
    <div class="container rounded static-bottom " style="margin-bottom:5rem;">
        <form action="" method="post" class="form-group">
            <textarea name="message" id="message" cols="10" rows="5" class="form-control">

        </textarea>
            <button type="submit" class="btn btn-primary mt-2">
                envoyer
            </button>
        </form>
    </div>
<?php endif ?>
<?php $content = ob_get_clean();
require_once ROOT . '/Views/template.php';
?>