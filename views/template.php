<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $description ?>" />
    <meta name="author" content="Michel Dufour" />
    <title>PCS - <?= $title ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="public/img/ico.png">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- Custom CSS -->
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="accueil">PreventCovidShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link text-uppercase" aria-current="page" href="accueil">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link text-uppercase" href="a_propos">A Propos</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Les produits</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="tous_nos_produits">Tous les produits</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="tous_nos_produits">Masques Respiratoires</a></li>
                            <li><a class="dropdown-item" href="tous_nos_produits">Gel désinfectant</a></li>
                            <li><a class="dropdown-item" href="tous_nos_produits">Vêtements jetables</a></li>
                            <li><a class="dropdown-item" href="tous_nos_produits">Protection des yeux</a></li>
                            <li><a class="dropdown-item" href="tous_nos_produits">Produits d'hygiène</a></li>
                            <li><a class="dropdown-item" href="tous_nos_produits">Cloisons de protection</a></li>
                            <li><a class="dropdown-item" href="tous_nos_produits">Signalétique Covid-19</a></li>
                            <li><a class="dropdown-item" href="tous_nos_produits">Délimitations sols et espaces</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="admin" class="btn btn-outline-dark text-uppercase">
                        <i class="bi bi-power"></i>Admin
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <!-- Page content -->
    <?= $content ?>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; PreventCovidShop.fr 2022 - Made by <a href="https://michel-dufour.fr" target="_blank">Michel Dufour</a></p>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="public/js/scripts.js"></script>
</body>

</html>
