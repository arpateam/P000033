<?php

	if($_GET['module']=='galeri-kegiatan') { 
		include("galeri-kegiatan.php");
	}elseif($_GET['module']=='nmcc') { 
		include("nmcc.php");
	}elseif($_GET['module']=='imcc') { 
		include("imcc.php");
	}elseif($_GET['module']=='proker') { 
		include("proker.php");
	}elseif($_GET['module']=='read-galeri-kegiatan') { 
		include("read.php");
	}else{
		echo "<script>window.location = '../404.html';</script>";
	}

?>