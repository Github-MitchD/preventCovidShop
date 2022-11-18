<?php
ob_start();
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Page du produit</h1>
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-4">
    <div class="container px-4 px-lg-5">
        <!-- breadcrumb -->
        <p class="mb-5"><a href="accueil">Accueil</a> > <a href="tous_nos_produits">Nos produits</a> > <a href="accueil"><?= $product['category'] ?></a> > <?= $product['name'] ?></p>
        <div class="row">
            <div class="col col-md-6">
                <img class="img-detail-product img-fluid border border-white shadow" src="../public/images/<?= $product['image_url'] ?>" alt="...">
            </div>
            <div class="col col-md-6">
                <!-- Product info stock -->
                <?php if ($product['quantity'] < 1) { ?>
                    <div class="alert alert-danger text-uppercase" role="alert">
                        Produit en rupture de stock
                    </div><?php } ?>
                    <!-- Product info promotion -->
                <?php if ($product['promotion'] == "true") { ?>
                    <div class="alert alert-warning text-uppercase" role="alert">
                        Produit en promotion
                    </div><?php } ?>
                <p><span class="text-uppercase fw-bold">ID : </span><?= $product['id'] ?></p>
                <p><span class="text-uppercase fw-bold">Nom du produit : </span><?= $product['name'] ?></p>
                <p><span class="text-uppercase fw-bold">Catégorie : </span><?= $product['category'] ?></p>
                <p><span class="text-uppercase fw-bold">Prix : </span><?= $product['price'] ?> €</p>
                <!-- Promotion info -->
                <?php
                if ($product['promotion'] == "true") { ?>
                    <p><span class="text-uppercase fw-bold">Promotion : </span><?= PROMO_VALUE . " - <mark>Nouveau Prix : " . number_format($product['price'] * (1 - PROMO), 2) . "€</mark>" ?></p>
                <?php } else { ?>
                    <p><span class="text-uppercase fw-bold">Promotion : </span>Pas de promotion</p>
                <?php }
                ?>
                <p><span class="text-uppercase fw-bold">Quantité : </span><?= $product['quantity'] ?></p>
                <p><span class="text-uppercase fw-bold">Description : </span><?= $product['description'] ?></p>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__."/template.php";
?>
