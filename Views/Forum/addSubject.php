<?php ob_start(); ?>
<?php if (isset($_SESSION['connexion']) && isset($_SESSION['id_profil'])) : ?>
    <div class="bg-dark " style="height : 150px; display:flex; justify-content: center; align-items:center">
        <img src="../Profils/<?= $profil->illustration ?>" alt="" srcset="" width="100px" height="100px" class="rounded-circle border border-2 border-dark mb-5 mt-5 mx-5 ">
        <h1 class="text-white text-uppercase">
            <?= $profil->pseudo ?>
        </h1>
    </div>
<?php endif ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Pseudo</th>
            <th scope="col">Sujet</th>
            <th scope="col">catégorie</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($_SESSION['connexion'])) : ?>
            <tr>

                <td>
                    <a href="forumAdd">
                        <i class="fa-solid fa-circle-plus fs-3 text-success">
                            <span class="fs-6">ajouter un sujet</span> </i>

                    </a>
                </td>
            </tr>
        <?php endif ?>
        <?php foreach ($details as $champ => $detail) : ?>
            <tr>
                <th scope="row">
                    <a href="forum/<?= $detail->id ?>">
                        <button class="btn btn-success">
                            <i class="fa-regular fa-eye text-white fs-3"></i>
                        </button>
                    </a>

                </th>
                <td><img src="../Profils/<?= $detail->illustration ?>" alt="" class="rounded-circle border border-dark border-2" width="50px" height="50px"></td>
                <td><?= $detail->pseudo ?></td>
                <td><?= $detail->title ?></td>
                <td><?= $detail->category ?></td>
                <td><?= $detail->created_at ?></td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>

<?php $content  = ob_get_clean();
require_once ROOT . "/Views/template.php";
?>