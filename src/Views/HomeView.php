<?php

namespace JavascriptFrameworks\React\Views;


/**
 * Home View
 *
 */
class HomeView
{
	public function __construct()
	{

	}

	/**
	 * @method getHtmlOutPut this will return an HTML formated text
	 *
	 * @return html
	 */
	public function getHtmlOutput()
	{
		$this->getOutput();		// get the processed html contents, this includes CSS and JS

		return $this->output;	// this will just return whatever the value of $output property.
	}

	/**
	 * Get Javascript output
	 *
	 * @return javascript
	 */
	private function getReactJsOutput()
	{
		return '
		<script>
		</script>
		';
	}

	/**
	 * Get configuration for RequireJS
	 *
	 * @return array
	 */
	private function getRequireJsConfig()
	{
		$requirejs_config = [
			'baseUrl' => '/js',
			'waitSeconds' => 30, // number of seconds to wait before timing out script loading
			'urlArgs' => 'v=1',
			'paths' => [
				'react'         => 'https://unpkg.com/react@17/umd/react.development',
				'react-dom'     => 'https://unpkg.com/react-dom@17/umd/react-dom.development',
				'chartjs'		=> 'https://cdn.jsdelivr.net/npm/chart',
				'babel'			=> 'https://unpkg.com/babel-standalone@6.26.0/babel',
				'chartdemo'     => 'chartdemo',
				'button'     	=> 'button',
				'data_service'  => 'data_service',
				'car_makes'  	=> 'car_makes'
			],
			'scriptType' => 'application/javascript'
		];

		// just add some random args for cache buster
		$requirejs_config['urlArgs'] = 'v=1'.rand(100, 9999);

		return json_encode($requirejs_config);
	}

	/**
	 * getOutput function assemble css, js, and the html content
	 *
	 * @return html
	 */
	private function getOutput()
	{
		if (!isset($this->output)) {
			$this->output = '
<!doctype html>
<html lang="en"> 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="ReactJS Demo">
		<title>ReactJs Demo</title>
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
		' . AssetsView::getCssOutput() . '
	</head>
	<body>
		<h3>ReactJS Demo</h3>

		<div class="main";>
			<div class="chart">
				<p>Control the chart with button click using ReactJs</p>
				<canvas id="myChart"></canvas>
				<div id="randomize_button"></div>
			</div>
			<div class="list_view">
				<p>Fetch data from backend with PHP and MySql</p>
				<div id="car_make_list"></div>
			</div>
		</div>

		<script
			src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"
			integrity="sha512-c3Nl8+7g4LMSTdrm621y7kf9v3SDPnhxLNhcjFJbKECVnmZHTdo+IRO05sNLTH/D3vA6u1X32ehoLC7WFVdheg=="
			crossorigin="anonymous"
		></script>

		<script type="text/javascript">
			requirejs.config(' . $this->getRequireJsConfig() . ');
			require(["chartdemo", "car_makes"], function(chart_demo, car_makes) {

			});
		</script>


	</body>
</html>
';
		}
		return $this->output;
	}
}
