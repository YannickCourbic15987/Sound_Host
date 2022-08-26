<?php ob_start(); ?>
<h3 class="text-warning text-center mb-2 mt-5">
    Ajout de sujet
</h3>
<div class="container">

    <form action="" method="post" class="form-group">
        <label for="title" class="form-label">Titre du sujet </label>
        <input type="text" name="title" id="title" class="form-control">
        <select name="category" id="category" class="form-select mt-2" aria-label="Default select example">
            <option selected>
                Catégorie
            </option>
            <option value="1">html</option>
            <option value="2">css</option>
            <option value="3">javascript</option>
            <option value="4">php</option>

        </select>
        <button type="submit" class="btn btn-primary mt-2">
            ajouter
        </button>
    </form>
</div>
<?php $content = ob_get_clean();
require_once ROOT . "/Views/template.php";
?>