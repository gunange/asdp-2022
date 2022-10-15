
<ul>
	<li class="header-menu">
		<span>Home</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>Main">
			<i class="bi bi-grid"></i>
			<span>Dashboard</span>
		</a>
	</li>
	
	<li class="header-menu">
		<span>History</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>BbmKapalListTahun">
			<i class="bi bi-grid"></i>
			<span>BBM Kapal</span>
		</a>
	</li>
	<li class="header-menu">
		<span>Invoice</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>ExampleCrud">
			<i class="bi bi-grid"></i>
			<span>Data Sandar</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>ExampleCrud">
			<i class="bi bi-grid"></i>
			<span>Air Tawar</span>
		</a>
	</li>

	
	<li class="header-menu">
		<span>Delayed</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>ExampleCrud">
			<i class="bi bi-grid"></i>
			<span>Data Sandar</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>ExampleCrud">
			<i class="bi bi-grid"></i>
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