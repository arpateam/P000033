<footer class="py-4 bg-success border-top-danger-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-danger fw-bolder border-bottom-3 pb-2 mb-4">Tentang Kami</h5>
                <span class="text-light"><?= $deskripsiFooter ?></span>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-danger fw-bolder border-bottom-3 pb-2 mb-4">Kontak Kami</h5>
                <span class="text-light"><?= $alamatFooter ?></span>

                <div class="d-grid gap-2 mt-2">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= whatsApp($nomorWhatsApp1); ?>&text=Hallo%20<?= $namaweb ?>..." class="btn btn-sm btn-block btn-danger text-start shadow">
                        <i class="fab fa-whatsapp fa-lg"> <?= $nomorWhatsApp1 ?></i>
                    </a>

                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= whatsApp($nomorWhatsApp2); ?>&text=Hallo%20<?= $namaweb ?>..." class="btn btn-sm btn-block btn-danger text-start shadow">
                        <i class="fab fa-whatsapp fa-lg"> <?= $nomorWhatsApp2 ?></i>
                    </a>
                </div>

                <div class="d-block gap-3 mt-2">
                    <a target="_blank" href="<?= $YouTube ?>" class="btn btn-block btn-danger text-start shadow">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>

                    <a target="_blank" href="<?= $linkInstagram ?>" class="btn btn-block btn-danger text-start shadow">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>

                    <a target="_blank" href="<?= $linkLine ?>" class="btn btn-block btn-danger text-start shadow">
                        <i class="fab fa-line fa-lg"></i>
                    </a>

                    <a href="mailto:<?= $email ?>" class="btn btn-block btn-danger text-start shadow">
                        <i class="fas fa-envelope fa-lg"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-danger fw-bolder border-bottom-3 pb-2 mb-4">Maps</h5>
                <?= $googleMaps ?>
            </div>
        </div>
    </div>
</footer>
<footer class="py-3 bg-danger">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 text-center pt-2">
                <p class="text-light mb-0">Copyright &copy; <?= $namaweb; ?> <?= date("Y") ?>. All right reserved.</p>
                <small><a href="../sitemap.html" class="text-light text-decoration-none">Sitemap</a></small>
                <br />
                <small class="text-light">Dibuat dengan &hearts; oleh <a href="https://arpateam.com/" target="_blank" class="text-light text-decoration-none">#ARPATEAM</a></small>
            </div>
        </div>
    </div>
</footer>