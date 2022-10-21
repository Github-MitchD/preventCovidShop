<?php
ob_start();
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Oups ! On dirait que vous êtes perdu.</h1>
            <p class="lead fw-normal text-white-50 mb-0">C'est peut-être la page que vous recherchez qui est introuvable.</p>
        </div>
    </div>
</header>

<div class="container my-5 text-center" style="min-height: 70vh;">
    <div class="p-5">
        <h1 class="page_title mt-5"><?= $errorMessage ?></h1>
        <br>
        <a href="accueil" type="button" class="btn btn-info shadow-sm mb-5">Retour à l'accueil</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/template.php";
?>