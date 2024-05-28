<?php

class Login extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $data['promoters'] = $this->model->getPromoters();
		$data['page_functions_js'] = "login.js";
		$this->views->getView($this, "index", $data);
	}

	public function validar()
	{
		$response = $this->model->validar();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	function logout()
	{
		session_destroy();
		header("Location: " . base_url());
		exit();
	}
}
