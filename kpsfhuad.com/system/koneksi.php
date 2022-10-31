<?php
	$DB_host = "localhost"; // SERVER
	$DB_name = "u7710791_kpsfhuad"; // NAMA DATA BASE
	$DB_user = "u7710791_arpateam"; // USER DATA BASE SERVER
	$DB_pass = "Dec,212021AldiAdel***"; // PASWORD SERVER

	// KONEKSI PDO MYSQL
	try
	{
		$pdo= new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo  "
				<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Terjadi kesalahan !</strong> Koneksi Ke Database Terputus, Hubungi Administrator
				</div>";
	}
?>
