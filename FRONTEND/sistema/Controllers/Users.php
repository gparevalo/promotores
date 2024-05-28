<?php

class Users extends Controllers
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
		
		$data['users'] = $this->model->getUsers();
		$data['page_functions_js'] = "users.js";
		$this->views->getView($this, "index", $data);
	}

	public function agregarUser() 
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->addUser();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function editarUser($idUser)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->editUser($idUser);
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	public function delete($idUser)
	{
		if (!isset($_SESSION['usuario'])) {
            header("Location: " . base_url());
            exit();
        }
		$response = $this->model->deleteUser($idUser);
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
		header("Location: " . base_url() . "/Usuarios");
	}
}
