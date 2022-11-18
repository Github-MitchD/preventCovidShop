<?php

namespace covidshop\frontend\product;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

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
		getPageProduct();
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
	function addProduct(Request $request, Response $response, $args) {
		ob_start();
		getPageProductAdd();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}
	function updateProduct(Request $request, Response $response, $args) {
		ob_start();
		getPageProductUpdate();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}
	function deleteProduct(Request $request, Response $response, $args) {
		ob_start();
		getPageDeleteProduct();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}
}
