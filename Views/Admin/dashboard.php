<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sound Host -- Admin</title>
</head>

<body>
    <div class="row">



        <div class="col-2 " style="background-color: #3a86ff; min-height:100vh">
            <h2 class="text-white text-center py-2">
                Admin

            </h2>
            <div class="bg-white m-auto" style="height: 1px; width:90%"></div>
            <div class="container mt-2">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?= HEADER ?>admin" class="nav-link active text-white text-center fw-bolder">
                            <i class="fa-solid fa-gauge"></i>
                            Dashboard
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-white m-auto" style="height: 1px; width:90%"></div>
            <div class="container mt-2">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active text-white active text-center text-uppercase ml-2">
                            <i class="fa-solid fa-user-astronaut"></i>
                            utilisateur
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container mt-2">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?= HEADER ?>adminSound" class="nav-link active text-white active text-center text-uppercase ml-2">
                            <i class="fa-solid fa-headphones-simple"></i>
                            sound
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container mt-2">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link active text-white active text-center text-uppercase ml-2">
                            <i class="fa-brands fa-forumbee"></i>
                            forum
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container mt-2">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?= HEADER ?>adminLibrary" class="nav-link active text-white active text-center text-uppercase ml-2">
                            <i class="fa-solid fa-book"></i>
                            librarie
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container mt-2">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?= HEADER ?>adminCategory" class="nav-link active text-white active text-center text-uppercase ml-2">
                            <i class="fa-solid fa-list"></i>
                            Category
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container mt-2">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?= HEADER ?>adminEditeur" class="nav-link active text-white active text-center text-uppercase ml-2">
                            <i class="fa-solid fa-shop"></i>
                            éditeur
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-white m-auto mt-2" style="height: 1px; width:100%"></div>
        </div>

        <div class="col-10 ">
            <!-- As a link -->
            <nav class="navbar bg-light navbar-collapse">

                <a class="navbar-brand" href="#">Administrateur</a>
                <div class="d-flex justify-content-end align-items-center  mx-5">
                    <i class="fa-solid fa-user-astronaut fs-2 text-warning "></i>
                    <span class="mx-2">Profil</span>
                </div>


            </nav>


            <div class="container">


                <?php if (isset($content)) {
                    echo $content;
                } ?>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>