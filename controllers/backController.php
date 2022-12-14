<?php
require_once "config/config.php";
require_once "config/Securite.class.php";
require_once "models/products.dao.php";
require_once "models/images.dao.php";

/**
 * Display Admin Page
 *
 * @return void
 */
function getPageAdmin()
{
    $title = "Page d'administration";
    $description = "Description de la page d'administration";
    $alert = "";
    $alertType = "";
    $allProducts = getAllProductsFromDB();

    require_once 'views/admin.view.php';
}

/**
 * Displays the Add Product Form
 *
 * @return void
 */
function getPageProductAdd()
{
    $title = "Admin - Ajouter un produit";
    $description = "Description de la page d'ajout produit";
    $alert = "";
    $alertType = "";

    if (isset($_POST['productName']) && !empty($_POST['productName']) &&
        isset($_POST['productCategory']) && !empty($_POST['productCategory']) &&
        isset($_POST['productPrice']) && !empty($_POST['productPrice']) &&
        isset($_POST['productDesc']) && !empty($_POST['productDesc']) &&
        isset($_FILES['productImg']) && !empty($_FILES['productImg']) 
    ) {
        $productName = Securite::secureHTML($_POST['productName']);
        $productCategory = Securite::secureHTML($_POST['productCategory']);
        $productPrice = Securite::secureHTML($_POST['productPrice']);
        $productDesc = Securite::secureHTML($_POST['productDesc']);
        $productQuantity = Securite::secureHTML($_POST['productQuantity']);
        
        if (isset($_POST['productPromo'])) {
            $productPromo = Securite::secureHTML($_POST['productPromo']);
        } else {
            $productPromo = "false";
        }

        $imageToEdit = $_FILES['productImg'];
        $imgWithoutSpace = str_replace(' ', '_', $imageToEdit);
        $productImg = str_replace("'", '_', $imgWithoutSpace);

        $repertory = "public/images/products/";

        try {
            $imageName = addImage($productImg, $repertory, $productName);
            $idImage = insertImageIntoDB($imageName, "products/" . $imageName, $imageName);

            $idProduct = insertProductIntoDB($productName, $productCategory, $productPrice, $productDesc, $productQuantity, $productPromo, $idImage);

            if ($idProduct) {
                $alert = "La cr??ation de la fiche produit a bien ??t?? effectu??</br>Vous allez ??tre redirig?? ?? la <a href='admin'>liste des produits</a>";
                $alertType = ALERT_SUCCESS;
                header("Refresh: 3; url=admin");
            } else {
                $alert = "Un probl??me est survenu pendant la cr??ation de la fiche produit";
                $alertType = ALERT_DANGER;
            }
        } catch (Exception $e) {
            $alert = "La cr??ation de la fiche produit n'a pas fonctionn?? <br/>" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }
    require_once 'views/add_product.view.php';
}

/**
 * Displays the Product Update Form
 *
 * @return void
 */
function getPageProductUpdate()
{
    $title = "Admin - Modifier un produit";
    $description = "Description de la page de modification produit";
    $alert = "";
    $alertType = "";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = Securite::secureHTML($_GET['id']);
        $product = getProductById($id);
    }

    if (!empty($_POST)) {
        $productName = Securite::secureHTML($_POST['productName']);
        $productCategory = Securite::secureHTML($_POST['productCategory']);
        $productPrice = Securite::secureHTML($_POST['productPrice']);
        $productQuantity = Securite::secureHTML($_POST['productQuantity']);
        $productDesc = Securite::secureHTML($_POST['productDesc']);

        $productQuantity = (int)$productQuantity;

        if (isset($_POST['productPromo'])) {
            $productPromo = Securite::secureHTML($_POST['productPromo']);
        } else {
            $productPromo = "false";
        }

        $isSuccess = true;

        // verification
        if (empty($productName)) { $isSuccess = false; }
        if (empty($productCategory)) { $isSuccess = false; }
        if (empty($productPrice)) { $isSuccess = false; }
        if (!is_int($productQuantity)) { $isSuccess = false; }
        if (empty($productDesc)) { $isSuccess = false; }
        try {
            if (($isSuccess)) {
                if (updateProductIntoDB($productName, $productCategory, $productPrice, $productDesc, $productQuantity, $productPromo, $id)) {
                    $alertType = ALERT_SUCCESS;
                    $alert = "La fiche produit a bien ??t?? modifi??</br>Vous allez ??tre redirig?? ?? la <a href='admin'>liste des produits</a>";
                    header("Refresh: 3; url=admin");
                } else {
                    $alertType = ALERT_DANGER;
                    $alert = "L'insertion en base de donn??es n'a pas fonctionn??.";
                }
            }
        } catch (Exception $e) {
            $alert = "La modif de la fiche produit n'a pas fonctionn?? <br/>" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }
    require_once 'views/update_product.view.php';
}

/**
 * Function that allows to delete a product by id
 *
 * @return void
 */
function getPageDeleteProduct(){
    $title = "Page de suppression de produit";
    $description = "Page de gestion des pensionnaires";
    $alert = "";
    $alertType = "";
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        try {
            if (deleteProductFromDB(Securite::secureHtml($_GET['id'])) < 1) {
                throw new Exception("La suppression du produit n'a pas fonctionn??");
            }
            $alert = "La suppression du produit a bien ??t?? effectu?? ! ";
            $alertType = ALERT_SUCCESS;
        } catch (Exception $e) {
            $alert = "La suppression du produit a echou?? ! <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
        $allProducts = getAllProductsFromDB();
        require_once 'views/admin.view.php';
    }
}