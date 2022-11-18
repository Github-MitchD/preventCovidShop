<?php
namespace covidshop\frontend\page;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PageController {

	function about(Request $request, Response $response): Response {
		ob_start();
		getPageAPropos();
		$html = ob_get_clean();
		$response->getBody()->write($html);
		return $response;
	}
}
