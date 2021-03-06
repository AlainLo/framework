<?php
// controller/controller.php

class Controller
{
	public function handleRequest()
	{
		require('model/model2.php');
		$exploded = explode('/', $_SERVER['REQUEST_URI']);
		$controller = $exploded[1];
		$method = $exploded[2];

		require('controller/' . $controller . '.php');
		// ContactController     Contact       Controller
		$controller = ucfirst($controller) . 'Controller';
		$controller = new $controller;
		$controller->$method();
	}

	public function render($view)
	{
		$chemin_view = 'view/' . str_replace('.', '/', $view) . '.php';
		require($chemin_view);
	}
}

?>