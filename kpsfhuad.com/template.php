<?php
	
	// error_reporting(0);

	require "system/koneksi.php";
	require "system/fungsi_indotgl.php";
	require "system/fungsi_modul.php";
    require "system/fungsi_rupiah.php";
    require "system/fungsi_seo.php";
    require "system/fungsi_telp.php";
	require "system/z_setting.php";

?>

<!DOCTYPE html>
<html lang="id, in">
<head>
	<?php require "system/seo_v4.php";?>

	<link rel="icon" type="image/x-icon" href="assets/images/<?= $iconWebsite; ?>" />

    <!-- Fonts and icons -->
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');</style>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

	<div class="container-fluid">
		<?php require "inc/header.php"; ?>
		<?php require "inc/content.php"; ?>
		<?php require "inc/footer.php"; ?>
	</div>

	<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

	<!-- Asset -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- All -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!-- End All -->

	<script type="text/javascript">
		// ===== Scroll to Top ==== 
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
			    $('#return-to-top').fadeIn(200);    // Fade in the arrow
			} else {
				$('#return-to-top').fadeOut(200);   // Else fade out the arrow
			}
		});
		$('#return-to-top').click(function() {      // When arrow is clicked
			$('body,html').animate({
				scrollTop : 0                       // Scroll to top of body
			}, 500);
		});
		// ===== Scroll to Top ==== 
	</script>

	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement(
				{pageLanguage: 'id, in'},
				'google_translate_element'
			);
		}
	</script>
	<!-- Asset -->

</body>
</html>