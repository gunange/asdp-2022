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
	<li>
		<a href="<?= $this->gLink ?>DashboardEmpatRow">
			<i class="bi bi-grid"></i>
			<span>Dashboard 4 Row</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>DashboardChart">
			<i class="bi bi-grid"></i>
			<span>Dashboard Chart</span>
		</a>
	</li>
	<li class="header-menu">
		<span>Example</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>ExampleCrud">
			<i class="bi bi-grid"></i>
			<span>CRUD</span>
		</a>
	</li>
	

	<li>
		<a href="#!" class="sidebar-link">
			<i class="bi bi-grid"></i>
			<span>Menu Subs</span>
			<span class="badge badge-pill">100</span>
		</a>
		<div class="sidebar-submenu collapse">
			<ul>
				<li>
					<a href="<?= $this->gLink ?>Main">Submenu 1
						<span class="badge badge-pill badge-dark">10</span>
					</a>
				</li>
				<li>
					<a href="<?= $this->gLink ?>Main">Submenu 2
						<span class="badge badge-pill badge-dark">7</span>
					</a>
				</li>
			</ul>
		</div>
	</li>

	<li>
		<a href="#!" class="sidebar-link">
			<i class="bi bi-grid"></i>
			<span>Menu Subs</span>
			<span class="badge badge-pill dark">0</span>
		</a>
		<div class="sidebar-submenu collapse">
			<ul>
				<li>
					<a href="<?= $this->gLink ?>Main">Submenu 1
						<span class="badge badge-pill badge-dark">10</span>
					</a>
				</li>
				<li>
					<a href="<?= $this->gLink ?>Main">Submenu 2
						<span class="badge badge-pill badge-dark">7</span>
					</a>
				</li>
			</ul>
		</div>
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