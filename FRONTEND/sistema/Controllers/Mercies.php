<?php

class Mercies extends Controllers
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
		
		$data['mercies'] = $this->model->getMercies();
		$data['page_functions_js'] = "mercies.js";
		$this->views->getView($this, "index", $data);
	}

    public function detail($parametros)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		list($titulo, $id) = explode('-', $parametros);
		
		$data['page_functions_js'] = "mercies.js";
		$data['mercie'] = $this->model->getMercieByID($id);
		$data['staffs'] = $this->model->getStaffs();
		$data['comments'] = $this->model->getComments($id);
		$this->views->getView($this, "detail", $data);
	}

	public function sendRejected()
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->sendRejectedMercie();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function delete($idMercie)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->deleteMercie($idMercie);
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
}
