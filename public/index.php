<?php
use covidshop\frontend\page\PageController;
use covidshop\frontend\product\ProductController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require_once('../controllers/frontController.php');
require_once('../controllers/backController.php');

$app = AppFactory::create();

$baseUrl = rtrim("/preventCovidShop-slim", "/");

$app->get("$baseUrl/", [ProductController::class, 'index']);
$app->get("$baseUrl/accueil", [ProductController::class, 'index']);
$app->get("$baseUrl/a_propos", [PageController::class, 'about']);
$app->get("$baseUrl/tous_nos_produits", [ProductController::class, 'allProducts']);
$app->get("$baseUrl/voir_le_produit/{id:[0-9]+}", [ProductController::class, 'product']);
$app->get("$baseUrl/admin", [ProductController::class, 'admin']);
$app->get("$baseUrl/ajouter_un_produit", [ProductController::class, 'addProduct']);
$app->get("$baseUrl/modifier_un_produit", [ProductController::class, 'updateProduct']);
$app->get("$baseUrl/supprimer_produit", [ProductController::class, 'deleteProduct']);

$app->run();
