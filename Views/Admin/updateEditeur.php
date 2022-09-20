<?php ob_start(); ?>

<?php if (!isset($_SESSION['updateTitle'])) : ?>
    <div class="container d-flex justify-content-center gap-4">
        <h3 class="text-primary text-uppercase text-center">éditeur : <span class="text-dark"><?= $editeur->title ?></span></h3>
        <form action="" method="post" class="form-group">
            <input type="hidden" name="updateTitle" id="updateTitle" value="updateTitle">
            <button type="submit" class="btn border border-white">
                <i class="fa-solid fa-pen fs-1 text-warning"></i>
            </button>
        </form>
    </div>
<?php else : ?>
    <div class="container">
        <form action="" method="post" class="form-group d-flex">
            <input type="text" name="title" id="title" class="form-control" value="<?= $editeur->title ?>">
            <button type="submit" class="btn border border-white">
                <i class="fa-solid fa-check fs-1 text-success"></i>
            </button>
        </form>

    </div>
<?php endif ?>

<?php if (!isset($_SESSION['updateLogo'])) : ?>
    <div class="container d-flex justify-content-center align-items-center gap-4 mt-5">
        <img src="../../Editeur/<?= $editeur->logo ?>" width="200px" height="200px" class="rounded-circle">
        <form action="" method="post" class="form-group">
            <input type="hidden" name="updateLogo" id="updateLogo" value="updateLogo">
            <button type="submit" class="btn border border-white">
                <i class="fa-solid fa-pen fs-1 text-warning"></i>
            </button>
        </form>
    </div>
<?php else : ?>
    <div class="container">
        <form action="" method="post" class="form-group d-flex mt-5" enctype="multipart/form-data">
            <input type="file" name="logo" id="logo" class="form-control" value="<?= $editeur->title ?>">
            <button type="submit" class="btn border border-white">
                <i class="fa-solid fa-check fs-1 text-success"></i>
            </button>
        </form>
    </div>


<?php endif ?>

</div>



<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php"; ?>