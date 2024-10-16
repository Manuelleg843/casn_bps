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
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>


        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="deleteForm" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                        </div>
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ======= Dokumen Section ======= -->
        <section id="dokumen" class="section dokumen">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Dokumen</h2>
                    <h3>Dokumen <span>Pengumuman</span></h3>
                </div>

                <div class="d-flex justify-content-between">
                    <ul class="nav nav-tabs" id="dokumenTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="cpns-tab" data-bs-toggle="tab" data-bs-target="#cpnstab" type="button" role="tab" aria-controls="cpnstab" aria-selected="true">CPNS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pppk-tab" data-bs-toggle="tab" data-bs-target="#pppktab" type="button" role="tab" aria-controls="pppktab" aria-selected="false">PPPK</button>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-end mt-2 mb-4">
                        <a href="<?= base_url('/create_announcement'); ?>" class="btn btn-primary">Tambah</a>
                    </div>
                </div>

                <div class="tab-content" id="dokumenTabContent">
                    <div class="tab-pane fade show active" id="cpnstab" role="tabpanel" aria-labelledby="cpns-tab">
                        <div class="row">

                            <table class="announcement-table" id="cpnsTableAdmin"> <!-- style="margin-top: 10pt"-->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dokumen CPNS</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal Dokumen</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--add row table here -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pppktab" role="tabpanel" aria-labelledby="pppk-tab">
                        <div class="row">

                            <!--<p><br /><em>Dokumen pengumuman untuk PPPK BPS Tahun 2024 akan segera ditambahkan.</em></p>-->
                            <table class="announcement-table" id="pppkTableAdmin"> <!-- style="margin-top: 10pt"-->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dokumen PPPK</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal Dokumen</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--add row table here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Dokumen Section -->

        <!--======= Frequently Asked Questions Section ======= -->
        <div id="faq">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>F.A.Q</h2>
                    <h3>Frequently Asked <span>Questions</span></h3>
                </div>

                <div class="d-flex justify-content-end mt-2 mb-4">
                    <a href="<?= base_url('/create_pengumuman'); ?>" class="btn btn-primary">Tambah</a>
                </div>

                <div class="tab-content" id="dokumenTabContent">
                    <div class="tab-pane fade show active" id="cpnstab" role="tabpanel" aria-labelledby="cpns-tab">
                        <div class="row">

                            <table class="announcement-table" id="faqTableAdmin"> <!-- style="margin-top: 10pt"-->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--add row table here -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Frequently Asked Questions Section -->

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
    <script src="<?= base_url('/assets/js/modal.js'); ?>"></script>

</body>

</html>