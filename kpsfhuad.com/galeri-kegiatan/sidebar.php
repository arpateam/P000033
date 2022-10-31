<div class="col-lg-4 mt-4 mt-lg-0">
    <div class="card sticky-top-card">
        <h5 class="card-header card-header-success text-light">Lihat Lainnya</h5>
        <div class="card-body">
            <?php
                $GaleriKegiatan = $pdo->query("SELECT id_galeri_kegiatan, judul, foto, keterangan, seo, tgl_update FROM galeri_kegiatan ORDER BY rand() DESC LIMIT 2");
                while($resultGaleriKegiatan = $GaleriKegiatan->fetch(PDO::FETCH_ASSOC)){
                $des    = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultGaleriKegiatan["keterangan"])));
                $des2   = substr($des,0,strrpos(substr($des,0,85)," "))." ...";
            ?>
            <div class="card h-100 bg-light border-0 shadow mb-3">
                <img src="../assets/images/galeri-kegiatan/small/<?= $resultGaleriKegiatan['foto'] ?>" class="card-img" alt="<?= $resultGaleriKegiatan['judul'] ?>">
                <div class="card-img-overlay">
                    <h5 class="card-title text-light-card"><?= $resultGaleriKegiatan['judul'] ?></h5>
                    <small class="badge bg-danger fw-normal"><i class="fas fa-calendar-alt"></i> <?= tgl2($resultGaleriKegiatan['tgl_update']) ?></small>
                </div>
                <div class="card-body">
                    <small class="card-text text-danger"><?= $des2 ?></small>
                    <div class="mt-2"></div>
                    <a href="<?= $resultGaleriKegiatan['seo'] ?>.html" title="Galeri Kegiatan <?= $resultGaleriKegiatan['judul'] ?>" class="btn btn-sm btn-danger z-index"><i class="fab fa-readme"></i> Baca Selengkapnya</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>