<?php ob_start(); ?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">Logo</th>
                <th scope="col">action</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($editeurs as $champs => $editeur) : ?>
                <tr>
                    <th scope="row"><?= $editeur->id ?></th>
                    <td><?= $editeur->title ?></td>
                    <td> <img src=".././Editeur/<?= $editeur->logo ?>" width="65px" height="65px"></td>

                    <td>
                        <form action="<?= HEADER ?>adminEditeur/<?= $editeur->id ?>" method="post">
                            <input type="hidden" name="update" value="update">
                            <button type="submit" class="btn btn-info">
                                <i class="fa-solid fa-pen-to-square text-white fs-4 fw-ligther mt-1"></i>
                            </button>
                        </form>
                    </td>
                    <td>


                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
        <form action="<?= HEADER ?>adminAddEditeur" method="post" class="form-group">
            <input type="hidden" name="add" class="form-control">
            <button type="submit" class="btn btn-success text-uppercase">
                Ajouter
            </button>
        </form>

    </table>

</div>


<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php"; ?>