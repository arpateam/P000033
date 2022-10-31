<div class="container-fluid bg-danger py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-light d-none d-lg-block">
                <h1>HALAMAN BERITA</h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3>HALAMAN BERITA</h3>
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
                <a href="#" title="" class="nav-link-danger active">Berita</a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">Berita</a>
            </small>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-between">
        <div class="col-12">
            <h1 class="text-success">BERITA <?= $namaweb ?></h1>
            <h6 class="text-danger">Yuk baca berita kami tentang <?= $namaweb ?></h6>
        </div>
        <div class="col-6">
            <div class="border-bottom-3"></div>
        </div>
        <div class="col-12 mt-2">
            <div class="row">
                <?php

                    $page   = new pagingBerita;
                    $batas  = 9;
                    $posisi = $page->cariPosisi($batas);

                    $Data   = $pdo->query("SELECT id_berita, judul, gambar, deskripsi, seo, tgl_update FROM berita ORDER BY tgl_update DESC LIMIT $posisi,$batas");
                    $Data2  = $pdo->query("SELECT id_berita, judul, gambar, deskripsi, seo, tgl_update FROM berita ORDER BY tgl_update DESC");
                    while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                        $des    = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultData["deskripsi"])));
                        $des2   = substr($des,0,strrpos(substr($des,0,115)," "))." ...";
                ?>
                <div class="col-sm-6 col-lg-4 my-3">
                    <div class="card h-100 bg-light border-0 shadow">
                        <img src="../assets/images/berita/small/<?= $resultData['gambar'] ?>" class="card-img" alt="<?= $resultData['judul'] ?>">
                        <div class="card-img-overlay">
                            <h5 class="card-title text-light-card"><?= $resultData['judul'] ?></h5>
                            <small class="badge bg-danger fw-normal"><i class="fas fa-calendar-alt"></i> <?= tgl2($resultData['tgl_update']) ?></small>
                        </div>
                        <div class="card-body">
                            <small class="card-text text-danger"><?= $des2 ?></small>
                            <div class="mt-2"></div>
                            <a href="<?= $resultData['seo'] ?>.html" title="Galeri Kegiatan <?= $resultData['judul'] ?>" class="btn btn-sm btn-danger z-index"><i class="fab fa-readme"></i> Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php
                    }

                    $jmldata = $Data2->rowCount();
                    $jmlhalaman  = $page->jmlhalaman($jmldata, $batas);
                    $linkHalaman = $page->navHalaman($_GET['page'], $jmlhalaman);
                               
                    if($jmldata>$batas){
                ?>
                <div class="col-12 mt-3 pt-3 border-top">
                    <div class="wp-pagenavi">
                        <center><?= $linkHalaman; ?></center>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>