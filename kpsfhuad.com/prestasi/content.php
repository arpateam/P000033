<?php

	if($_GET['module']=='prestasi') { 
		include("prestasi.php");
	}elseif($_GET['module']=='read-prestasi') { 
		include("read.php");
	}else{
		echo "<script>window.location = '../404.html';</script>";
	}

?>