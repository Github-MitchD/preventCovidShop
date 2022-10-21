<?php
require_once "config/config.php";
require_once "config/Securite.class.php";
require_once "models/products.dao.php";
require_once "models/images.dao.php";

/**
 * Function to display the home page
 *
 * @return void
 */
function getPageAccueil()
{
    $title = "Page d'accueil";
    $description = "Description de la page d'accueil";
    $products = getHomeProductsFromDB();
    require_once('views/accueil.view.php');
}

/**
 * Function to display the about page
 *
 * @return void
 */
function getPageAPropos()
{
    $title = "Page a propos";
    $description = "Description de la page a propos";
    require_once('views/apropos.view.php');
}

/**
 * Function to display all products page
 *
 * @return void
 */
function getPageAllProducts()
{
    $title = "Page des produits";
    $description = "Description de la page des produits";
    $allProducts = getAllProductsFromDB();
    require_once('views/allProducts.view.php');
}

/**
 * Function to display the product page by product id
 *
 * @return void
 */
function getPageProduct()
{    
    if (isset($_GET['id']) && !empty($_GET['id'])) {         
        $id = Securite::secureHTML($_GET['id']);
        $product = getProductFromDB($id);
        if($product) {
            $title = "Page du produit ".$product['name'];
            $description = "Description de la page du produit ".$product['name'];
            
            require_once('views/product.view.php');
        } else {
            $alert = "Houston, on a un problème ! <br/>Cette fiche produit n'existe pas.";
            $alertType = ALERT_DANGER;
            require_once('views/404.php');
        }        
    } else {
        throw new Exception("L'Id du produit n'a pas été renseigné !<br>Vous ne pouvez pas accéder à cette page");
    }    
}

/**
 * Function to display products order by name asc
 *
 * @return void
 */
function getPageProductByNameAsc(){
    $title = "Page des produits";
    $description = "Description de la page des produits";
    $allProducts = getAllProductsFromDBbyNameAsc();
    require_once('views/allProducts.view.php');
}

/**
 * Function to display products order by name desc
 *
 * @return void
 */
function getPageProductByNameDesc(){
    $title = "Page des produits";
    $description = "Description de la page des produits";
    $allProducts = getAllProductsFromDBbyNameDesc();
    require_once('views/allProducts.view.php');
}

/**
 * Function to display products order by price asc
 *
 * @return void
 */
function getPageProductByPriceAsc(){
    $title = "Page des produits";
    $description = "Description de la page des produits";
    $allProducts = getAllProductsFromDBbyPriceAsc();
    require_once('views/allProducts.view.php');
}

/**
 * Function to display products order by price desc
 *
 * @return void
 */
function getPageProductByPriceDesc(){
    $title = "Page des produits";
    $description = "Description de la page des produits";
    $allProducts = getAllProductsFromDBbyPriceDesc();
    require_once('views/allProducts.view.php');
}