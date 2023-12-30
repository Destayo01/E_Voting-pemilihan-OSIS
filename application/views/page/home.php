<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pemilihan Kandidat</title>
    <?php $this->load->view('_partials/head.php'); ?>
    <style>
        .swiper-container {
            width: 100%;
            padding: 20px;
        }
        .swiper-slide {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            width: 300px;

        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="col-md-10 mx-auto">
            <div class="au-card shadow-lg p-1 m-1">
                <div class="card-body">
                      <!-- Navbar -->
                      <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">
                            <img src="<?= base_url('assets/tut.png') ?>" alt="Logo" width="30" height="24" class="d-inline-block align-top">
                            SMK Assalafiyyah
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url('page') ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= site_url('page/home') ?>">Vote</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-danger" href="<?= site_url('Users/logout') ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="au-card shadow-lg p-3 m-3">
                                <div class="card-body">
                                    <h3 class="card-title">Selamat Datang di Halaman Pemilihan</h3>
                                    <p class="card-text">Silakan Memilih yang menurut anda cocok menjadi pemimpin.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Swiper Container -->
                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                <!-- Kandidat Cards -->
                                <?php if ($this->session->flashdata('message_already_voted')): ?>
                                    <div class="alert alert-warning">
                                        <?= $this->session->flashdata('message_already_voted'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php foreach ($kandidat_data as $kandidat): ?>
                                    <div class="swiper-slide">
                                        <div class="au-card shadow-lg p-4 m-6">
                                            <img src="<?= base_url('upload/avatar/' . $kandidat['foto']); ?>" class="card-img-top" alt="Kandidat Image" style="width: 200px; height: 270px;">
                                            <div class="card-body">
                                                <h4 class="card-title"><?= $kandidat['nama']; ?></h4>
                                                <p class="card-text"> Kelas : <?= $kandidat['kelas'] ?></p>
                                                <form action="<?= base_url('pemilihan/proses_pemilihan'); ?>" method="post" id="formPilih">
                                                    <input type="hidden" name="kandidat_id_<?= $kandidat['id']; ?>" value="<?= $kandidat['id']; ?>">
                                                    <button type="submit" class="btn btn-primary mb-1" onclick="konfirmasiPemilihan()">Pilih</button>
                                                </form>

                                                <button type="button" class="btn btn-info mb-1" style="text-color: white; " onclick="showVisiMisiModal('<?= $kandidat['nama']; ?>', '<?= base_url('upload/avatar/' . $kandidat['foto']); ?>', '<?= $kandidat['kelas']; ?>', '<?= $kandidat['misi']; ?>',  '<?= $kandidat['visi']; ?>', '<?= $kandidat['nisn']; ?>')">Lihat Visi Misi</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <script>
                        function showVisiMisiModal(nama, avatar, kelas, misi, visi, nisn) {
                            Swal.fire({
                                html: `
                                <div class="modal fade animated zoomIn" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="card" style="display: flex;">
                                                    <div style="flex: 0 0 80%; max-width: auto;">
                                                        <!-- Foto (ukuran 4x5) di pojok kiri atas -->
                                                        <img src="${avatar}" class="card-img-top" alt="Kandidat Image" style="width: 60%; height: auto; object-fit: cover;">
                                                    </div>
                                                    <div style="flex: 0 0 80%; max-width: auto;">
                                                        <div class="card-body">
                                                            <!-- Nama, NISN, dan Kelas -->
                                                            <h4 class="card-title">${nama}</h4>
                                                            <h5 class="card-subtitle mb-2 text-muted">NISN: ${nisn}</h5>
                                                            <h5 class="card-subtitle mb-2 text-muted">Kelas: ${kelas}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <!-- Visi -->
                                                            <h5 class="card-subtitle mb-2 text-muted">Visi:</h5>
                                                            <p class="card-text">${visi}</p>
                                                        </div>
                                                        <div class="card-body">
                                                            <!-- Misi -->
                                                            <h5 class="card-subtitle mb-2 text-muted">Misi:</h5>
                                                            <p class="card-text">${misi}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('pemilihan/proses_pemilihan'); ?>" method="post">
                                                    <input type="hidden" name="kandidat_id" value="<?= $kandidat['id']; ?>">
                                                    <button type="submit" class="btn btn-primary">Pilih</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                `,
                                showCancelButton: false,
                                showConfirmButton: false,
                                onOpen: () => {
                                    // Bootstrap modal initialization
                                    $('.modal').modal('show');
                                },
                                onClose: () => {
                                    // Bootstrap modal closing
                                    $('.modal').modal('hide');
                                }
                            });
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 300,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
</script>


<!-- Jquery JS-->
<script src="<?= base_url('assets/') ?>vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="<?= base_url('assets/') ?>vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url('assets/') ?>vendor/slick/slick.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/wow/wow.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/counter-up/jquery.counterup.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url('assets/') ?>vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/select2/select2.min.js"></script>

<!-- Main JS-->
<script src="<?= base_url('assets/') ?>js/main.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
