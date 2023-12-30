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
                    </nav>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="au-card shadow-lg p-3 m-3">
                                <div class="card-body">
                                    <h3 class="card-title">Selamat Datang di Halaman Login Admin</h3>
                                    <p class="card-text">Silakan Login Dulu sebelum Masuk Dashboard.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="au-card shadow-lg p-3 m-3">
                                    <div class="login-form">
                                        <div>
                                            <h3 class="text-center">Login Admin</h3>
                                            <?php if ($this->session->flashdata('message_login_error')): ?>
                                                <div class="alert alert-danger">
                                                    <?= $this->session->flashdata('message_login_error') ?>
                                                </div>
                                            <?php endif ?>
                                          <form action="" method="post">
                                            <div>
                                              <label for="name">Username</label>
                                              <input type="text" name="username"  class="form-control <?= form_error('username') ? 'invalid' : '' ?>"
                                                placeholder="Your username or email" value="<?= set_value('username') ?>" required />
                                              <div class="invalid-feedback">
                                                <?= form_error('username') ?>
                                              </div>
                                            </div>
                                            <div>
                                              <label for="password">Password</label>
                                              <input type="password" name="password" class="form-control <?= form_error('password') ? 'invalid' : '' ?>"
                                                placeholder="Enter your password" value="<?= set_value('password') ?>" required />
                                              <div class="invalid-feedback">
                                                <?= form_error('password') ?>
                                              </div>
                                            </div>
                                            <br>
                                            <div>
                                              <label for="">Belum Punya Akun ?</label>
                                              <a href="<?= site_url('auth/register') ?>" class="">Buat Akun</a>
                                            </div>

                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-login">Login</button>
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

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
