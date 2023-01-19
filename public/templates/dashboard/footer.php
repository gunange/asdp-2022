</div><!-- container-xxl -->

</div><!-- content -->

</div><!-- body-content -->
</div><!-- page-content-wrapper -->
</div>

<script>
	
   function setNotif() {
   		var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
        	toastEl.classList.add('fadeInUp')
        
          return new bootstrap.Toast(toastEl) 
        });
       toastList.forEach(toast => toast.show());
   }
   function getNotif(){
			replaceHtml('#outputNotif', '<?= $this->gLink ?>GetNotif', ()=>{setNotif()})
		}
</script>
<?php 
if($_SESSION['showNotif'] == 1 ):
	if ($this->user->id_level == 3  ):
		if (isset($_SESSION['shiftPetugas']) && !is_null(@$_SESSION['shiftPetugas'])):
			echo "<script>
		setTimeout(()=>{getNotif();}, 1800)
		</script>";
		$_SESSION['showNotif'] = 0 ;
	endif;
else:
	echo "<script>
	setTimeout(()=>{getNotif();}, 1800)
	</script>";
	$_SESSION['showNotif'] = 0 ;
endif;
endif;
?>



<div id="outputNotif" class="toast-container position-fixed bottom-0 end-0">
	
</div>
<script type="text/javascript" src="<?= BaseAssets ?>js/app-dashboard.js"></script>
<script>
	
</script>
</body>
</html>