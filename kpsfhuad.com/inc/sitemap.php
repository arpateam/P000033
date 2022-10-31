<div class="container-fluid bg-danger py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-light d-none d-lg-block">
                <h1>HALAMAN SITEMAP</h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3>HALAMAN SITEMAP</h3>
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
                <a href="#" title="" class="nav-link-danger active">Sitemap</a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">Sitemap</a>
            </small>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container my-5 text-danger">
        <?php
            $SubSitemap = $pdo->query("SELECT id_sub_sitemap, judul FROM sub_sitemap ORDER BY id_sub_sitemap ASC");
            while($resultSubSitemap = $SubSitemap->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="mb-4 border-bottom-3 rounded">
            <h3><?= $resultSubSitemap['judul'] ?></h3>
            <ol>
                <?php
                    $Sitemap1 = $pdo->query("SELECT loc_1 FROM sitemap_1 WHERE id_sub_sitemap='$resultSubSitemap[id_sub_sitemap]' ORDER BY id_sub_sitemap ASC");
                    while($resultSitemap1 = $Sitemap1->fetch(PDO::FETCH_ASSOC)){
                ?>
                <li><a href="<?= $resultSitemap1['loc_1'] ?>" class="nav-link-danger-V2"><?= $resultSitemap1['loc_1'] ?></a></li>
                <?php } ?>
            </ol>
        </div>
        <?php } ?>
	</div>
</div>