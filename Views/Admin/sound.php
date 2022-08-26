<?php ob_start(); ?>

<table class="table ">
    <thead class="table table-info">
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">image</th>
            <th scope="col">sound</th>
            <th scope="col">description</th>
            <th scope="col">releaseDate</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($sounds as $sound) : ?>
            <tr>
                <th scope="row">
                    <?= $sound->id  ?>
                </th>
                <th>
                    <?= $sound->title ?>
                </th>
                <th>
                    <img src="../Image/<?= $sound->image ?>" alt="" srcset="" width="65px" height="75px">
                </th>
                <th>
                    <audio src="../Audio/<?= $sound->sound ?>" controls="true">
                        <style>
                            audio::-webkit-media-controls-panel {
                                background-color: #56AEFF;
                            }

                            audio::-webkit-media-controls-mute-button {
                                background-color: #B1D4E0;
                                border-radius: 50%;
                            }
                        </style>
                    </audio>
                </th>
                <th>
                    <?= $sound->description ?>
                </th>
                <th>
                    <?= $sound->releaseDate ?>
                </th>
                <th>


                    <a href="adminSound/<?= $sound->id ?>">
                        <button class="btn btn-warning">
                            <i class="fa-solid fa-eye text-white fs-4 fw-lighter mt-1"></i>
                        </button>
                    </a>

                </th>
                <th>

                    <a href="adminUpdateSound/<?= $sound->id ?>">
                        <button class="btn btn-info">
                            <i class="fa-solid fa-pen-to-square text-white fs-4 fw-ligther mt-1"></i>
                        </button>
                    </a>

                </th>
                <th>
                    <form action="" method="post">
                        <input type="hidden" name="delete" value=<?= $sound->id ?>>
                        <button class="btn btn-danger" type="submit">
                            <i class="fa-solid fa-xmark text-white fs-4 fw-ligther mt-1"></i>
                        </button>
                    </form>

                </th>

            </tr>
        <?php endforeach ?>

    </tbody>
</table>
<a href="adminAddSound">
    <button class="btn btn-success text-uppercase">
        ajouter
    </button>
</a>



<?php $content = ob_get_clean();
require_once ROOT . "/Views/Admin/dashboard.php";
?>