<?php

class Rejected extends Controllers
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
		
		$data['prospects'] = $this->model->getProspects();
		$data['page_functions_js'] = "rejected.js";
		$this->views->getView($this, "index", $data);
	}

    public function detail($parametros)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		list($titulo, $id) = explode('-', $parametros);
		
		$data['page_functions_js'] = "rejected.js";
		$data['prospect'] = $this->model->getProspectByID($id);
		$data['staffs'] = $this->model->getStaffs();
		$data['comments'] = $this->model->getComments($id);
		$this->views->getView($this, "detail", $data);
	}

	public function delete($idProspect)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->deleteProspect($idProspect);
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
}
