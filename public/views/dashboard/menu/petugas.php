<ul>
	<li class="header-menu">
		<span>Pengolahan</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>BbmKapal">
			<i class="bi bi-grid"></i>
			<span>BBM Kapal</span>
		</a>
	</li>

	<li>
		<a href="<?= $this->gLink ?>ExampleCrud">
			<i class="bi bi-grid"></i>
			<span>Sandar</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>AirTawar">
			<i class="bi bi-grid"></i>
			<span>Air Tawar</span>
		</a>
	</li>

	<li class="header-menu">
		<span>Invoice</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>InvoiceDataSandar">
			<i class="bi bi-receipt-cutoff"></i>
			<span>Data Sandar</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>InvoiceAirTawar">
			<i class="bi bi-receipt-cutoff"></i>
			<span>Air Tawar</span>
		</a>
	</li>

	<li class="header-menu">
		<span>Delayed</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>DelayedDataSandar">
			<i class="bi bi-file-earmark-excel-fill"></i>
			<span>Data Sandar</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>DelayedAirTawar">
			<i class="bi bi-file-earmark-excel-fill"></i>
			<span>Air Tawar</span>
		</a>
	</li>


	<li class="header-menu">
		<span>Pengaturan</span>
	</li>
	<li>
		<a href="#" onclick="openModalShow('#modal-center', '<?= $this->gLink ?>AccountSetting/<?= $this->model->getLink() ?>')">
			<i class="bi bi-grid"></i>
			<span>Akun</span>
		</a>
	</li>

</ul>