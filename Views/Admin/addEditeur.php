<?php ob_start(); ?>
<div class="container-fluid">
    <h1 class="text-center text-primary text-uppercase">
        ajout d'éditeur
    </h1>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title" class="form-label text-uppercase">titre : </label>
            <input type="text" name="title" id="tile" class="form-control">
            <label for="logo" class="form-label text-uppercase mt-2">Médias :</label>
            <input type="file" name="logo" id="logo" class="form-control">
            <input type="submit" value="envoyer" class="btn btn-primary mt-3">
        </form>
    </div>


</div>


<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php"; ?>