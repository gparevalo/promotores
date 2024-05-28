<?php

class Staffs extends Controllers
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

		if ($_SESSION['usuario']['rolStaff'] != "Administrador") {
            header("Location: " . base_url());
            exit();
        }
		
		$data['staffs'] = $this->model->getStaffs();
		$data['page_functions_js'] = "staffs.js";
		$this->views->getView($this, "index", $data);
	}

	public function agregarStaff() 
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->addStaff();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function editarStaff($idStaff)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->editStaff($idStaff);
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function delete($idStaff)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->deleteStaff($idStaff);
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function sendEmail($parametros)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		list($correo, $clave) = explode('-', $parametros);
		$response = $this->model->sendEmail($correo, $clave);
		header("Location: " . base_url() . "/Personal");
	}
}
