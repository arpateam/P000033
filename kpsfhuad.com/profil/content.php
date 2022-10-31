<?php

	if($_GET['module']=='profil') { 
		include("profil.php");
	}elseif($_GET['module']=='read-profil') { 
		include("read.php");
	}else{
		echo "<script>window.location = '../404.html';</script>";
	}

?>