<?php

	if($_GET['module']=='berita') { 
		include("berita.php");
	}elseif($_GET['module']=='read-berita') { 
		include("read.php");
	}else{
		echo "<script>window.location = '../404.html';</script>";
	}

?>