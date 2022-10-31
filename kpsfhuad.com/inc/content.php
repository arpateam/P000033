<?php

	if($_GET['module']=='home') { 
		include("inc/home.php");
	}elseif($_GET['module']=='404') { 
		include("inc/404.php");
	}elseif($_GET['module']=='sitemap') { 
		include("inc/sitemap.php");
	}else{
		echo "<script>window.location = '404.html';</script>";
	}

?>