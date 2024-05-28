<?php

class Home extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['promoters'] = $this->model->getPromoters();
		$data['page_functions_js'] = "home.js";

		$this->views->getView($this, "home", $data);
	}

	public function agregarProspect() 
	{
		$response = $this->model->addProspect();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
}
