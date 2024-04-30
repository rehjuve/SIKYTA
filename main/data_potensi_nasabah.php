<?php
include "config/koneksi.php";
include "login.php";
include "login_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <style>
        .modal {
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 50px auto;
            padding: 40px;
            border: 1px solid #888;
            max-width: 1000px;
            width: 80%;
            border-radius: 10px;
        }
    </style>

    <!-- Eskternal CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile_view.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a404219d80.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        
        <nav class="navbar bg-primary fixed-top navbar-expand-lg py-3 shadow">
            <div class="container-fluid">
                <div class="navbar-brand d-inline-block align-text-top">
                    <i class="fa-solid fa-check-to-slot me-2" style="color: #ffffff;"></i>
                    <span class="text-white fw-bold h5" style="letter-spacing: 1.2px;">SIKYTA - Sistem Pendataan Nasabah Cabang KYTA</span>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="navbar-brand">
                        <i class="user fa-solid fa-user text-white"></i>
                        <span class="text-white text-capitalize p-2"><?= $_SESSION["username"]; ?></span>
                    </div>
                    <button onclick="logout()" class="btn navbar-brand text-white px-3" style="margin-right: 0px;"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</Button>
                </div>
            </div>
        </nav>

        <!-- Konfirmasi logout -->
        <div class="modal" id="logout">
            <div class="modal-content">
                <div class="h3">Konfirmasi</div><hr style="margin-top: 0px; margin-bottom: 30px;">
                <div class="fs-5 mb-4">Apakah anda yakin ingin logout? </div>
                <div class="d-flex justify-content-end">
                    <button id="btn-ya" class="btn btn-primary px-4 me-2">Ya</button>
                    <button id="btn-tidak" class="btn btn-secondary px-4">Tidak</button>
                </div>
            </div>
        </div>

        <!-- Form Login -->
        <div class="card mx-auto rounded-4 shadow" style="margin-top: 120px;">
            <div class="card-body p-5">
                <!-- Title -->
                <div class="col"><div class="h2 mb-3">Data Potensi Nasabah</div></div>
                <hr style="margin-top: 0px; margin-bottom: 40px;">
                
                <div class="row">

                    <div class="col">
                        <!-- Menu Tambah -->
                        <button onclick="tambahPotensiNasabah()" class="btn btn-success px-4 me-2"><i class="fa-solid fa-plus me-2"></i>Tambah Potensi Nasabah</button>
                        <a href="home.php" class="btn btn-secondary px-4 me-2"><i class="fa-solid fa-table me-2"></i>Daftar Kunjungan Nasabah</a>
                        <button onclick="laporanNasabah()" class="btn btn-secondary px-4"><i class="fa-solid fa-file-lines me-2"></i>Laporan</button>
                    </div>

                    <div class="col-sm-4">
                        <!-- Search box -->
                        <form method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-end me-2" name="keyword" placeholder="Masukkan pencarian...">
                                <button type="submit" class="btn btn-primary rounded-start px-4"><i class="fa-solid fa-magnifying-glass me-2"></i>Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Tambah Potensi Nasabah -->
                <div id="tambahPotensiNasabah" class="modal">
                <div class="modal-content">
                    <div class="h3">Tambah Potensi Nasabah</div>
                    <hr style="margin-top: 0px; margin-bottom: 30px;">
                    <form action="tambah.php" method="POST" enctype="multipart/form-data" class="form-tambah">

                        <!-- nama -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-signature"></i></label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Nasabah" required>
                        </div>

                        <!-- alamat -->
                        <div class="input-group mb-4">
                            <label class="input-group-text"><i class="fa-solid fa-map-pin"></i></label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                        </div>

                        <!-- kota -->
                        <div class="input-group mb-4">
                            <label class="input-group-text"><i class="fa-solid fa-location-dot"></i></label>
                            <input type="text" class="form-control" name="kota" placeholder="Kota" required>
                        </div>

                        <!-- tipe -->
                        <div class="input-group mb-4">
                            <label class="input-group-text"><i class="fa-solid fa-layer-group"></i></label>
                            <input type="text" class="form-control" name="tipe" placeholder="Tipe" required>
                        </div>

                        <!-- klasifikasi_BC -->
                        <div class="input-group mb-4">
                            <label class="input-group-text"><i class="fa-solid fa-briefcase"></i></label>
                            <input type="text" class="form-control" name="klasifikasi_BC" placeholder="Klasifikasi BC" required>
                        </div>

                        <!-- nomor_telepon -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-phone"></i></label>
                            <input type="tel" class="form-control" name="nomor_telepon" placeholder="Nomor Telepon" title="Format: +kode_negara nomor_telepon (misal: +1 5551234567)">
                        </div>

                        <!-- email -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-envelope"></i></label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>

                        <!-- website -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-globe"></i></label>
                            <input type="text" class="form-control" name="website" placeholder="Website">
                        </div>

                        <!-- maps -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-map"></i></label>
                            <input type="text" class="form-control" name="maps" placeholder="Maps" required>
                        </div>

                        <!-- status_kunjungan -->
                        <div class="input-group mb-4">
                            <label class="input-group-text"><i class="fa-solid fa-person-walking"></i></label>
                            <select name="status_kunjungan" class="form-select">
                                <option selected>Status Kunjungan</option>
                                <option value="Ya">Sudah</option>
                                <option value="Tidak">Belum</option>
                            </select>
                        </div>

                        <!-- PIC -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-user"></i></label>
                            <input type="text" class="form-control" name="PIC" placeholder="PIC" required>
                        </div>

                        <div class="row g-3">
                            <div class="col-6 col-sm-3 col-md-2">
                                <button type="button" class="btn btn-secondary form-control px-4 me-2 mt-3" onclick="closePotensiNasabah()"><i class="fa-solid fa-xmark me-2"></i>Batal</button>
                            </div>
                            <div class="col-6 col-sm-3 col-md-10">
                                <button type="submit" name="tambah_potensi" class="btn btn-primary form-control text-uppercase mt-3">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>


                <!-- Tabel Daftar Potensi Nasabah -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-fit text-center">
                        <thead>
                            <tr>
                            <th class="py-3">No</th>
                            <th class="py-3">Nama</th>
                            <th class="py-3">Alamat</th>
                            <th class="py-3">Kota</th>
                            <th class="py-3">Tipe</th>
                            <th class="py-3">Klasifikasi BC</th>
                            <th class="py-3">Nomor Telepon</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Website</th>
                            <th class="py-3">Maps</th>
                            <th class="py-3">Status Kunjungan</th>
                            <th class="py-3">PIC</th>
                            <th class="py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Cari -->
                            <?php
                            if (isset($_GET['keyword'])) {
                                $keyword = $_GET['keyword'];
                                $query = "SELECT * FROM potensi_nasabah WHERE nama LIKE '%$keyword%' OR kota LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR tipe LIKE '%$keyword%' OR klasifikasi_BC LIKE '%$keyword%' OR status_kunjungan LIKE '%$keyword%' OR alamat LIKE '%$keyword%'"; 
                                $result = mysqli_query($conn, $query);
                                echo "<div style='margin-bottom: 16px;'>Hasil pencarian: $keyword</div>"; 
                            } else {
                                $result = mysqli_query($conn, "SELECT * FROM potensi_nasabah ORDER BY id_potensi ASC");
                            }
    
                            $no = 1;

                            
                            // Looping untuk menampilkan data
                            while ($row = mysqli_fetch_array($result)):
                            ?>
                                <tr>
                                    <td class="py-3"><?= $no++ ?></td>
                                    <td class="py-3"><?= $row['nama'] ?></td>
                                    <td class="py-3"><?= $row['alamat'] ?></td>
                                    <td class="py-3"><?= $row['kota'] ?></td>
                                    <td class="py-3"><?= $row['tipe'] ?></td>
                                    <td class="py-3"><?= $row['klasifikasi_BC'] ?></td>
                                    <td class="py-3"><?= $row['nomor_telepon'] ?></td>
                                    <td class="py-3"><?= $row['email'] ?></td>
                                    <td class="py-3"><a href="<?= $row['website'] ?>" target="_blank"><?= $row['website'] ?></a></td>
                                    <td class="py-3"><a href="<?= $row['maps'] ?>" target="_blank">Klik disini</a></td>
                                    <td class="py-3"><?= $row['status_kunjungan'] ?></td>
                                    <td class="py-3"><?= $row['PIC'] ?></td>
                                    
                                    <td class="py-3">
                                        <a href="ubah_potensi_nasabah.php?id=<?= $row['id_potensi'] ?>"><i class="fa-solid fa-pen btn-primary me-3"></i></a>
                                        <a href="hapus.php?potensi_nasabah&id=<?= $row['id_potensi'] ?>"><i class="fa-solid fa-trash btn-danger"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pilih laporan -->
                <div id="laporanNasabah" class="modal">
                    <div class="modal-content">
                        <div class="d-flex justify-content-between">
                            <div class="h3">Laporan</div>
                            <div class="btn btn-close" onclick="closeLaporan()"></div>
                        </div>

                        <hr style="margin-top: 0px; margin-bottom: 30px;">
                        <div class="card-text mb-4">Buat laporan berdasarkan:</div>

                        <div class="row">
                            <div class="col">
                                <a href="laporan.php?potensi_nasabah" class="btn btn-primary px-4 me-2">Semua Data</a>
                                <button class="btn btn-secondary px-4 me-2" onclick="pilihStatusKunjungan()">Status Kunjungan</button>
                            </div>
                        </div>

                        <form id="statusKunjunganForm" method="GET" action="laporan.php" class="mt-4" style="display: none;">
                            <div class="input-group">
                                <select name="status_kunjungan" class="form-select rounded-end me-2" required>
                                    <option selected>Pilih</option>
                                    <option value="Sudah">Sudah</option>
                                    <option value="Belum">Belum</option>
                                </select>
                                <button type="submit" class="btn btn-primary rounded-start px-4">Buat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-white py-3" style="margin-top: 68px;">
        <div class="container-fluid text-center">
            &copy; <?php echo date('Y'); ?> - Sistem Pendataan Nasabah Mandiri KCP Kyai Tapa
        </div>
    </footer>

    <script>
        function logout() {
            var modal = document.getElementById('logout');
            modal.style.display = 'block';

            var yes = document.getElementById('btn-ya');
            var no = document.getElementById('btn-tidak');

            yes.addEventListener('click', function() {
                window.location.href = 'logout.php';
            });

            no.addEventListener('click', function() {
                modal.style.display = 'none';
            });
        }

        function tambahPotensiNasabah() {
            var modal = document.getElementById('tambahPotensiNasabah');
            modal.style.display = 'block';
        }

        function closePotensiNasabah() {
            var modal = document.getElementById('tambahPotensiNasabah');
            modal.style.display = 'none';
        }

        function laporanNasabah() {
            var modal = document.getElementById('laporanNasabah');
            modal.style.display = 'block';
        }

        function closeLaporan() {
            var modal = document.getElementById('laporanNasabah');
            modal.style.display = 'none';
        }

        function pilihStatusKunjungan() {
            var ketInput = document.getElementById('statusKunjunganForm');
            if (ketInput.style.display === 'none') {
                ketInput.style.display = 'block';
            } else {
                ketInput.style.display = 'none';
            }
        }
    </script>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>