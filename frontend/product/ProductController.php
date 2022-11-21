<?php

namespace covidshop\frontend\product;

use Securite;
use Slim\Routing\RouteContext;
use Slim\Http\{Response, ServerRequest as Request};


class ProductController {

	function index(Request $request, Response $response, $args): Response {
		ob_start();
		getPageAccueil();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}

	function allProducts(Request $request, Response $response, $args) {
		ob_start();
		getPageAllProducts();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}

	function product(Request $request, Response $response, $args) {
		ob_start();
		$id = Securite::secureHTML($args['id']);
		getPageProduct($id);
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}

	function admin(Request $request, Response $response, $args) {
		ob_start();
		getPageAdmin();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}

	function addProductView(Request $request, Response $response, $args) {
		ob_start();
		pageProductView();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}

	function addProductPost(Request $request, Response $response, $args) {
		ob_start();
		pageProductPost();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response->withJson(array(123));
	}

	function updateProductView(Request $request, Response $response, $args) {
		ob_start();
		$id = Securite::secureHTML($args['id']);
		pageProductUpdateView($id);
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}
	function updateProductPut(Request $request, Response $response, $args) {
		ob_start();
		$id = Securite::secureHTML($args['id']);
		pageProductUpdatePut($id);
		$html = ob_get_clean();

		$response->getBody()->write($html);
		$routeContext = RouteContext::fromRequest($request);
		$adminUrl = $routeContext->getRouteParser()->urlFor("admin"); // IMPORTANT: urlFor() pur récup les URLs associées à mes routes
		return $response->withRedirect($adminUrl); // redirection HTTP via la lib Slim HTTP (cf. composer.json)
		//return $response->withHeader("Location", $adminUrl); // redirection HTTP via API PSR-7
	}
	function deleteProduct(Request $request, Response $response, $args) {
		ob_start();
		$id = Securite::secureHTML($args['id']);
		getPageDeleteProduct($id);
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}
}
