<?php ob_start(); ?>
<div class="container">
    <?php if (!isset($_SESSION['update'])) : ?>
        <h1 class=" text-uppercase text-primary text-center mb-5">
            <?= $librairie->title ?>
        </h1>
        <div class="row">
            <div class="col-5 d-flex " style="object-fit: contain;">
                <img src="../../Library/<?= $librairie->picture ?>" class="rounded-circle" width="300px" height="300px" />
            </div>
            <div class="col-5">
                <div class="container">

                    <h2 class="text-warning text-uppercase">
                        catégorie : <span class="text-info "> <?= $categorie->title ?></span>
                    </h2>
                    <h3 class="text-primary text-uppercase">
                        éditeur : <span class="text-info"> <?= $edit->title ?> </span>
                    </h3>

                    <p>
                        Publication : <?= $librairie->publication ?>
                    </p>
                    <p class="my-5">
                        <?= $librairie->description ?>
                    </p>
                    <p class="fs-5">
                        Prix : <?= $librairie->price ?> €
                    </p>



                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="d-flex justify-content-center">
            <h2 class="text-uppercase text-warning">Modification de Livre</h2>
        </div>
        <form action="" method="post" class="form-group mt-2 container-fluid " enctype="multipart/form-data">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            <label for="picture" class="form-label">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control">
            <label for="publication" class="form-label">Release Date </label>
            <input type="date" name="publication" id="publication" class="form-control mb-3">
            <select name="category" id="category" class="form-control mb-3">
                <option selected>
                    Catégorie
                </option>
                <?php foreach ($categories as $champ => $categorie) : ?>

                    <option value="<?= $categorie->id ?>"><?= $categorie->title ?></option>
                <?php endforeach ?>
            </select>
            <select name="editeur" id="editeur" class="form-control mb-3">
                <option selected>
                    Editeur
                </option>
                <?php foreach ($editeurs as $champ => $editeur) : ?>

                    <option value="<?= $editeur->id ?>"><?= $editeur->title ?></option>
                <?php endforeach ?>
            </select>
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" class="form-control">
            <input type="submit" value="envoyer" class="btn btn-primary mt-2">
        </form>
    <?php endif ?>
</div>
<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php";
?>