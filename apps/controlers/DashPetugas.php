
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
		$this->viewDashboard('bbm-kapal');
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
	public function InvoiceDataSandar()
	{
		$this->viewDashboard('invoicedatasandar');
	}
	public function DelayedDataSandar()
	{
		$this->viewDashboard('delayeddatasandar');
	}

	public function BbmKapal()
	{
		$this->viewDashboard('bbm-kapal');
	}
	public function PostFormTangkiBbmKapal()
	{
		$this->model->AddBbmTangki();
	}
	public function Sandar()
	{
		$this->viewDashboard('sandar');
	}
}
