<?php

namespace JavascriptFrameworks\React;

use GuzzleHttp\Psr7\ServerRequest;

class WebApplication
{
	public function __construct(ServerRequest $request)
	{
		$this->request = $request;
	}

	public function handle(ServerRequest $request)
	{
		$uri = $request->getUri();
		$path = $uri->getPath();
		$query = $request->getQueryParams();
		$method = $request->getMethod();

		$view_builder = new ViewBuilder;
		$factory = new Factory();
		$provider = new Provider([]);
		$service = new Service($factory, $provider);

		$path_segments = explode('/', $path);
		$route = $path_segments[1];

		$output_str = "";
		switch ($route)
		{
			case 'get-car-make':
				$car_make = $service->getCarMakeList();
				$output_str = json_encode($car_make);
				break;
			default:
				$output_str = $view_builder->buildHomeView()->getHtmlOutput();
				break;
		}

		return $output_str;
	}

	public function run()
	{
		$response_str = $this->handle($this->request);

		echo $response_str;
	}
}
