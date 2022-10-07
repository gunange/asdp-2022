<div class="page-not-found">
	<img src="<?= BaseAssets ?>/icon/not-found.png">
	<p>
		<?php 
		if ($this->debugUrl):
				echo "Tidak dapat menemukan file " . $this->dirViews . "dashboard/" . $this->dPage . $view .".php" ;
			endif;
		?>
	</p>
</div>