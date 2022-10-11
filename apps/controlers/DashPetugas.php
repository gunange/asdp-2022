
<?php

class DashPetugas extends Controler
{
	protected
		$dPage = "pages/petugas/",
		$fMenu = "dashboard/menu/petugas.php",

		$gLink = BasePetugas,
		$srcBerkas;

	protected $model, $user, $setPage;
	public
		$id,
		$data = [];

	use ComponentDash,  ComponentPetugas;

	public function __construct()
	{
		$this->model = $this->model('ModelPetugas');
		$this->user = $this->model->user;
	}

	public function Main()
	{
		$this->viewDashboard('dashboard');
	}

	public function AirTawar()
	{
		$this->viewDashboard('airtawar');
	}
	public function BbmKapal()
	{
		$this->viewDashboard('bbm-kapal');
	}
}
