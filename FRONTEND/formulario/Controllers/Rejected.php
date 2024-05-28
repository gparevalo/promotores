<?php

class Rejected extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['prospects'] = $this->model->getProspects();
		$data['page_functions_js'] = "rejected.js";
		$this->views->getView($this, "index", $data);
	}

    public function detail($parametros)
	{
		list($titulo, $id) = explode('-', $parametros);
		
		$data['page_functions_js'] = "rejected.js";
		$data['prospect'] = $this->model->getProspectByID($id);
		$data['staffs'] = $this->model->getStaffs();
		$this->views->getView($this, "detail", $data);
	}
}
