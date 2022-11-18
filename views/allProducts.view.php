<?php
ob_start();
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Tous les produits</h1>
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-4">
    <div class="container px-4 px-lg-5">
        <!-- breadcrumb -->
        <p class="mb-2"><a href="accueil">Accueil</a> > Nos produits</p>
        <div class="d-flex align-items-end flex-column mb-4">
            <form name="form">
                <select class="form-select w-auto" size="1" onChange="location = this.options[this.selectedIndex].value;">
                    <option selected>Trier par :</option>
                    <option value="produit_par_name_asc">Nom: par ordre croissant</option>
                    <option value="produit_par_name_desc">Nom: par ordre décroissant</option>
                    <option value="produit_par_price_asc">Prix: par ordre croissant</option>
                    <option value="produit_par_price_desc">Prix: par ordre décroissant</option>
                </select>
            </form>
        </div>
        <div class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <!-- Products cards -->
            <?php foreach ($allProducts as $product) : ?>
                <div class="col mb-5">
                    <a href="<?= URL ?>voir_le_produit?id=<?= $product['id'] ?>">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <?php if ($product['promotion'] == "true") {
                                echo '<div class="badge bg-warning text-dark position-absolute" style="top: 0.5rem; right: 0.5rem">Promo ' . PROMO_VALUE . '</div>';
                            } ?>
                            <!-- Product image -->
                            <img class="card-img-top" src="../public/images/<?= $product['image_url'] ?>" alt="..." />
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
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__."/template.php";
?>
