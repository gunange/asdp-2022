
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

		if (!isset($_SESSION['shiftPetugas']) && is_null(@$_SESSION['shiftPetugas']) ):
			if(!isset($_POST['post_shift'])):
				$this->viewDash('settings/constructor');
			endif;
		endif;
		 
	}

	public function Main()
	{
		// $this->viewDashboard('bbm-kapal');
		$this->viewDashboard('airtawar');
	}

	public function AirTawar()
	{
		$this->viewDashboard('airtawar');
	}
	public function InvoiceAirTawar()
	{
		$this->viewDashboard('invoiceairtawar');
	}
	public function DelayedAirTawar()
	{
		$this->viewDashboard('delayedairtawar');
	}


	public function PostFormDokumen()
	{
		$this->model->AddDokumen();
	}
}
