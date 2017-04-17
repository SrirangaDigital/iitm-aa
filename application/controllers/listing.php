<?php


class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

	}

	public function byyear() {

		$data = $this->model->listYears();
		($data) ? $this->view('listing/years', $data) : $this->view('error/index');
	}
	
	public function byname() {

		$data = $this->model->listNames();
		($data) ? $this->view('listing/names', $data) : $this->view('error/index');
	}

	public function awardees($year_awarded = '') {

		$data = $this->model->listAwardeesInYear($year_awarded);
		($data) ? $this->view('listing/awardeesinyear', $data) : $this->view('error/index');
	}
}

?>
