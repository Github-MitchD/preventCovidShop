<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';
require_once('../../controllers/frontController.php');
require_once('../../controllers/backController.php');

$app = AppFactory::create();

$baseUrl = rtrim("/preventCovidShop-slim/api", "/");

$app->get("$baseUrl/", function (Request $request, Response $response, $args): Response {
    ob_start();
    getPageAccueil();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->get("$baseUrl/accueil", function (Request $request, Response $response, $args): Response {
    ob_start();
    getPageAccueil();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->get("$baseUrl/a_propos", function (Request $request, Response $response, $args) {
    ob_start();
    getPageAPropos();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->get("$baseUrl/tous_nos_produits", function (Request $request, Response $response, $args) {
    ob_start();
    getPageAllProducts();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->get("$baseUrl/voir_le_produit", function (Request $request, Response $response, $args) {
    ob_start();
    getPageProduct();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->get("$baseUrl/admin", function (Request $request, Response $response, $args) {
    ob_start();
    getPageAdmin();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->get("$baseUrl/ajouter_un_produit", function (Request $request, Response $response, $args) {
    ob_start();
    getPageProductAdd();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->get("$baseUrl/modifier_un_produit", function (Request $request, Response $response, $args) {
    ob_start();
    getPageProductUpdate();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->get("$baseUrl/supprimer_produit", function (Request $request, Response $response, $args) {
    ob_start();
    getPageDeleteProduct();
    $html = ob_get_clean();
    $response->getBody()->write($html);
    return $response;
});

$app->run();
