<?php
ob_start();

$formatter = new NumberFormatter("fr", NumberFormatter::CURRENCY);
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Page d'administration</h1>
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
        <p class="mb-2"><a href="accueil">Accueil</a> > Administration</p>
        <div class="d-flex align-items-end flex-column">
            <a href="ajouter_un_produit" type="button" class="btn btn-warning mb-4">Ajouter un produit</a>
        </div>
        <div class="table-responsive">
            <table id="table_id" class="table table-hover table-sm my-4">
                <thead>
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th style="width: 10%;">Image</th>
                        <th style="width: 35%;">Nom du produit</th>
                        <th style="width: 10%;">Prix</th>
                        <th style="width: 10%;">Stock</th>
                        <th style="width: 10%;">Promo</th>
                        <th style="width: 30%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allProducts as $product) : ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><img src="<?= URL ?>../public/images/<?= $product['image_url'] ?>" class="image_tab"></td>
                            <td><a href="<?= URL ?>voir_le_produit?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></td>
                            <td><?= $formatter->formatCurrency($product['price'], "EUR") ?></td>
                            <?php if ($product['quantity'] < 1) { ?>
                                <td class="text-danger"><?= $product['quantity'] ?></td>
                            <?php } else { ?>
                                <td class="text-success"><?= $product['quantity'] ?></td>
                            <?php } ?>
                            <td class="">
                                <?php if ($product['promotion'] == "true") {
                                    echo "<i class='bi bi-check-lg text-success'></i> " . $formatter->formatCurrency($product['price'] * (1 - PROMO), "EUR");
                                } ?></td>
                            <td class=""><a href="<?= URL ?>voir_le_produit?id=<?= $product['id'] ?>" type="button" class="btn btn-info m-1"><i class="bi bi-eye"></i></a><a href="modifier_un_produit?id=<?= $product['id'] ?>" type="button" class="btn btn-warning m-1"><i class="bi bi-pencil"></i></a><button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $product['id'] ?>"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <!-- Modal Delete Product -->
                        <div class="modal fade" id="deleteModal<?= $product['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Produit : <?= $product['name'] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Etes-vous sûr de vouloir supprimer ce produit ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="supprimer_produit?id=<?= $product['id'] ?>" type="button" class="btn btn-primary">Oui, supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__."/template.php";
?>
