<?php

	if($_GET['module']=='dashboard'){
		include("inc/dashboard.php");
	}elseif($_GET['module']=='slider'){
		include("inc/slider.php");
	}elseif($_GET['module']=='daftar-ketua'){
		include("inc/daftar-ketua.php");
	}elseif($_GET['module']=='profil'){
		include("inc/profil.php");
	}elseif($_GET['module']=='galeri-kegiatan'){
		include("inc/galeri-kegiatan.php");
	}elseif($_GET['module']=='prestasi'){
		include("inc/prestasi.php");
	}elseif($_GET['module']=='berita'){
		include("inc/berita.php");
	}elseif($_GET['module']=='pengumuman'){
		include("inc/pengumuman.php");
	}elseif($_GET['module']=='alumni'){
		include("inc/alumni.php");
	}elseif($_GET['module']=='file-download'){
		include("inc/file-download.php");
	}elseif($_GET['module']=='halaman'){
		include("inc/pages.php");
	}elseif($_GET['module']=='data-admin'){
		include("inc/admin-data.php");
	}elseif($_GET['module']=='pengaturan'){
		include("inc/settings.php");
	}elseif($_GET['module']=='sitemap-one'){
		include("inc/sitemap1.php");
	}
	
	else{
		include("inc/logout-edit.php");
		// var_dump($_GET);
	}