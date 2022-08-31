<?php ob_start(); ?>
<?php if (!isset($_SESSION['ajouter'])) : ?>
    <table class="table ">
        <thead class="table table-info">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Picture</th>
                <th scope="col">Publication</th>
                <th scope="col">Price</th>
                <th scope="col">Editeur</th>
                <th scope="col">Catégorie</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($libraries as $champ => $library) : ?>
                <tr>
                    <th scope="row">
                        <?= $library->id ?>
                    </th>
                    <th>
                        <?= $library->title ?>
                    </th>
                    <th class="overflow-hidden">
                        <?= $library->description ?>
                    </th>
                    <th>
                        <img src="../Library/<?= $library->picture ?>" alt="picture" class="rounded-circle" height="65px" width="65px">


                    </th>
                    <th>
                        <?= $library->publication ?>
                    </th>
                    <th>
                        <?= $library->price ?> €
                    </th>
                    <th>

                    </th>
                    <th>

                    </th>
                    <th>


                        <a href="">
                            <button class="btn btn-warning">
                                <i class="fa-solid fa-eye text-white fs-4 fw-lighter mt-1"></i>
                            </button>
                        </a>

                    </th>
                    <th>

                        <a href="">
                            <button class="btn btn-info">
                                <i class="fa-solid fa-pen-to-square text-white fs-4 fw-ligther mt-1"></i>
                            </button>
                        </a>

                    </th>
                    <th>
                        <form action="" method="post">
                            <input type="hidden" name="delete" value="">
                            <button class="btn btn-danger" type="submit">
                                <i class="fa-solid fa-xmark text-white fs-4 fw-ligther mt-1"></i>
                            </button>
                        </form>

                    </th>

                </tr>
            <?php endforeach ?>


        </tbody>
    </table>

    <form action="" method="post">
        <input type="hidden" name="ajouter" value="ajouter" />
        <button class="btn btn-success" type="submit">
            <i class="fa-solid fa-book-medical text-white fs-4 fw-ligther mt-1 text-uppercase"> ajouter</i>
        </button>
    </form>
<?php else : ?>

    <div class="d-flex justify-content-center">
        <h2 class="text-uppercase text-warning">Ajout de Livre</h2>
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
            <option value="1">html</option>
            <option value="2">css</option>
            <option value="3">javascript</option>
            <option value="4">php</option>
        </select>
        <select name="editeur" id="editeur" class="form-control mb-3">
            <option selected>
                Editeur
            </option>
            <option value="1">Hachette</option>
            <option value="2">Belin Education</option>
            <option value="3">Nathan</option>
            <option value="4">Hatier</option>
        </select>
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" id="price" class="form-control">
        <input type="submit" value="envoyer" class="btn btn-primary mt-2">
    </form>
<?php endif ?>
<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php";
?>