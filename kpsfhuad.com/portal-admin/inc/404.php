<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Akses Gagal!</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/<?= $iconWebsite; ?>">

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
</head>

<body class="bg-primary py-4 py-md-5">

    <section class="container bg-primary my-2 my-md-5">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-8 p-4">
                <div class="alert alert-warning" role="alert">
                    <h1 class="alert-heading fw-bold text-warning"><i class="fas fa-bell"></i> 404!</h1>
                    <p>Anda tidak memiliki hak untuk mengakses halaman tersebut!</p>
                    <hr>
                    <p class="mb-0">Silahkan kembali ke <a href="masuk" class="btn btn-sm btn-warning"><i class="fas fa-home"></i> Halaman Depan</a></p>
                </div>
            </div>
        </div>
    </section>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

</body>
</html>