<?php
require __DIR__ . '/vendor/autoload.php';
require_once('controllers/frontController.php');
require_once('controllers/backController.php');

try {
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'accueil':
                getPageAccueil();
                break;
            case 'a_propos':
                getPageAPropos();
                break;
            case 'tous_nos_produits':
                getPageAllProducts();
                break;
            case 'voir_le_produit':
                getPageProduct();
                break;
            case 'produit_par_name_asc':
                getPageProductByNameAsc();
                break;
            case 'produit_par_name_desc':
                getPageProductByNameDesc();
                break;
            case 'produit_par_price_asc':
                getPageProductByPriceAsc();
                break;
            case 'produit_par_price_desc':
                getPageProductByPriceDesc();
                break;
            case 'admin':
                getPageAdmin();
                break;
            case 'ajouter_un_produit':
                getPageProductAdd();
                break;
            case 'modifier_un_produit':
                getPageProductUpdate();
                break;
            case 'supprimer_produit':
                getPageDeleteProduct();
                break;
            case 'error403':
                throw new Exception("Erreur 403<br>Vous n'avez pas la permission d'accéder à cette page !");
                break;
            case 'error404':
                throw new Exception("Erreur 404<br>Cette page n'existe pas !");
                break;
            default:
                throw new Exception("Oups, cette page n'existe pas !");
        }
    } else {
        getPageAccueil();
    }
} catch (Exception $e) {
    $title = "Page d'erreur";
    $description = "Une erreur est survenue";

    $errorMessage = $e->getMessage();
    require_once 'views/error.view.php';
}
