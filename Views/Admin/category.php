<?php ob_start(); ?>

<table class="table ">
    <thead class="table table-info">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody>

        <?php foreach ($categorys as $champs => $category) : ?>
            <tr>
                <th scope="row">
                    <?= $category->id ?>
                </th>

                <th>
                    <?= $category->title ?>
                </th>



                <th>
                    <form action="<?= HEADER ?>" method="post">
                        <input type="hidden" name="update" value="update">
                        <button class="btn btn-info" type="submit">
                            <i class="fa-solid fa-pen-to-square text-white fs-4 fw-ligther mt-1"></i>
                        </button>
                    </form>

                </th>
                <th>
                    <form action="<?= HEADER ?>" method="post">
                        <input type="hidden" name="delete" value="delete">
                        <button class="btn btn-danger" type="submit">
                            <i class="fa-solid fa-xmark text-white fs-4 fw-ligther mt-1"></i>
                        </button>
                    </form>

                </th>

            </tr>
        <?php endforeach ?>


    </tbody>
</table>

<form action="<?= HEADER ?>adminAdd " method="post">
    <input type="hidden" name="ajouter" value="ajouter" />
    <button class="btn btn-success" type="submit">
        <i class="fa-solid fa-book-medical text-white fs-4 fw-ligther mt-1 text-uppercase"> ajouter</i>
    </button>
</form>

<?php
$content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php";
?>