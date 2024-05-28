<?php

class Staffs extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['staffs'] = $this->model->getStaffs();
		$data['page_functions_js'] = "staffs.js";
		$this->views->getView($this, "index", $data);
	}

    public function detail($parametros)
	{
		list($titulo, $id) = explode('-', $parametros);

		$data['prospect'] = $this->model->getStaffByID($id);
		$data['promoters'] = $this->model->getPromoters();
		$this->views->getView($this, "detail", $data);
	}

	public function agregarStaff() 
	{
		$response = $this->model->addStaff();
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
}
