<?php

class Promoter extends Controllers
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

		$idPromoter = $_SESSION['usuario']['idStaff'];
		$data['prospects'] = $this->model->getProspects($idPromoter);
		$data['page_functions_js'] = "promoter.js";

		$this->views->getView($this, "index", $data);
	}

	public function detail($parametros)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		list($titulo, $id) = explode('-', $parametros);
		
		$data['page_functions_js'] = "promoter.js";
		$data['prospect'] = $this->model->getProspectByID($id);
		$data['staffs'] = $this->model->getStaffs();
		$data['comments'] = $this->model->getComments($id);
		$this->views->getView($this, "detail", $data);
	}

	public function agregarProspect()
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->agregarProspect();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function addComments() 
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->addComments();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

}
