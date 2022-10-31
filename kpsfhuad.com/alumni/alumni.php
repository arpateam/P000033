<div class="container-fluid bg-danger py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-light d-none d-lg-block">
                <h1>HALAMAN DAFTAR ALUMNI</h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3>HALAMAN DAFTAR ALUMNI</h3>
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
                <a href="#" title="" class="nav-link-danger active">Daftar Alumni</a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">Daftar Alumni</a>
            </small>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-between">
        <div class="col-12">
            <h1 class="text-success">DAFTAR ALUMNI <?= $namaweb ?></h1>
            <h6 class="text-danger">Yuk, kenali lebih dekat dengan Aulmni <?= $namaweb ?></h6>
        </div>
        <div class="col-6">
            <div class="border-bottom-3"></div>
        </div>
        <div class="col-12 mt-4">
            <table id="dataAlumni" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Angkatan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pekerjaan</th>
                    </tr>
                </thead>
                <tbody class="my-5">
                    <?php
                        $no=1;
                        $Data = $pdo->query("SELECT * FROM alumni ORDER BY angkatan DESC");
                        while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                    ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $resultData['nama']; ?></td>
                        <td><strong><?= substr($resultData['angkatan'], 0, 4) ?></strong></td>
                        <td><?= $resultData['alamat']; ?></td>
                        <td><strong class="text-danger"><?= $resultData['pekerjaan']; ?></strong></td>
                    </tr>

                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Angkatan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pekerjaan</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>