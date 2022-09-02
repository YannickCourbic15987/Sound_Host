<?php ob_start(); ?>
<div class="container">
    <h1 class="text-uppercase text-primary text-center">ajout de catégory</h1>
    <form action="" method="post" class="form-group">
        <label for="title" class="form-label">titre de la catégorie</label>
        <input type="text" name="title" id="title" class="form-control mb-2" required>
        <label for="logo" class="form-label">Logo</label>
        <input type="file" name="logo" id="logo" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">
            envoyer
        </button>
    </form>
</div>

<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php";
?>