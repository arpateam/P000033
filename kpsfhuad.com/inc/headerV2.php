<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-success-navbar-dark shadow py-1 py-lg-3">
    <div class="container">
        <a class="navbar-brand" href="/">
          <img src="../assets/images/<?= $logoVersiMobile ?>" alt="<?= $judulLogoVersiMobile; ?>" height="50">
          <img src="../assets/images/<?= $logoUAD ?>" alt="<?= $judulLogoUAD; ?>" height="50">
          <img src="../assets/images/<?= $logoHKPSI ?>" alt="<?= $judulLogoHKPSI; ?>" height="50">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <hr class="border border-danger d-block d-lg-none">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-2 mt-0 mt-lg-0" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-2 p-lg-2 mt-2 mt-lg-0 <?php if (($_GET['module']==='profil') OR ($_GET['module']==='read-profil')) { echo 'active'; } ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            $Profil = $pdo->query("SELECT judul, seo FROM konten_profil WHERE status='Aktif' ORDER BY urutan ASC");
                            while($resultProfil = $Profil->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <li><a class="dropdown-item <?php if (($_GET['module']==='read-profil') AND ($_GET['judul_seo']===$resultProfil['seo'])) { echo 'active'; } ?>" href="../profil/<?= $resultProfil['seo'] ?>.html"><i class="fas fa-angle-right"></i> <?= $resultProfil['judul'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-2 p-lg-2 mt-2 mt-lg-0 <?php if (($_GET['module']==='galeri-kegiatan') OR ($_GET['module']==='nmcc') OR ($_GET['module']==='imcc') OR ($_GET['module']==='proker')) { echo 'active'; } ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Galeri Kegiatan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item <?php if ($_GET['module']==='nmcc') { echo 'active'; } ?>" href="../galeri-kegiatan/nmcc.html"><i class="fas fa-angle-right"></i> NMCC</a></li>
                        <li><a class="dropdown-item <?php if ($_GET['module']==='imcc') { echo 'active'; } ?>" href="../galeri-kegiatan/imcc.html"><i class="fas fa-angle-right"></i> IMCC</a></li>
                        <li><a class="dropdown-item <?php if ($_GET['module']==='proker') { echo 'active'; } ?>" href="../galeri-kegiatan/proker.html"><i class="fas fa-angle-right"></i> PROKER</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-2 mt-2 mt-lg-0 <?php if (($_GET['module']==='prestasi') OR ($_GET['module']==='read-prestasi')) { echo 'active'; } ?>" href="../prestasi/">Prestasi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-2 p-lg-2 mt-2 mt-lg-0 <?php if (($_GET['module']==='alumni') OR ($_GET['module']==='daftar-ketua') OR ($_GET['module']==='read-daftar-ketua')) { echo 'active'; } ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Alumni
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item <?php if ($_GET['module']==='alumni') { echo 'active'; } ?>" href="../alumni/"><i class="fas fa-angle-right"></i> Daftar Alumni</a></li>
                        <li><a class="dropdown-item <?php if (($_GET['module']==='daftar-ketua') OR ($_GET['module']==='read-daftar-ketua')) { echo 'active'; } ?>" href="../daftar-ketua/"><i class="fas fa-angle-right"></i> Daftar Ketua</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-lg-2 my-2 my-lg-0 <?php if ($_GET['module']==='file-download-kps') { echo 'active'; } ?>" href="../file-download-kps/"><i class="fas fa-download"></i> File Download KPS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>