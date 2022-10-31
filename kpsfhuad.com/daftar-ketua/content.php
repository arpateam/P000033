<?php

	if($_GET['module']=='daftar-ketua') { 
		include("daftar-ketua.php");
	}elseif($_GET['module']=='read-daftar-ketua') { 
		include("read.php");
	}else{
		echo "<script>window.location = '../404.html';</script>";
	}

?>