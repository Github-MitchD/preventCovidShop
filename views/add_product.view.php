<?php
ob_start();
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Page d'ajout de produit</h1>
        </div>
    </div>
</header>

<!-- Display Alert -->
<?php if ($alert !== "") { ?>
    <div class="col-12 col-md-6 m-auto">
        <?= displayAlert($alert, $alertType) ?>
    </div>
<?php } ?>

<!-- Section-->
<section class="py-4">
    <div class="container px-4 px-lg-5">
        <!-- breadcrumb -->
        <p class="mb-4"><a href="accueil">Accueil</a> > <a href="admin">Administration</a> > Ajouter un produit</p>
        <form method="POST" action="" class="needs-validation" enctype="multipart/form-data">
            <div class="row mb-4 justify-content-center">
                <div class="col col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="productName" name="productName" placeholder="productName" required>
                        <label for="productName">Nom du produit</label>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="form-check form-check-add">
                        <input class="form-check-input" type="checkbox" value="true" id="productPromo" name="productPromo">
                        <label class="form-check-label" for="productPromo">
                            Produit en Promotion: <?= PROMO_VALUE ?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col col-md-3">
                    <div class="form-floating">
                        <input type="number" min="0" max="9999" step="any" class="form-control" id="productPrice" name="productPrice" placeholder="productPrice" required>
                        <label for="productPrice">Prix du produit</label>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="form-floating">
                        <input type="number" min="0" step="1" value="1" class="form-control" id="productQuantity" name="productQuantity" placeholder="productQuantity">
                        <label for="productQuantity">Quantité du produit</label>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="form-floating">
                        <select class="form-select" id="productCategory" name="productCategory" required>
                            <option selected disabled value="">Choisir...</option>
                            <option value="Masques_respiratoires">Masques respiratoires</option>
                            <option value="Gel désinfectant">Gel désinfectant</option>
                            <option value="Vetements_jetables">Vêtements jetables</option>
                            <option value="Protection_des_yeux">Protection des yeux</option>
                            <option value="Produits_dhygiene">Produits d'hygiène</option>
                            <option value="Cloisons_de_protection">Cloisons de protection</option>
                            <option value="Signaletique_Covid_19">Signalétique Covid-19</option>
                            <option value="Delimitations_sols_et_espaces">Délimitations sols et espaces</option>
                        </select>
                        <label for="productCategory">Catégorie du produit</label>
                    </div>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col col-md-9">
                    <label for="productDesc">Descriptif du produit</label>
                    <textarea class="form-control myeditablediv" placeholder="Insérer un descriptif pour le produit" id="productDesc" name="productDesc" style="height: 200px" required></textarea>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col col-md-9">
                    <div class="mb-3">
                        <label for="productImg" class="form-label">Image du produit : Fichier autorisé jpg, jpeg, png (max 500kb)</label>
                        <input class="form-control" type="file" id="productImg" name="productImg" required>
                    </div>
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
