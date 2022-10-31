<div class="container-fluid">
	<div id="slider" class="carousel slide carousel-fade" data-bs-ride="carousel">
	  	<div class="carousel-indicators">
	  		<?php
	  			$no 	= 0;
                $Data 	= $pdo->query("SELECT id_slider FROM slider WHERE status='Aktif' ORDER BY urutan ASC");
                while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                	
            ?>
		    <button type="button" data-bs-target="#slider" data-bs-slide-to="<?= $no ?>" <?php if ($no === 0) { echo "class='active' aria-current='true'"; } ?> aria-label="Slide <?= $no ?>"></button>
			<?php $no++; } ?>
	  	</div>
	  	<div class="carousel-inner">
	  		<?php
	  			$no 	= 0;
                $Data 	= $pdo->query("SELECT nama_slider, gambar FROM slider WHERE status='Aktif' ORDER BY urutan ASC");
                while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                	
            ?>
	    	<div class="carousel-item <?php if ($no === 0) { echo 'active'; } ?>">
	      		<img src="assets/images/slider/<?= $resultData['gambar'] ?>" class="d-block w-100" alt="<?= $resultData['nama_slider'] ?>">
		      	<div class="carousel-caption">
		        	<h2 class="text-danger-carousel d-none d-md-block"><?= $resultData['nama_slider'] ?></h2>
		        	<h4 class="text-danger-carousel d-block d-md-none"><?= $resultData['nama_slider'] ?></h4>
		      	</div>
	    	</div>
	    	<?php $no++; } ?>
	  	</div>
	  	<button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
	  	</button>
	  	<button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
	  	</button>
	</div>
</div>

<div class="container my-5">
	<div class="row justify-content-between">
		<div class="col-12">
			<h1 class="text-success text-uppercase">PENGUMUMAN <?= $namaweb ?></h1>
			<h6 class="text-danger">Baca detail Pengumuman tentang <?= $namaweb ?></h6>
		</div>
		<div class="col-6">
			<div class="border-bottom-3"></div>
		</div>
		<div class="col-12 mt-4">
            <div class="row">
				<?php
	                $Pengumuman = $pdo->query("SELECT id_pengumuman, judul, gambar, deskripsi, seo, tgl_update FROM pengumuman ORDER BY tgl_update DESC LIMIT 3");
	                while($resultPengumuman = $Pengumuman->fetch(PDO::FETCH_ASSOC)){
	                	$ket 	= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultPengumuman["deskripsi"])));
				  		$ket2 	= substr($ket,0,strrpos(substr($ket,0,200)," "))." ...";
	            ?>
            	<div class="col-sm-6 col-lg-4 my-2">
            		<div class="card h-100 bg-light shadow-sm">
					  	<img src="assets/images/pengumuman/small/<?= $resultPengumuman['gambar'] ?>" class="card-img" alt="<?= $resultPengumuman['judul'] ?>">
					  	<div class="card-img-overlay">
						    <h5 class="card-title d-none d-md-block text-light-card"><?= $resultPengumuman['judul'] ?></h5>
						    <small class="badge bg-danger fw-normal"><i class="fas fa-calendar-alt"></i> <?= tgl2($resultPengumuman['tgl_update']) ?></small>
					  	</div>
					  	<div class="card-body">
					  		<h5 class="card-title text-danger d-block d-md-none"><?= $resultPengumuman['judul'] ?></h5>
						    <small class="card-text text-muted"><?= $ket2 ?></small>

						    <div class="mt-2"></div>

						    <a href="pengumuman/<?= $resultPengumuman['seo'] ?>.html" title="Pengumuman <?= $resultPengumuman['judul'] ?>" class="btn btn-sm btn-danger z-index"><i class="fab fa-readme"></i> Baca Selengkapnya</a>
						</div>
					</div>
            	</div>
        		<?php } ?>
            	<div class="col-sm-6 d-none d-sm-block d-lg-none col-lg-4 my-2">
            		<div class="card h-100 bg-danger shadow-sm">
            			<div class="position-absolute top-50 start-50 translate-middle">
	            			<a href="pengumuman/" title="Pengumuman" class="nav-link text-light">
	            				Selengkapnya <i class="fas fa-long-arrow-alt-right"></i>
	            			</a>
	            		</div>
            		</div>
            	</div>
				<div class="col-lg-8 d-none d-lg-block"></div>
				<div class="col-lg-4 d-block d-sm-none d-lg-block my-2 text-end">
					<a href="pengumuman/" title="Pengumuman" class="btn btn-danger shadow-sm z-index">Selengkapnya <i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
            </div>
		</div>
	</div>
</div>

<div class="container-fluid py-4" style="background-image: url('assets/images/bgV2.png');background-size: cover;">
	<div class="container my-5">
		<div class="row justify-content-between">
			<div class="col-12">
				<h1 class="text-light">BERITA</h1>
				<h6 class="text-light">Yuk baca berita kami tentang <?= $namaweb ?></h6>
			</div>
			<div class="col-6">
				<div class="border-bottom-3-v3"></div>
			</div>
			<div class="col-12 mt-4">
	            <div class="row">
					<?php
		                $Berita = $pdo->query("SELECT id_berita, judul, gambar, deskripsi, seo, tgl_update FROM berita ORDER BY tgl_update DESC LIMIT 3");
		                while($resultBerita = $Berita->fetch(PDO::FETCH_ASSOC)){
				  		$des 	= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultBerita["deskripsi"])));
				  		$des2 	= substr($des,0,strrpos(substr($des,0,115)," "))." ...";
		            ?>
	            	<div class="col-sm-6 col-lg-4 my-2">
	            		<div class="card h-100 bg-light border-0 shadow">
						  	<img src="assets/images/berita/small/<?= $resultBerita['gambar'] ?>" class="card-img" alt="<?= $resultBerita['judul'] ?>">
						  	<div class="card-img-overlay">
							    <h5 class="card-title text-light-card"><?= $resultBerita['judul'] ?></h5>
							    <small class="badge bg-danger fw-normal"><i class="fas fa-calendar-alt"></i> <?= tgl2($resultBerita['tgl_update']) ?></small>
						  	</div>
						  	<div class="card-body">
							    <small class="card-text text-danger"><?= $des2 ?></small>
						    	<div class="mt-2"></div>
							    <a href="berita/<?= $resultBerita['seo'] ?>.html" title="Galeri Kegiatan <?= $resultBerita['judul'] ?>" class="btn btn-sm btn-danger z-index"><i class="fab fa-readme"></i> Baca Selengkapnya</a>
							</div>
						</div>
	            	</div>
	        		<?php } ?>
	            	<div class="col-sm-6 d-none d-sm-block d-lg-none col-lg-4 my-2">
	            		<div class="card h-100 bg-light shadow-sm">
	            			<div class="position-absolute top-50 start-50 translate-middle">
		            			<a href="berita/" title="berita" class="nav-link text-danger">
		            				Selengkapnya <i class="fas fa-long-arrow-alt-right"></i>
		            			</a>
		            		</div>
	            		</div>
	            	</div>
					<div class="col-lg-8 d-none d-lg-block"></div>
					<div class="col-lg-4 d-block d-sm-none d-lg-block my-2 text-end">
						<a href="berita/" title="berita" class="btn btn-outline-light shadow-sm z-index">Selengkapnya <i class="fas fa-long-arrow-alt-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container my-5">
	<div class="row justify-content-between">
		<div class="col-12">
			<h1 class="text-success text-uppercase">DAFTAR KETUA <?= $namaweb ?></h1>
			<h6 class="text-danger">Yuk kenali lebih dekat dengan Ketua <?= $namaweb ?></h6>
		</div>
		<div class="col-6">
			<div class="border-bottom-3"></div>
		</div>
		<div class="col-12 mt-4">
            <div class="row">
                <?php
                    $DaftarKetua = $pdo->query("SELECT id_daftar_ketua, nama, periode, data_diri, kegiatan, foto, seo FROM daftar_ketua ORDER BY periode DESC LIMIT 3");
                    while($resultDaftarKetua = $DaftarKetua->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="col-sm-6 col-lg-4 my-2">
                    <div class="card h-100 card-profile shadow-sm">
                        <div class="card-header" style="background-image: url('assets/images/daftar-ketua/<?= $resultDaftarKetua['foto']; ?>'); background-size: cover;">

                            <span class="badge bg-danger"><i class="fas fa-thumbtack"></i> Periode <?= $resultDaftarKetua['periode'] ?></span>
                            
                            <div class="profile-picture">
                                <div class="avatar avatar-xxl">
                                    <img src="assets/images/daftar-ketua/<?= $resultDaftarKetua['foto']; ?>" alt="Gambar <?= $resultDaftarKetua['nama']; ?>" class="avatar-img rounded-circle shadow-md" />
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-4">
                            <div class="user-profile text-center">
                                <div class="name text-danger"><?= $resultDaftarKetua['nama']; ?></div>
                            </div>
                        </div>
                        <div class="card-body p-2 border-top">
                            <div class="row text-center text-light">

                                <div class="col-4 px-0 my-1">
									<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Profil<?= $resultDaftarKetua['id_daftar_ketua']; ?>">
									  	<i class="fas fa-id-badge"></i> Profil
									</button>

									<!-- Modal -->
									<div class="modal fade" id="Profil<?= $resultDaftarKetua['id_daftar_ketua']; ?>" tabindex="-1" aria-labelledby="Profil<?= $resultDaftarKetua['id_daftar_ketua']; ?>Label" aria-hidden="true">
										<div class="modal-dialog">
										    <div class="modal-content">
										      	<div class="modal-header">
										        	<h5 class="modal-title text-success" id="Profil<?= $resultDaftarKetua['id_daftar_ketua']; ?>Label"><i class="fas fa-id-badge"></i> Profil <strong><?= $resultDaftarKetua['nama']; ?></strong></h5>
										        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      	</div>
										      	<div class="modal-body text-start text-success">
										        	<?= $resultDaftarKetua['data_diri']; ?>
										      	</div>
										    </div>
										</div>
									</div>
                                </div>

                                <div class="col-4 px-0 my-1">
									<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Kegiatan<?= $resultDaftarKetua['id_daftar_ketua']; ?>">
									  	<i class="fas fa-user-graduate"></i> Kegiatan
									</button>

									<!-- Modal -->
									<div class="modal fade" id="Kegiatan<?= $resultDaftarKetua['id_daftar_ketua']; ?>" tabindex="-1" aria-labelledby="Kegiatan<?= $resultDaftarKetua['id_daftar_ketua']; ?>Label" aria-hidden="true">
										<div class="modal-dialog">
										    <div class="modal-content">
										      	<div class="modal-header">
										        	<h5 class="modal-title text-success" id="Kegiatan<?= $resultDaftarKetua['id_daftar_ketua']; ?>Label"><i class="fas fa-user-graduate"></i> Kegiatan <strong><?= $resultDaftarKetua['nama']; ?></strong></h5>
										        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      	</div>
										      	<div class="modal-body text-start text-success">
										      		<?= $resultDaftarKetua['kegiatan']; ?>
										      	</div>
										    </div>
										</div>
									</div>
                                </div>

                                <div class="col-4 px-0 my-1">
                                    <a href="daftar-ketua/<?= $resultDaftarKetua['seo']; ?>.html" role="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-external-link-alt"></i> Detail
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            	<div class="col-sm-6 d-none d-sm-block d-lg-none col-lg-4 my-2">
            		<div class="card h-100 bg-danger shadow-sm">
            			<div class="position-absolute top-50 start-50 translate-middle">
	            			<a href="daftar-ketua/" title="Daftar Ketua" class="nav-link text-light">
	            				Selengkapnya <i class="fas fa-long-arrow-alt-right"></i>
	            			</a>
	            		</div>
            		</div>
            	</div>
				<div class="col-lg-8 d-none d-lg-block"></div>
				<div class="col-lg-4 d-block d-sm-none d-lg-block my-2 text-end">
					<a href="daftar-ketua/" title="Daftar Ketua" class="btn btn-danger shadow-sm z-index">Selengkapnya <i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
            </div>
		</div>
	</div>
</div>