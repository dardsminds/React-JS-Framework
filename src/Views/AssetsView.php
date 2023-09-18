<?php

namespace JavascriptFrameworks\React\Views;

/**
 * Home View
 *
 */
class AssetsView
{
	public function __construct()
	{

	}

	/**
	 * get the CSS page layout style output
	 *
	 * @return void
	 */
	public static function getCssOutput()
	{
		return '
		<style>
		body {
			height: 100%;
			font-family: Arial, Helvetica, sans-serif;
		}
		.main {
			display: block;
			width: 100%;
			height: 100%;
		}
		.chart {
			display: block;
			float: left;
			width: 50%;
			height: 700px;
			padding: 5px;
		}

		.list_view {
			display: block;
			float: left;
			width: 45%;
			height: 700px;
			padding: 5px;
		}

		.list_view div {
			display: block;
			width: 100%;
			height: 700px;
			overflow-y: scroll;
		}

		#randomize_button {
			margin-top:50px;
			margin-left: 45%;
		}

		</style>
		';
	}
}
