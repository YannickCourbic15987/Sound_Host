<?php ob_start(); ?>

<div class="d-flex justify-content-center">
    <h2 class="text-uppercase text-warning">modification du podcast</h2>
</div>
<form action="" method="post" class="form-group mt-2 container-fluid " enctype="multipart/form-data">
    <label for="title" class="form-label">Titre du podcast</label>
    <input type="text" name="title" id="title" class="form-control" value="">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" id="image" class="form-control">
    <label for="sound" class="form-label">Sound</label>
    <input type="file" name="sound" id="sound" class="form-control">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">
    </textarea>
    <label for="releaseDate" class="form-label">Release Date </label>
    <input type="date" name="releaseDate" id="releaseDate" class="form-control">
    <input type="submit" value="envoyer" class="btn btn-primary mt-2">
</form>

<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php";
?>