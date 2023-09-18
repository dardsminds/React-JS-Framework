<?php

namespace JavascriptFrameworks\React;

use GuzzleHttp\Psr7\ServerRequest;
use JavascriptFrameworks\React\WebApplication;

class ApplicationBuilder
{
	public function buildWebApplication()
	{
		$request = $this->buildServerRequest();

		return new WebApplication($request);
	}

	private function buildServerRequest()
	{
		return ServerRequest::fromGlobals();
	}
}
