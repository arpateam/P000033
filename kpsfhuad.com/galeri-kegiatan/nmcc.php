<div class="container-fluid bg-danger py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-light d-none d-lg-block">
                <h1>GALERI KEGIATAN NMCC</h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3>GALERI KEGIATAN NMCC</h3>
            </div>
        </div>
    </div>
</div>

<div class="container z-index mt--4">
    <div class="row justify-content-center">
        <div class="col-11 col-lg-8 col-xl-6 bg-success shadow rounded text-center py-3">
            <span class="d-none d-lg-block">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">Galeri Kegiatan NMCC</a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">Galeri Kegiatan NMCC</a>
            </small>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-between">
        <div class="col-12">
            <h1 class="text-success">GALERI KEGIATAN NMCC</h1>
            <h6 class="text-danger">Hay, yuk simak Galeri Kegiatan NMCC kami</h6>
        </div>
        <div class="col-6">
            <div class="border-bottom-3"></div>
        </div>
        <div class="col-12 mt-5 text-center">
            <div class="btn-group">
                <a href="semua-kegiatan.html" class="btn btn-success" aria-current="page">SEMUA</a>
                <a href="#" class="btn btn-danger">NMCC</a>
                <a href="imcc.html" class="btn btn-success">IMCC</a>
                <a href="proker.html" class="btn btn-success">PROKER</a>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="row justify-content-center">
                <?php
                    $rowperpage = 6;

                    $AllData            = $pdo->query("SELECT count(*) as allcount FROM galeri_kegiatan WHERE sub_galeri_kegiatan='NMCC'");
                    $resultAllData      = $AllData->fetch(PDO::FETCH_ASSOC);
                    $allcount           = $resultAllData['allcount'];

                    // select first 3 posts
                    $Data               = $pdo->query("SELECT id_galeri_kegiatan, sub_galeri_kegiatan, judul, foto, keterangan, link_youtube, seo, tgl_update FROM galeri_kegiatan WHERE sub_galeri_kegiatan='NMCC' ORDER BY tgl_update DESC LIMIT 0,$rowperpage");
                    while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                        $ket    = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultData["keterangan"])));
                        $ket2   = substr($ket,0,strrpos(substr($ket,0,200)," "))." ...";
                ?>

                <div class="col-sm-6 col-lg-4 my-2 post" id="post_<?= $resultData['id_galeri_kegiatan']; ?>">
                    <div class="card h-100 bg-light shadow-sm">
                        <div class="thumbnail-box">
                            <img src="../assets/images/galeri-kegiatan/small/<?= $resultData['foto'] ?>" class="card-img portrait-box" alt="<?= $resultData['judul'] ?>">
                        </div>
                        <div class="card-img-overlay">
                            <h5 class="card-title d-none d-md-block text-light-card"><?= $resultData['judul'] ?></h5>
                            <small class="badge bg-danger fw-normal"><i class="fas fa-tag"></i> <?= $resultData['sub_galeri_kegiatan'] ?></small>
                            <small class="badge bg-danger fw-normal"><i class="fas fa-calendar-alt"></i> <?= tgl2($resultData['tgl_update']) ?></small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-danger d-block d-md-none"><?= $resultData['judul'] ?></h5>
                            <small class="card-text text-muted"><?= $ket2 ?></small>

                            <div class="mt-2"></div>

                            <a href="<?= $resultData['seo'] ?>.html" title="<?= $resultData['judul'] ?>" class="btn btn-sm btn-outline-danger z-index"><i class="fas fa-external-link-alt"></i> Detail</a>

                            <?php if ($resultData['link_youtube']!==NULL): ?>
                                <a href="<?= $resultData['link_youtube'] ?>" target="_blank" title="Galeri Kegiatan <?= $resultData['judul'] ?>" class="btn btn-sm btn-danger z-index"><i class="fab fa-youtube"></i> Lihat di YouTube</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>

                <div class="w-100"></div>

                <div class="col-sm-6 col-lg-4 mt-5">
                    <div class="d-grid gap-2">
                        <button type="button" class="load-more btn btn-success">Selengkapnya <i class="fas fa-angle-double-down"></i></button>
                    </div>
                    <input type="hidden" id="row" value="0">
                    <input type="hidden" id="all" value="<?= $allcount; ?>">
                </div>
            </div>
        </div>
    </div>
</div>