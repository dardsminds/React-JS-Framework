<?php

namespace JavascriptFrameworks\React;

use JavascriptFrameworks\React\Views\HomeView;
/**
 * ViewBuilder
 */
class ViewBuilder
{

	/**
	 * build and return homeView
	 *
	 * @return HomeView
	 */
	public function buildHomeView()
	{
		return new HomeView();
	}

}
