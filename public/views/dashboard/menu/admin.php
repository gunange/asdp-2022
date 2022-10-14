<ul>
	<li class="header-menu">
		<span>Users</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>Petugas">
			<i class="bi bi-people-fill"></i>
			<span>Petugas</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>Kabid">
			<i class="bi bi-person-workspace"></i>
			<span>Master Monitoring</span>
		</a>
	</li>
	<li class="header-menu">
		<span>Management</span>
	</li>
	<li>
		<a href="<?= $this->gLink ?>Kapal">
			<i class="bi bi-grid"></i>
			<span>Kapal</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>Dermaga">
			<i class="bi bi-grid"></i>
			<span>Dermaga</span>
		</a>
	</li>
	<li>
		<a href="<?= $this->gLink ?>JenisTanki">
			<i class="bi bi-grid"></i>
			<span>Jenis Tanki</span>
		</a>
	</li>

	<li class="header-menu">
		<span>Pengaturan</span>
	</li>
	<li>
		<a href="#" onclick="openModalShow('#modal-center', '<?= $this->gLink ?>AccountSetting/<?= $this->model->getLink() ?>')">
			<i class="bi bi-person-bounding-box"></i>
			<span>Akun</span>
		</a>
	</li>

</ul>