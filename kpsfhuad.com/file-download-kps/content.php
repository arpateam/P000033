<?php

	if($_GET['module']=='file-download-kps') { 
		include("file-download-kps.php");
	}else{
		echo "<script>window.location = '../404.html';</script>";
	}

?>