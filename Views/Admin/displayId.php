<?php ob_start(); ?>

<h2 class="text-warning text-uppercase text-center">Consultation de podcast </h2>
<div class="d-flex flex-column align-items-center">


    <p class="text-info fw-bolder mt-2 fs-2 "> ID : <span class="text-black"><?= $sound->id ?></span></p>
    <p class="text-info fw-bolder mt-2 fs-2"> TITRE: <span class="text-black"><?= $sound->title ?></span></p>
    <img src="../Image/<?= $sound->image ?>" alt="" weigth="250px" height="250px">
    <br>
    <audio src="../Audio/<?= $sound->sound ?>" controls="true"></audio>
    <p><?= $sound->description ?></p>
</div>



<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php";
?>