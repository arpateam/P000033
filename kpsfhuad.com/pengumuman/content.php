<?php

	if($_GET['module']=='pengumuman') { 
		include("pengumuman.php");
	}elseif($_GET['module']=='read-pengumuman') { 
		include("read.php");
	}else{
		echo "<script>window.location = '../404.html';</script>";
	}

?>