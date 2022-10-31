<?php

	$aksi 				= "inc/act-sitemap1.php";
	$hal 				= "Sitemap 1";
	$module 			= "sitemap_one";
	$database 			= "sitemap_1";
	$link 				= "sitemap-one";

	switch($_GET['act']){
		case "view":

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary"><i class="fas fa-tags"></i> <?= $hal; ?></h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="dashboard">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= $link; ?>"><?= $hal; ?></a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><u>Daftar <?= $hal; ?></u></a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Daftar <?= $hal; ?></div>
					</div>

					<div class="card-body">

						<a href="tambah-<?= $link; ?>" role="button" class="btn btn-block btn-primary mb-4"><i class="fas fa-plus-circle"></i> Tambah <?= $hal; ?></a>

						<div class="alert alert-default" role="alert">
							<?php
								$SUMpage = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='1'");
								$resultSUMpage = $SUMpage->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-default">Page 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-default font-weight-bold"><?= $resultSUMpage; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapsePage" role="button" aria-expanded="false" aria-controls="collapsePage"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-default shadow collapse" id="collapsePage">
								<div class="table-responsive">
									<table id="tabelSitemapPage" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Page = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='1'");
												while($resultPage = $Page->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultPage['loc_1']; ?></td>
												<td><?= $resultPage['lastmod_1']; ?></td>
												<td><?= $resultPage['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultPage['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-primary px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultPage['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-default">sitemappage1.php</strong> adalah <strong class="text-default"><?= rp(filesize("../sitemappage1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-primary" role="alert">
							<?php
								$SUMslider = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='2'");
								$resultSUMslider = $SUMslider->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-primary">Slider 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-primary font-weight-bold"><?= $resultSUMslider; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapseSlider" role="button" aria-expanded="false" aria-controls="collapseSlider"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-primary shadow collapse" id="collapseSlider">
								<div class="table-responsive">
									<table id="tabelSitemapSlider" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Slider = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='2'");
												while($resultSlider = $Slider->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultSlider['loc_1']; ?></td>
												<td><?= $resultSlider['lastmod_1']; ?></td>
												<td><?= $resultSlider['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultSlider['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-primary px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultSlider['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-primary">sitemapslider1.php</strong> adalah <strong class="text-primary"><?= rp(filesize("../sitemapslider1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-secondary" role="alert">
							<?php
								$SUMDaftarKetua = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='3'");
								$resultSUMDaftarKetua = $SUMDaftarKetua->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-secondary">Daftar Ketua 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-secondary font-weight-bold"><?= $resultSUMDaftarKetua; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapseDaftarKetua" role="button" aria-expanded="false" aria-controls="collapseDaftarKetua"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-secondary shadow collapse" id="collapseDaftarKetua">
								<div class="table-responsive">
									<table id="tabelSitemapDaftarKetua" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$DaftarKetua = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='3'");
												while($resultDaftarKetua = $DaftarKetua->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultDaftarKetua['loc_1']; ?></td>
												<td><?= $resultDaftarKetua['lastmod_1']; ?></td>
												<td><?= $resultDaftarKetua['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultDaftarKetua['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-secondary px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultDaftarKetua['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-secondary">sitemapdaftarketua1.php</strong> adalah <strong class="text-secondary"><?= rp(filesize("../sitemapdaftarketua1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-info" role="alert">
							<?php
								$SUMprofil = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='4'");
								$resultSUMprofil = $SUMprofil->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-info">Profil 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-info font-weight-bold"><?= $resultSUMprofil; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapseProfil" role="button" aria-expanded="false" aria-controls="collapseProfil"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-info shadow collapse" id="collapseProfil">
								<div class="table-responsive">
									<table id="tabelSitemapProfil" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Profil = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='4'");
												while($resultProfil = $Profil->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultProfil['loc_1']; ?></td>
												<td><?= $resultProfil['lastmod_1']; ?></td>
												<td><?= $resultProfil['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultProfil['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-info px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultProfil['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-info">sitemapprofil1.php</strong> adalah <strong class="text-info"><?= rp(filesize("../sitemapprofil1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-success" role="alert">
							<?php
								$SUMGaleriKegiatan = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='5'");
								$resultSUMGaleriKegiatan = $SUMGaleriKegiatan->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-success">Galeri Kegiatan 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-success font-weight-bold"><?= $resultSUMGaleriKegiatan; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapseGaleriKegiatan" role="button" aria-expanded="false" aria-controls="collapseGaleriKegiatan"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-success shadow collapse" id="collapseGaleriKegiatan">
								<div class="table-responsive">
									<table id="tabelSitemapGaleriKegiatan" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$GaleriKegiatan = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='5'");
												while($resultGaleriKegiatan = $GaleriKegiatan->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultGaleriKegiatan['loc_1']; ?></td>
												<td><?= $resultGaleriKegiatan['lastmod_1']; ?></td>
												<td><?= $resultGaleriKegiatan['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultGaleriKegiatan['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-success px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultGaleriKegiatan['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-success">sitemapgalerikegiatan1.php</strong> adalah <strong class="text-success"><?= rp(filesize("../sitemapgalerikegiatan1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-warning" role="alert">
							<?php
								$SUMPrestasi = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='6'");
								$resultSUMPrestasi = $SUMPrestasi->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-warning">Prestasi 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-warning font-weight-bold"><?= $resultSUMPrestasi; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapsePrestasi" role="button" aria-expanded="false" aria-controls="collapsePrestasi"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-warning shadow collapse" id="collapsePrestasi">
								<div class="table-responsive">
									<table id="tabelSitemapPrestasi" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Prestasi = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='6'");
												while($resultPrestasi = $Prestasi->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultPrestasi['loc_1']; ?></td>
												<td><?= $resultPrestasi['lastmod_1']; ?></td>
												<td><?= $resultPrestasi['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultPrestasi['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-warning px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultPrestasi['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-warning">sitemapprestasi1.php</strong> adalah <strong class="text-warning"><?= rp(filesize("../sitemapprestasi1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-default" role="alert">
							<?php
								$SUMFileDownload = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='8'");
								$resultSUMFileDownload = $SUMFileDownload->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-default">File Download 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-default font-weight-bold"><?= $resultSUMFileDownload; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapseFileDownload" role="button" aria-expanded="false" aria-controls="collapseFileDownload"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-default shadow collapse" id="collapseFileDownload">
								<div class="table-responsive">
									<table id="tabelSitemapFileDownload" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$FileDownload = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='8'");
												while($resultFileDownload = $FileDownload->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultFileDownload['loc_1']; ?></td>
												<td><?= $resultFileDownload['lastmod_1']; ?></td>
												<td><?= $resultFileDownload['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultFileDownload['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-default px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultFileDownload['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-default">sitemapfiledownload1.php</strong> adalah <strong class="text-default"><?= rp(filesize("../sitemapfiledownload1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-danger" role="alert">
							<?php
								$SUMBerita = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='9'");
								$resultSUMBerita = $SUMBerita->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-danger">Berita 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-danger font-weight-bold"><?= $resultSUMBerita; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapseBerita" role="button" aria-expanded="false" aria-controls="collapseBerita"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-danger shadow collapse" id="collapseBerita">
								<div class="table-responsive">
									<table id="tabelSitemapBerita" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Berita = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='9'");
												while($resultBerita = $Berita->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultBerita['loc_1']; ?></td>
												<td><?= $resultBerita['lastmod_1']; ?></td>
												<td><?= $resultBerita['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultBerita['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultBerita['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-danger">sitemapberita1.php</strong> adalah <strong class="text-danger"><?= rp(filesize("../sitemapberita1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-primary" role="alert">
							<?php
								$SUMPengumuman = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='10'");
								$resultSUMPengumuman = $SUMPengumuman->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-primary">Pengumuman 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-primary font-weight-bold"><?= $resultSUMPengumuman; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapsePengumuman" role="button" aria-expanded="false" aria-controls="collapsePengumuman"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-primary shadow collapse" id="collapsePengumuman">
								<div class="table-responsive">
									<table id="tabelSitemapPengumuman" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Pengumuman = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='10'");
												while($resultPengumuman = $Pengumuman->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultPengumuman['loc_1']; ?></td>
												<td><?= $resultPengumuman['lastmod_1']; ?></td>
												<td><?= $resultPengumuman['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultPengumuman['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-primary px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultPengumuman['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-primary px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-primary">sitemappengumuman1.php</strong> adalah <strong class="text-primary"><?= rp(filesize("../sitemappengumuman1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

	break;
	case "add":

	$action	= "add";

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary"><i class="fas fa-tags"></i> Tambah <?= $hal; ?></h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="dashboard">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= $link; ?>"><?= $hal; ?></a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><u>Tambah <?= $hal; ?></u></a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Form Menambah <?= $hal; ?></div>
						<div class="alert alert-warning mt-4" role="alert">
						  	<i class="fas fa-exclamation-triangle"></i> Mohon isi form dibawah ini dengan lengkap & benar!
						</div>
					</div>
					<div class="card-body">
						<form action="<?= $aksi; ?>?module=<?= $module; ?>&act=<?= $action; ?>" method="POST" class="needs-validation" novalidate>

							<!--Sub-Sitemap-->
			                <div class="mb-4">
								<div class="form-group form-floating-label">
									<select class="form-control input-border-bottom" id="id_sub_sitemap" name="___in_id_sub_sitemap_special_SEMANAK" required>
										<option value="">&nbsp;</option>
										<?php

											$no=1;
											$SubSitemap = $pdo->query("SELECT * FROM sub_sitemap");
											while($resultSubSitemap = $SubSitemap->fetch(PDO::FETCH_ASSOC)){

										?>
										<option value="<?= $resultSubSitemap['id_sub_sitemap']; ?>"><?= $resultSubSitemap['judul']; ?></option>
										<?php } ?>
									</select>
									<label for="id_sub_sitemap" class="placeholder">Sub Sitemap</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon pilih sub sitemap!
							        </div>
								</div>
			                </div>

			                <!--Link/Loc-->
			                <div class="mb-4">
			                    <div class="form-group form-floating-label">
									<input id="loc" name="___in_loc_special_SEMANAK" type="text" class="form-control input-border-bottom" value="<?= $link1; ?>/" required>
									<label for="loc" class="placeholder">Link</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon masukkan link!
							        </div>
								</div>
			                </div>

							<!--Priority-->
			                <div class="mb-4">
								<div class="form-group form-floating-label">
									<select class="form-control input-border-bottom" id="priority" name="___in_priority_special_SEMANAK" required>
										<option value="">&nbsp;</option>
										<option value="1.00">1.00</option>
										<option value="0.90">0.90</option>
										<option value="0.80">0.80</option>
										<option value="0.70">0.70</option>
										<option value="0.60">0.60</option>
										<option value="0.50">0.50</option>
									</select>
									<label for="priority" class="placeholder">Priority?</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon pilih Priority!
							        </div>
								</div>
			                </div>
              
			                <!--footer button-->
			                <div class="mt-4 pt-4 border-top">
			                    <a href="<?= $link; ?>" role="button" class="btn btn-warning">
			                        <i class="fas fa-arrow-left"></i> Batal
			                    </a>
			                    <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-success">
			                        <i class="fas fa-check"></i> Selesai
			                    </button>
			                </div>
			                <!--end footer button-->

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

	break;
	case "edit":

	$queryEdit	= $pdo->query("SELECT id_$database, id_sub_sitemap, loc_1, priority_1 FROM $database WHERE id_$database='$_GET[id]'");
	$resultEdit	= $queryEdit->fetch(PDO::FETCH_ASSOC);

	$action	= "edit";

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary"><i class="fas fa-tags"></i> <?= $hal; ?></h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="dashboard">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= $link; ?>"><?= $hal; ?></a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><u>Edit <?= $hal; ?></u></a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Form Edit <?= $hal; ?></div>
						<div class="alert alert-warning mt-4" role="alert">
						  	<i class="fas fa-exclamation-triangle"></i> Mohon isi form dibawah ini dengan lengkap & benar!
						</div>
					</div>
					<div class="card-body">
						<form action="<?= $aksi; ?>?module=<?= $module; ?>&act=<?= $action; ?>" method="POST" class="needs-validation" novalidate>

							<input type="hidden" name="___in_id_sitemap_1_special_SEMANAK" value="<?= $resultEdit['id_sitemap_1']; ?>">

							<!--Sub-Sitemap-->
			                <div class="mb-4">
								<div class="form-group form-floating-label">
									<select class="form-control input-border-bottom" id="id_sub_sitemap" name="___in_id_sub_sitemap_special_SEMANAK" required>
										<option value="">&nbsp;</option>
										<?php

											$no=1;
											$SubSitemap = $pdo->query("SELECT * FROM sub_sitemap");
											while($resultSubSitemap = $SubSitemap->fetch(PDO::FETCH_ASSOC)){

										?>
										<option value="<?= $resultSubSitemap['id_sub_sitemap']; ?>" <?php if ($resultEdit['id_sub_sitemap']===$resultSubSitemap['id_sub_sitemap']) { echo "selected"; } ?>><?= $resultSubSitemap['judul']; ?></option>
										<?php } ?>
									</select>
									<label for="id_sub_sitemap" class="placeholder">Sub Sitemap</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon pilih sub sitemap!
							        </div>
								</div>
			                </div>

			                <!--Link/Loc-->
			                <div class="mb-4">
			                    <div class="form-group form-floating-label">
									<input id="loc" name="___in_loc_special_SEMANAK" type="text" class="form-control input-border-bottom" value="<?= $resultEdit['loc_1']; ?>" required>
									<label for="loc" class="placeholder">Link</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon masukkan link!
							        </div>
								</div>
			                </div>

							<!--Priority-->
			                <div class="mb-4">
								<div class="form-group form-floating-label">
									<select class="form-control input-border-bottom" id="priority" name="___in_priority_special_SEMANAK" required>
										<option value="1.00" <?php if ($resultEdit['priority_1']==="1.00") { echo "selected"; } ?>>1.00</option>
										<option value="0.90" <?php if ($resultEdit['priority_1']==="0.90") { echo "selected"; } ?>>0.90</option>
										<option value="0.80" <?php if ($resultEdit['priority_1']==="0.80") { echo "selected"; } ?>>0.80</option>
										<option value="0.70" <?php if ($resultEdit['priority_1']==="0.70") { echo "selected"; } ?>>0.70</option>
										<option value="0.60" <?php if ($resultEdit['priority_1']==="0.60") { echo "selected"; } ?>>0.60</option>
										<option value="0.50" <?php if ($resultEdit['priority_1']==="0.50") { echo "selected"; } ?>>0.50</option>
									</select>
									<label for="priority" class="placeholder">Priority?</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon pilih Priority!
							        </div>
								</div>
			                </div>
              
			                <!--footer button-->
			                <div class="mt-4 pt-4 border-top">
			                    <a href="<?= $link; ?>" role="button" class="btn btn-warning">
			                        <i class="fas fa-arrow-left"></i> Batal
			                    </a>
			                    <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-primary">
			                        <i class="fas fa-check"></i> Selesai Edit
			                    </button>
			                </div>
			                <!--end footer button-->

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	break;  
	}
?>