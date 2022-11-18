<?php
ob_start();
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Bienvenue sur PreventCovidShop</h1>
            <h2>Version 2 with Slim</h2>
            <p class="lead fw-normal text-white-50 mb-0">Boutique en ligne spécialisée dans
                les produits pour la prévention de la COVID-19</p>
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <h1 class="text-center ">Nos produits phares</h1>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mt-4">
            <?php foreach ($products as $product) : ?>
                <div class="col mb-5">
                    <a href="<?= URL ?>voir_le_produit/<?= $product['id'] ?>">
                        <div class="card h-100">
                            <!-- Promotion badge-->
                            <?php if ($product['promotion'] == "true") {
                                echo '<div class="badge bg-warning text-dark position-absolute" style="top: 0.5rem; right: 0.5rem">Promo ' . PROMO_VALUE . '</div>';
                            } ?>
                            <!-- Product image -->
                            <img class="card-img-top" src="images/<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>" />
                            <!-- Product details -->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= $product['name'] ?></h5>
                                    <!-- Product info stock -->
                                    <?php if ($product['quantity'] < 1) { ?>
                                        <div class="d-flex justify-content-center mb-2">
                                            <div class="badge bg-danger text-uppercase">Rupture de stock</div>
                                        </div><?php
                                            } ?>
                                    <!-- Product price-->
                                    <?php if ($product['promotion'] == "true") { ?>
                                        <span class="text-muted text-decoration-line-through">
                                            <?= number_format($product['price'], 2) ?> €</span>
                                        <?= number_format($product['price'] * (1 - PROMO), 2)  ?> € <?php
                                        } else { ?> <?= number_format($product['price'], 2) ?> € <?php } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-flex">
        <a href="tous_nos_produits" type="button" class="btn btn-warning m-auto">Voir tous nos produits</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__."/template.php";
?>
