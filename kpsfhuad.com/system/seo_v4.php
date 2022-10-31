<?php

$author		= $link3;

$default 	= $namaweb;
$default3 	= $link3;
$default4 	= $link1;

if(($_GET['module']=='home') OR ($_GET['module']=='404') OR ($_GET['module']=='sitemap') OR ($_GET['module']=='profil') OR ($_GET['module']=='galeri-kegiatan') OR ($_GET['module']=='nmcc') OR ($_GET['module']=='imcc') OR ($_GET['module']=='proker') OR ($_GET['module']=='prestasi') OR ($_GET['module']=='berita') OR ($_GET['module']=='pengumuman') OR ($_GET['module']=='alumni') OR ($_GET['module']=='file-download-kps') OR ($_GET['module']=='daftar-ketua')){
	$tseo = $pdo->query("SELECT title, keyword, description FROM page WHERE id_page='$_GET[id]'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);
	
	$title = "$seo[title]";
	$keyword = "$seo[keyword]";
	$description = "$seo[description]";
	
	$imageshare = "assets/images/default-share.jpg";
	$urlshare = $default4;
}elseif($_GET['module']=='read-profil'){
	$Detail 		= $pdo->query("SELECT gambar,title,keyword,description,seo FROM konten_profil WHERE seo='$_GET[judul_seo]'");
	$tDetail 		= $Detail->fetch(PDO::FETCH_ASSOC);

	$title 			= "$tDetail[title]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$tDetail[description]";
	
	$imageshare 	= "assets/images/konten-profil/$tDetail[gambar]";
	$urlshare 		= "$default4/konten-profil/$tDetail[seo].html";
}elseif($_GET['module']=='read-galeri-kegiatan'){
	$Detail 		= $pdo->query("SELECT foto,title,keyword,description,seo FROM galeri_kegiatan WHERE seo='$_GET[judul_seo]'");
	$tDetail 		= $Detail->fetch(PDO::FETCH_ASSOC);

	$title 			= "$tDetail[title]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$tDetail[description]";
	
	$imageshare 	= "assets/images/galeri-kegiatan/small/$tDetail[foto]";
	$urlshare 		= "$default4/galeri-kegiatan/$tDetail[seo].html";
}elseif($_GET['module']=='read-prestasi'){
	$Detail 		= $pdo->query("SELECT gambar,title,keyword,description,seo FROM prestasi WHERE seo='$_GET[judul_seo]'");
	$tDetail 		= $Detail->fetch(PDO::FETCH_ASSOC);

	$title 			= "$tDetail[title]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$tDetail[description]";
	
	$imageshare 	= "assets/images/prestasi/small/$tDetail[gambar]";
	$urlshare 		= "$default4/prestasi/$tDetail[seo].html";
}elseif($_GET['module']=='read-berita'){
	$Detail 		= $pdo->query("SELECT gambar,title,keyword,description,seo FROM berita WHERE seo='$_GET[judul_seo]'");
	$tDetail 		= $Detail->fetch(PDO::FETCH_ASSOC);

	$title 			= "$tDetail[title]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$tDetail[description]";
	
	$imageshare 	= "assets/images/berita/small/$tDetail[gambar]";
	$urlshare 		= "$default4/berita/$tDetail[seo].html";
}elseif($_GET['module']=='read-pengumuman'){
	$Detail 		= $pdo->query("SELECT gambar,title,keyword,description,seo FROM pengumuman WHERE seo='$_GET[judul_seo]'");
	$tDetail 		= $Detail->fetch(PDO::FETCH_ASSOC);

	$title 			= "$tDetail[title]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$tDetail[description]";
	
	$imageshare 	= "assets/images/pengumuman/small/$tDetail[gambar]";
	$urlshare 		= "$default4/pengumuman/$tDetail[seo].html";
}elseif($_GET['module']=='read-alumni'){
	$Detail 		= $pdo->query("SELECT gambar,title,keyword,description,seo FROM alumni WHERE seo='$_GET[judul_seo]'");
	$tDetail 		= $Detail->fetch(PDO::FETCH_ASSOC);

	$title 			= "$tDetail[title]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$tDetail[description]";
	
	$imageshare 	= "assets/images/alumni/small/$tDetail[gambar]";
	$urlshare 		= "$default4/alumni/$tDetail[seo].html";
}elseif($_GET['module']=='read-daftar-ketua'){
	$Detail 		= $pdo->query("SELECT foto,title,keyword,description,seo FROM daftar_ketua WHERE seo='$_GET[judul_seo]'");
	$tDetail 		= $Detail->fetch(PDO::FETCH_ASSOC);

	$title 			= "$tDetail[title]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$tDetail[description]";
	
	$imageshare 	= "assets/images/daftar-ketua/$tDetail[foto]";
	$urlshare 		= "$default4/daftar-ketua/$tDetail[seo].html";
}else{
	$tseo = $pdo->query("SELECT title, keyword, description FROM page WHERE id_page='0'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);

	$title = "$seo[title]";
	$keyword = "$seo[keyword]";
	$description = "$seo[description]";
	
	$imageshare = "assets/images/default-share.jpg";
	$urlshare = $default4;
}
?>
	<meta charset="utf-8">

	<head><meta name="google" content="notranslate" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">

	<meta name="googlebot" content="index,follow">
	<meta name="googlebot-news" content="index,follow">
	<meta name="robots" content="index,follow">
	<meta name="Slurp" content="all">

	<!-- Tempat verivikasi search console -->

	<!-- index ke google, bing & yahoo saja -->

	<!-- Tempat verivikasi search console -->

	<title><?= $title; ?></title>

	<meta name="keywords" content="<?= $keyword; ?>">
	<meta name="description" content="<?= $description; ?>">

	<!-- Untuk Facebook -->

	<meta property="fb:app_id" content="184663602948248">

	<!-- Untuk Facebook -->

	<!-- Untuk Twitter -->

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="<?= $default; ?>" />
	<meta name="twitter:creator" content="<?= $author; ?>" />

	<!-- Untuk Twitter -->

	<meta property="og:url" content="<?= $urlshare; ?>">
	<meta property="og:type" content="article">
	<meta property="og:title" content="<?= $title; ?>">
	<meta property="og:description" content="<?= $description; ?>">
	<meta property="og:site_name" content="<?= $default; ?>">
	  
	<meta name="image_src" content="<?= $default4; ?>/<?= $imageshare; ?>">
	<meta property="og:image" content="<?= $default4; ?>/<?= $imageshare; ?>">
	<meta property="og:image:alt" content="Gambar <?= $title; ?>">
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="480" />
	<meta property="og:image:height" content="269" />
		
	<link rel="canonical" href="<?= $urlshare; ?>">
	<link rel="shortlink" href="<?= $default3; ?>">