<?php
ob_start();
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Page de modification de produit</h1>
        </div>
    </div>
</header>

<!-- Display alert -->
<?php if ($alert !== "") { ?>
    <div class="col-12 col-md-6 m-auto">
        <?= displayAlert($alert, $alertType) ?>
    </div>
<?php } ?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <!-- breadcrumb -->
        <p class="mb-4"><a href="accueil">Accueil</a> > <a href="admin">Administration</a> > Modifier un produit</p>

        <form method="POST" action="" class="needs-validation" enctype="multipart/form-data">
            <div class="row mb-4 justify-content-center">
                <div class="col col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="productName" name="productName" placeholder="productName" value="<?= $product['name'] ?>" required>
                        <label for="productName">Nom du produit</label>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="form-check form-check-add">
                        <input class="form-check-input" type="checkbox" value="true" id="productPromo" name="productPromo" <?php if($product['promotion'] == "true"){echo"checked";}?>>
                        <label class="form-check-label" for="productPromo">
                            Produit en Promotion: <?= PROMO_VALUE ?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col col-md-3">
                    <div class="form-floating">
                        <input type="number" min="0" max="9999" step="0.01" class="form-control" id="productPrice" name="productPrice" value="<?= $product['price'] ?>" required>
                        <label for="productPrice">Prix du produit</label>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="form-floating">
                    <input type="number" min="0" step="1" value="<?= $product['quantity'] ?>" class="form-control" id="productQuantity" name="productQuantity" required>
                        <label for="productQuantity">Quantité du produit</label>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="form-floating">
                        <select class="form-select" id="productCategory" name="productCategory" required>
                            <option selected value="<?= $product['category'] ?>"><?= $product['category'] ?></option>
                            <option value="Masques respiratoires">Masques respiratoires</option>
                            <option value="Gel désinfectant">Gel désinfectant</option>
                            <option value="Vêtements jetables">Vêtements jetables</option>
                            <option value="Protection des yeux">Protection des yeux</option>
                            <option value="Produits d'hygiène">Produits d'hygiène</option>
                            <option value="Cloisons de protection">Cloisons de protection</option>
                            <option value="Signalétique Covid-19">Signalétique Covid-19</option>
                            <option value="Délimitations sols et espaces">Délimitations sols et espaces</option>
                        </select>
                        <label for="productCategory">Catégorie du produit</label>
                    </div>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col col-md-9">
                    <label for="productDesc">Descriptif du produit</label>
                    <textarea class="form-control myeditablediv" placeholder="Insérer un descriptif pour le produit" id="productDesc" name="productDesc" style="height: 200px" required><?= $product['description'] ?></textarea>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col col-md-9">
                    <label for="productDesc">Image actuelle:</label><br>
                    <img class="shadow-sm img-update-product" src="images/<?= $product['image_url'] ?>">
                </div>
            </div>
            <div class="text-center">
                <a href="admin" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-warning">Valider</button>
            </div>
        </form>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__."/template.php";
?>
