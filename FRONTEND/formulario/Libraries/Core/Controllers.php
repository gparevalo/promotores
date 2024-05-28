<?php

class Controllers
{
	public $views;
	public $model;

	public function __construct()
	{
		session_start();

		$this->views = new Views();
		$this->loadModel();
	}

	public function loadModel()
	{
		$controllerName = get_class($this);
		$modelName = $controllerName . 'Model';
		$modelFilePath = "Models/" . $modelName . ".php";

		if (file_exists($modelFilePath)) {
			require_once($modelFilePath);

			if (class_exists($modelName)) {
				$this->model = new $modelName();
			} else {
				die("Error: Class $modelName not found in $modelFilePath");
			}
		} else {
			die("Error: Model file $modelFilePath not found");
		}
	}
}
