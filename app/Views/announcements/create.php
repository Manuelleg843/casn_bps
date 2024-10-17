<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>2024 CASN.BPS - Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('/assets/img/favicon.ico'); ?>" rel="icon">
    <link href="<?= base_url('/assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('/assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('/assets/css/style.css'); ?>" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>



<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="<?= base_url('/'); ?>">CASN<span>.</span>BPS<sup class="sup-logo">2024</sup></a></h1>
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Dokumen Section ======= -->
        <section id="dokumen" class="section dokumen">
            <div class="container" data-aos="fade-up">
                <!-- Announcement Form Start -->
                <div class="row">
                    <!-- Row 1 -->
                    <div class="row">
                        <!-- Content Header (Page header) -->
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Informasi Pengumuman</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fw-semibold mb-4">Form Dokumen Pengumuman</h5>
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="<?= base_url('/create_announcement/create'); ?>" method="POST" enctype="multipart/form-data">
                                                    <?= csrf_field(); ?>

                                                    <?php
                                                    $form_data = session()->getFlashdata('form_data');
                                                    $errors = session()->getFlashdata('errors');
                                                    ?>

                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Judul Pengumuman</label>
                                                        <input type="text" value="<?= isset($form_data['title']) ? $form_data['title'] : '' ?>" class="form-control <?= (isset($errors['title']) ? 'is-invalid' : ''); ?>" name="title" id="title" autofocus />
                                                        <div class="invalid-feedback">
                                                            <?= isset($errors['title']) ? $errors['title'] : '' ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="document" class="form-label">File Dokumen</label>
                                                        <input type="file" class="custom-file-input col-sm-8 form-control <?= (isset($errors['document']) ? 'is-invalid' : ''); ?>" id="document" name="document">
                                                        <div class="invalid-feedback">
                                                            <?= isset($errors['document']) ? $errors['document'] : '' ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3" id="fileLampiran">
                                                        <label class="form-label">Dokumen Lampiran</label>
                                                    </div>
                                                    <button type="button" id="addLampiran" class="btn btn-primary mb-3">Tambah Lampiran</button>
                                                    <div class="mb-3">
                                                        <label for="content" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="content" name="content"><?= isset($form_data['content']) ? $form_data['content'] : '' ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="publish_date" class="form-label">Tanggal Publish</label>
                                                        <input type="date" value="<?= isset($form_data['publish_date']) ? $form_data['publish_date'] : '' ?>" class="form-control" name="publish_date" id="publish_date" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="category" class="form-label">Kategori</label>
                                                        <select class="form-select form-control <?= (isset($errors['category']) ? 'is-invalid' : ''); ?>" name="category" id="category">
                                                            <option value="" selected disabled>Pilih salah satu</option>
                                                            <option value="CPNS">CPNS</option>
                                                            <option value="PPPK">PPPK</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            <?= isset($errors['category']) ? $errors['category'] : '' ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="is_active" class="form-label">Status</label>
                                                        <select class="form-select form-control <?= (isset($errors['is_active']) ? 'is-invalid' : ''); ?>" name="is_active" id="is_active">
                                                            <option value="" selected disabled>Pilih salah satu</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            <?= isset($errors['category']) ? $errors['category'] : '' ?>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Announcement Form End -->
            </div>
        </section>
        <!-- End Dokumen Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 footer-contact">
                        <h3>CASN<span>.</span>BPS<sup class="sup-logo">2024</sup></h3>
                        <p>
                            Jl. Dr. Sutomo 6-8 <br />
                            Jakarta 10710 Indonesia <br /><br />
                        </p>
                        <h3 style="font-size: 150%;"><strong>Email:</strong> <a href="mailto:casn@bps.go.id">casn@bps.go.id</a></h3><br />
                    </div>

                    <div class="col-lg-6 col-md-6 footer-links">
                        <h4>Sosial Media Badan Pusat Statistik</h4>
                        <p>Badan Pusat Statistik (BPS) adalah lembaga pemerintah yang mengumpulkan, mengolah, dan menyediakan data statistik.</p>
                        <div class="social-links mt-3 text-right">
                            <a href="https://www.instagram.com/bps_statistics/" target="_blank" rel="noopener noreferrer" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCn4IaaxHaaP-mAjZzrAtixA" target="_blank" rel="noopener noreferrer" class="youtube"><i class="bi bi-youtube"></i></a>
                            <a href="https://www.facebook.com/bpsstatistics/" target="_blank" rel="noopener noreferrer" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://twitter.com/bps_statistics/" target="_blank" rel="noopener noreferrer" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="https://www.linkedin.com/company/badan-pusat-statistik/" target="_blank" rel="noopener noreferrer" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; 2022-2024 <strong>CASN<span>.</span>BPS</strong>.
                <a href="https://www.bps.go.id" target="_blank" rel="noopener noreferrer"> Badan Pusat Statistik</a>
            </div>
            <div class="credits">

            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script>
        const base_url = '<?= base_url('/'); ?>';
    </script>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('/assets/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/aos/aos.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/waypoints/noframework.waypoints.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/php-email-form/validate.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/jquery/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/vendor/showdown/showdown.min.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('/assets/js/main.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/form.js'); ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('a[data-tab]');
            const tabButtons = document.querySelectorAll('.nav-tabs .nav-link');
            const tabContents = document.querySelectorAll('.tab-pane');

            function switchToTab(tabId) {
                // Remove active class from all tabs and contents
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => {
                    content.classList.remove('show', 'active');
                });

                // Add active class to selected tab and content
                const selectedTab = document.getElementById(tabId);
                const selectedContent = document.getElementById(tabId.replace('-tab', 'tab'));

                if (selectedTab && selectedContent) {
                    selectedTab.classList.add('active');
                    selectedContent.classList.add('show', 'active');
                }

                // Scroll to the dokumen section
                document.querySelector('#dokumen').scrollIntoView({
                    behavior: 'smooth'
                });
            }

            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tabId = this.getAttribute('data-tab');
                    switchToTab(tabId);
                });
            });

            // Handle direct links with hash
            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                if (hash === 'cpns-tab' || hash === 'pppk-tab') {
                    switchToTab(hash);
                }
            }

            // Handle URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            if (tabParam === 'cpns' || tabParam === 'pppk') {
                switchToTab(tabParam + '-tab');
            }
        });
    </script>

    <!-- Fetch Data JS File -->
    <script src="<?= base_url('/assets/js/dokumen.js'); ?>"></script>
    <script src="<?= base_url('/assets/js/faq.js'); ?>"></script>

</body>

</html>