<?php

	if($_GET['module']=='alumni') { 
		include("alumni.php");
	}else{
		echo "<script>window.location = '../404.html';</script>";
	}

?>