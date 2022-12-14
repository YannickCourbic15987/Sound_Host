<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2bb89bf154.js" crossorigin="anonymous"></script>
    <title>Sound Host -- <?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">Sound Host </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse show" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= HEADER ?>home">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= HEADER ?>forum">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= HEADER ?>library">Library</a>
                    </li>
                    <?php if (!isset($_SESSION['connexion'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= HEADER ?>register">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= HEADER ?>sign">Connexion</a>
                        </li>


                    <?php else : ?>
                        <li class="nav-item ">
                            <a class="nav-link active " href="<?= HEADER ?>profil">Profil</a>
                        </li>
                        <li class="nav-item ">
                            <?php if (isset($_SESSION['connexion']) && $_SESSION['role'] === "admin") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= HEADER ?>admin">Admin</a>
                        </li>
                    <?php endif ?>

                    <a href="<?= HEADER ?>logout" class="text-danger fs-2" role="button">
                        <i class="fa-solid fa-right-from-bracket "></i>
                    </a>

                    </li>
                <?php endif ?>
                <!-- <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="">

        <?= $content ?>
    </div>
    <footer class="bg-light text-center text-lg-start static-bottom" style="margin-top : 73vh;">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ?? 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>