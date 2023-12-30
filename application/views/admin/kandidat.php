<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemilih</title>
    <?php $this->load->view('_partials/head.php'); ?>
    <style>
/* Pagination styles */
.pagination {
	display: flex;
	padding: 1em 0;
}

.pagination a,
.pagination strong {
	border: 1px solid silver;
	border-radius: 8px;
	color: black;
	padding: 0.5em;
	margin-right: 0.5em;
	text-decoration: none;
}

.pagination a:hover,
.pagination strong {
	border: 1px solid #008cba;
	background-color: #008cba;
	color: white;
}
</style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="<?= base_url('assets/assalafiyyah.png') ?>" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                            <div class="image img-cir img-120">
                            <?php
                            $avatar = $current_user->avatar ?
                                base_url('upload/avatar/' . $current_user->avatar)
                                : get_gravatar($current_user->email)
                            ?>
                                <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" alt="John Doe" />
                            </div>
                            <h4 class="name"><?= htmlentities($current_user->name) ?></h4>
                            <a href="<?= site_url('auth/logout') ?>">Logout</a>
                        </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?= site_url('admin/dashboard') ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/pemilih') ?>">
                                <i class="fas fa-chart-bar"></i>Tabel Pemilih
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a href="<?= site_url('admin/kandidat') ?>">
                                <i class="fas fa-shopping-basket"></i>Tabel Kandidat
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/kelas') ?>">
                                <i class="fas fa-trophy"></i>Tabel Kelas
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/hasil') ?>">
                                <i class="fas fa-copy"></i>Hasil pemilihan
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/setting') ?>">
                                <i class="fas fa-desktop"></i>Setelan
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="<?= base_url('assets/assalafiyyah.png') ?>" alt="CoolAdmin" style="weidth:50px; height:50px"/>
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="<?= base_url('assets/assalafiyyah.png') ?>" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                            <div class="image img-cir img-120">
                            <?php
                            $avatar = $current_user->avatar ?
                                base_url('upload/avatar/' . $current_user->avatar)
                                : get_gravatar($current_user->email)
                            ?>
                                <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" alt="John Doe" />
                            </div>
                            <h4 class="name"><?= htmlentities($current_user->name) ?></h4>
                            <a href="<?= site_url('auth/logout') ?>">Logout</a>
                        </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="<?= site_url('admin/dashboard') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/pemilih') ?>">
                                    <i class="fas fa-chart-bar"></i>Tabel Pemilih
                                </a>
                            </li>
                            <li class="active has-sub">
                                <a href="<?= site_url('admin/kandidat') ?>">
                                    <i class="fas fa-shopping-basket"></i>Tabel kandidat
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/kelas') ?>">
                                    <i class="fas fa-trophy"></i>Tabel kelas
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/hasil') ?>">
                                    <i class="fas fa-copy"></i>Hasil pemilihan
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/setting') ?>">
                                    <i class="fas fa-desktop"></i>Setelan
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Dashboard</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Kandidat</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->


            <!-- MAIN CONTENT-->
            <br>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-card">
                                    <div class="card-header">
                                        <h2 class="title">Tabel data Kandidat</h2>
                                    </div>
                                    <div class="card-body">
                                        <!-- Overview Wrap -->
                                        <div class="table-data__tool-right">
                                        <a href="<?= base_url('admin/kandidat/create') ?>">
                                        <button class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-plus"></i> Tambah</button></a>
                                       
                                        <a href="<?= site_url('admin/kandidat/hapus_semua/'); ?>">
                                        <button class="btn btn-outline-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus Semua Tabel</button></a>
                                    </div>
                                        </div>

                                    <!-- Import and Search Forms -->
                                         <div class="container">
                                            <div class="row">
                                                <!-- Form Import Data -->
                                                <div class="col-md-6">
                                                    <form action="<?= site_url('admin/kandidat/uploaddata') ?>" method="post" enctype="multipart/form-data" class="my-3">
                                                            <div class="input-group">
                                                                <input type="file" class="form-control <?= $this->session->flashdata('pesan') ? 'is-invalid' : '' ?>" id="importexcel" name="importexcel" accept=".xlsx,.xls" />
                                                                <div class="invalid-feedback">
                                                                    <?= $this->session->flashdata('pesan') ?>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-upload"></i></button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                </div>
                                                <!-- Form Pencarian -->
                                                <div class="col-md-6">
                                                    <form action="<?= site_url('admin/kandidat/cari'); ?>" method="get" class="my-3">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Cari NISN, Nama, Kelas" name="q">
                                                                <button class="btn btn-outline-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="au-card">
                                            <div class="card-body">
                                                <!-- DATA TABLE -->
                                                <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Kelas</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($kandidat as $row) : ?>
                                                            <tr class="tr-shadow">
                                                                <td><?= $row->id ?></td>
                                                                <td><?= $row->nisn ?></td>
                                                                <td><?= $row->nama ?></td>
                                                                <td><?= $row->kelas ?></td>
                                                                <td>
                                                                    <div class="table">
                                                                                <a href="<?= site_url('admin/kandidat/edit/' . $row->id ) ?>" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <button class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirmDelete(<?= $row->id; ?>)">
                                                                                <a href="<?= site_url('admin/kandidat/delete/' . $row->id ) ?>">
                                                                                </a><i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </div>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <div class="pagination">
                                                    <?= $this->pagination->create_links(); ?>
                                                </div>
                                                <!-- END DATA TABLE -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $this->load->view('admin/_partials/footer.php'); ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- hapus kandidat -->
    <script>
    function confirmDelete(id) {
        // Gunakan SweetAlert untuk menampilkan konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Resolve promise setelah SweetAlert selesai ditampilkan
                Swal.showLoading();
                Swal.getConfirmButton().setAttribute('disabled', '');

                // Operasi penghapusan
                $.ajax({
                    url: "<?= site_url('admin/kandidat/delete/'); ?>" + id,
                    method: "POST",
                    success: function(data) {
                        // Tampilkan pesan sukses setelah penghapusan
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil dihapus!',
                        }).then(() => {
                            // Redirect atau lakukan tindakan lain setelah menekan OK
                            location.reload(); // Refresh halaman
                        });
                    },
                    error: function(err) {
                        // Tampilkan pesan kesalahan jika penghapusan gagal
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat menghapus data!',
                        });
                    }
                });
            }
        });
    }
</script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

</body>
</html>
