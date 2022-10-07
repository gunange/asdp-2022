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
		<span>Pengelolahan</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>ExampleCrud">
			<i class="bi bi-grid"></i>
			<span>User</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>ExampleCrud">
			<i class="bi bi-grid"></i>
			<span>Kapal</span>
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