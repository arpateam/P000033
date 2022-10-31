<div class="container-fluid bg-danger py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-light d-none d-lg-block">
                <h1>FILE DOWNLOAD KPS</h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3>FILE DOWNLOAD KPS</h3>
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
                <a href="#" title="" class="nav-link-danger active">File Download KPS</a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">File Download KPS</a>
            </small>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-between">
        <div class="col-12">
            <h1 class="text-success">FILE DOWNLOAD KPS</h1>
            <h6 class="text-danger">Lihat daftar File Download KPS disini</h6>
        </div>
        <div class="col-6">
            <div class="border-bottom-3"></div>
        </div>
        <div class="col-12 mt-5">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-2">
                        <tbody>
                            <?php
                                $no=1;
                                $Data = $pdo->query("SELECT nama_file, file FROM file_download ORDER BY tgl_update DESC");
                                while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td max-width="10%" class="text-success text-center">
                                    <h5><?= $no++ ?>.</h5>
                                </td>
                                <td max-width="60%" class="text-success">
                                    <h5><?= $resultData['nama_file']; ?></h5>
                                </td>
                                <td max-width="35%" class="text-center">
                                    <a href="../assets/images/file-download/<?= $resultData['file'] ?>" target="_blank" title="Download <?= $hal ?>" class="btn btn-sm btn-outline-danger"><i class="fas fa-download"></i> <span class="d-none d-lg-inline">Download File</span></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>