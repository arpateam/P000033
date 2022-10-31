<div class="col-lg-4 mt-4 mt-lg-0">
    <div class="card sticky-top-card">
        <h5 class="card-header card-header-success text-light">Lihat Lainnya</h5>
        <div class="card-body">
            <?php
                $Berita = $pdo->query("SELECT id_berita, judul, gambar, deskripsi, seo, tgl_update FROM berita ORDER BY rand() DESC LIMIT 2");
                while($resultBerita = $Berita->fetch(PDO::FETCH_ASSOC)){
                $des    = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultBerita["deskripsi"])));
                $des2   = substr($des,0,strrpos(substr($des,0,85)," "))." ...";
            ?>
            <div class="card h-100 bg-light border-0 shadow mb-3">
                <img src="../assets/images/berita/small/<?= $resultBerita['gambar'] ?>" class="card-img" alt="<?= $resultBerita['judul'] ?>">
                <div class="card-img-overlay">
                    <h5 class="card-title text-light-card"><?= $resultBerita['judul'] ?></h5>
                    <small class="badge bg-danger fw-normal"><i class="fas fa-calendar-alt"></i> <?= tgl2($resultBerita['tgl_update']) ?></small>
                </div>
                <div class="card-body">
                    <small class="card-text text-danger"><?= $des2 ?></small>
                    <div class="mt-2"></div>
                    <a href="<?= $resultBerita['seo'] ?>.html" title="Galeri Kegiatan <?= $resultBerita['judul'] ?>" class="btn btn-sm btn-danger z-index"><i class="fab fa-readme"></i> Baca Selengkapnya</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>