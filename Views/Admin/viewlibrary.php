<?php ob_start(); ?>
<div class="container">
    <h1 class=" text-uppercase text-primary text-center">
        <?= $librairie->title ?>
    </h1>
    <div class="row">
        <div class="col-5 d-flex" style="object-fit: contain;">
            <img src="../../Library/<?= $librairie->picture ?>" class="rounded-circle" width="300px" height="300px" />
        </div>
        <div class="col-5"></div>
    </div>
</div>
<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php";
?>