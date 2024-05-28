<?php

class Home extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		
		$data['promoters'] = $this->model->getPromoters();
		$data['page_functions_js'] = "home.js";

		$this->views->getView($this, "home", $data);
	}

	public function agregarProspect() 
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->addProspect();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function sendRejected() 
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->sendRejectedProspect();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function pasarComercio($id) 
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->pasarComercio($id);
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
}
