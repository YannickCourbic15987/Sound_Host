<?php ob_start(); ?>

<div class="container mt-5">
    <h1 class="text-warning text-center text-uppercase"><?= $detail->title ?></h1>
</div>
<div class="container" style=" display:flex; justify-content: space-between">
    <p>Catégorie : <span class="text-primary"><?= $detail->category ?></span></p>
    <p>Date de création : <span class="text-primary"> <?= $detail->created_at ?> </span></p>
</div>
<div class="container">

    <?php foreach ($message as $champs => $messages) : ?>

        <?php if ($messages->pseudo === $pseudo && isset($_SESSION['connexion'])) : ?>
            <div class="container bg-info rounded">
                <div class="d-flex align-items-center">
                    <!-- //modifcation -->
                    <img src="../../Profils/<?= $messages->illustration ?>" alt="" class="rounded-circle border border-dark" width="50px" height="50px">
                    <p class="text-white mt-3 mx-2"> <?= $messages->pseudo ?></p>
                    <div class="d-flex justify-content-end w-100 gap-2">
                        <?php if (!isset($_SESSION['update'])) : ?>
                            <form action="" method="post">
                                <input type="hidden" name="remove" id="remove" value="remove ">
                                <input type="datetime" name="publication" id="publication" value="<?= $messages->publication ?>" class="d-none" />
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-xmark "></i>
                                </button>
                            </form>

                            <form action="" method="post">
                                <input type="hidden" name="update" id="update" value="update ">
                                <input type="datetime" name="publication" id="publication" value="<?= $messages->publication ?>" class="d-none" />
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-clip"></i>
                                </button>
                            </form>
                        <?php endif ?>
                    </div>
                </div>
                <?php if (!isset($_SESSION['update'])) : ?>
                    <p class="text-white text-center py-2">
                        <?= $messages->text ?>
                    </p>
                <?php elseif ($messages->publication === $_SESSION['publication']) : ?>
                    <form action="" method="post" class="form-group mb-5">

                        <textarea rows="1" cols="1" class="form-control bg-info border border-info text-white" name="message_update" id="message_update">
                                <?= $messages->text ?>
                                </textarea>

                        <input type="datetime" name="publication" id="publication" value="<?= $messages->publication ?>" class="d-none" />
                        <button type=" submit" class="btn btn-success mb-2">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>
                <?php else : ?>

                    <p class="text-white text-center py-2">
                        <?= $messages->text ?>
                    </p>

                <?php endif ?>
            </div>
        <?php else : ?>
            <div class="container bg-primary rounded">
                <div class="d-flex align-items-center">

                    <img src="../../Profils/<?= $messages->illustration ?>" alt="" class="rounded-circle border border-dark" width="50px" height="50px">
                    <p class="text-white mt-3 mx-2"> <?= $messages->pseudo ?></p>
                </div>
                <p class="text-white text-center py-2">
                    <?= $messages->text ?>
                </p>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>

<?php if (isset($_SESSION['connexion'])) : ?>
    <div class="container rounded static-bottom " style="margin-bottom:5rem;">
        <form action="" method="post" class="form-group">
            <input type="hidden" name="publication" id="publication" value='<?= $messages->publication ?>' class="form-control" />
            <textarea name="message" id="message" cols="10" rows="5" class="form-control"> </textarea>
            <button type="submit" class="btn btn-primary mt-2">
                envoyer
            </button>
        </form>
    </div>
<?php endif ?>
<?php $content = ob_get_clean();
require_once ROOT . '/Views/template.php';
?>