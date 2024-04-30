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

        <!-- Navbar -->
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

        <!-- DAFTAR NASABAH BC -->
        <div class="card mx-auto rounded-4 shadow" style="margin-top: 130px;">
            <div class="card-body p-5">
                <!-- Title -->
                <div class="h2 mb-3">Daftar Kunjungan Nasabah</div>
                <hr style="margin-top: 0px; margin-bottom: 40px;">
                
                <div class="row">
                    <div class="col">
                        <!-- Menu Tambah -->
                        <button onclick="tambahKunjungan()" class="btn btn-success rounded-2 px-4 me-2"><i class="fa-solid fa-plus me-2"></i>Tambah Kunjungan</button>

                        <!-- Data Potensi Nasabah-->
                        <a href="data_potensi_nasabah.php" class="btn btn-secondary rounded-2 px-4 me-2"><i class="fa-solid fa-table me-2"></i>Data Potensi Nasabah</a>
                            
                        <!-- Laporan -->
                        <button onclick="laporanKunjungan()" class="btn btn-secondary rounded-2 px-4"><i class="fa-solid fa-file-lines me-2"></i>Laporan</button>
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
                
                <!-- Form Tambah Kunjungan Nasabah -->
                <div id="tambahKunjungan" class="modal">
                    <div class="modal-content">
                        <div class="h3">Tambah Kunjungan Nasabah</div><hr style="margin-top: 0px; margin-bottom: 30px;">
                        <form action="tambah.php" method="POST" enctype="multipart/form-data" class="form-tambah">

                            <!-- nama -->
                            <div class="input-group mb-4">
                                <label class="input-group-text id-label"><i class="fa-solid fa-signature"></i></label>
                                <input type="text" class="form-control" name="nama_nasabah"
                                    placeholder="Nama Nasabah">
                            </div>

                            <!-- nomor rekening -->
                            <div class="input-group mb-4">
                                <label class="input-group-text id-label"><i class="fa-solid fa-money-check-dollar"></i></label>
                                <input type="text" class="form-control" name="nomor_rekening"
                                    placeholder="Nomor Rekening">
                            </div>

                            <!-- Nominal Pipeline -->
                            <div class="input-group mb-4">
                                <label class="input-group-text id-label"><i class="fa-solid fa-money-bill-transfer"></i></label>
                                <input type="text" class="form-control" name="nominal_pipeline"placeholder="Nominal Pipeline" >
                            </div>

                            <!-- status nasabah -->
                            <div class="input-group mb-4">
                                <label class="input-group-text"><img src="https://iconape.com/wp-content/png_logo_vector/bank-mandiri.png" style="width: 20px; height: auto;" /></label>
                                <label class="input-group-text">Status Nasabah</label>
                                <select name="status_nasabah" class="form-select">
                                    <option selected>Pilih</option>
                                    <option value="BMRI">BMRI</option>
                                    <option value="NON">Non-BMRI</option>
                                </select>
                            </div>

                            
                            <!-- status potensi -->
                            <div class="input-group mb-4">
                                <label class="input-group-text"><i class="fa-solid fa-user-tag"></i></label>
                                <label class="input-group-text">Status Potensi</label>
                                <select name="status_potensi" class="form-select">
                                    <option selected>Pilih</option>
                                    <option value="Potensial">Potensial</option>
                                    <option value="Non">Tidak Potensial</option>
                                </select>
                            </div>

                            <!-- potensi segmen -->
                            <div class="input-group mb-4">
                                <label class="input-group-text"><i class="fa-solid fa-object-group"></i></label>
                                <label class="input-group-text">Potensi Segmen</label>
                                <select name="potensi_segmen" class="form-select">
                                    <option selected>Pilih</option>
                                    <option value="Individu">Individu</option>
                                    <option value="Corporate">Corporate</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="SME">SME</option>
                                    <option value="Wealth">Wealth</option>
                                    <option value="Micro">Micro</option>
                                    <option value="Kelembagaan">Kelembagaan</option>
                                </select>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="input-group mb-4">
                                <label class="input-group-text id-label"><i class="fa-solid fa-phone"></i></label>
                                <input type="tel" class="form-control" name="no_telepon" placeholder="Nomor Telepon"  title="Format: +kode_negara nomor_telepon (misal: +1 5551234567)">
                            </div>


                            <!-- Tanggal Kunjungan -->
                            <div class="input-group mb-4">
                                <div class="input-group mb-4">
                                    <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                    <input type="datetime-local" class="form-control" name="tanggal_kunjungan">
                                </div>
                            </div>

                            <!-- PIC -->
                            <div class="input-group mb-4">
                                <div class="input-group mb-4">
                                    <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                    <input type="text" class="form-control" name="PIC" placeholder="PIC">
                                </div>
                            </div>

                            <div>
                                <h4>Produk yang Ditawarkan</h4>
                            </div>

                            <!-- PRODUK -->
                            <div class="row g-3 extra">

                                <!-- Giro -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <label class="input-group-text">Giro</label>
                                        <select name="giro" class="form-select">
                                            <option selected>Giro</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tabungan -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <label class="input-group-text">Tabungan</label>
                                        <select name="tabungan" class="form-select">
                                            <option selected>Tabungan</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Deposito -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <label class="input-group-text">Deposito</label>
                                        <select name="deposito" class="form-select">
                                            <option selected> </option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Kopra -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="kopra" class="form-select">
                                            <option selected>Kopra</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Kartu Kredit -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="kartu_kredit" class="form-select">
                                            <option selected>Kartu Kredit</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- kmk -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="KMK" class="form-select">
                                            <option selected>Kredit Modal Kerja</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- KI -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="KI" class="form-select">
                                            <option selected>Kredit Investasi</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- KUM -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="KUM" class="form-select">
                                            <option selected>Kredit Usaha Mikro</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- KUR -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="KUR" class="form-select">
                                            <option selected>Kredit Usaha Rakyat</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- KSM -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="KSM" class="form-select" >
                                            <option selected>Kredit Serbaguna Mandiri</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- KKP -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="KKP" class="form-select">
                                            <option selected>Kartu Kredit Pemerintah</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- KPR -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="KPR" class="form-select">
                                            <option selected>Kredit Kepemilikan Rumah</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- SME -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="SME" class="form-select" >
                                            <option selected>SME</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Payroll -->
                                <div class="col-12 col-sm-4 col-md-6">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                                        <select name="Payroll" class="form-select">
                                            <option selected>Payroll</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <h4>Hasil Kunjungan</h4>
                                </div>

                                <!-- stat kunjungan -->
                                <div class="input-group mb-4">
                                    <label class="input-group-text"><i class="fa-solid fa-person-walking"></i></label>
                                    <label class="input-group-text">Status Kunjungan</label>
                                    <select name="status_kunjungan" class="form-select" >
                                        <option selected>Pilih</option>
                                        <option value="Closing">Closing</option>
                                        <option value="Follow Up">Follow Up</option>
                                        <option value="Tidak Bersedia">Tidak Bersedia</option>
                                    </select>
                                </div>

                                <!-- keterangan -->
                                <div class="input-group mb-4">
                                    <div class="input-group mb-4">
                                        <label class="input-group-text id-label"><i class="fa-solid fa-file-lines"></i></label>
                                        <textarea class="form-control" name="keterangan" placeholder="keterangan"></textarea>
                                    </div>
                                </div>


                                

                            </div>

                            <div class="row g-3">
                                <div class="col-6 col-sm-3 col-md-2">
                                    <button type="button" class="btn btn-secondary form-control px-4 me-2 mt-3" onclick="closeKunjungan()"><i class="fa-solid fa-xmark me-2"></i>Batal</button>
                                </div>
                                <div class="col-6 col-sm-3 col-md-10">
                                    <button type="submit" name="tambah_kunjungan" class="btn btn-primary form-control text-uppercase mt-3">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabel daftar kunjungan -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-fit text-center">
                    <thead>
                        <tr>
                            <th class="py-3">ID</th>
                            <th class="py-3">Nama Nasabah</th>
                            <th class="py-3">Nomor Rekening</th>
                            <th class="py-3">Nominal Pipeline</th>
                            <th class="py-3">Status Nasabah</th>
                            <th class="py-3">Status Potensi</th>
                            <th class="py-3">Potensi Segmen</th>
                            <th class="py-3">Nomor Telepon</th>
                            <th class="py-3">Tanggal Kunjungan</th>
                            <th class="py-3">PIC</th>
                            <th class="py-3">Giro</th>
                            <th class="py-3">Tabungan</th>
                            <th class="py-3">Deposito</th>
                            <th class="py-3">Kopra</th>
                            <th class="py-3">Kartu Kredit</th>
                            <th class="py-3">KMK</th>
                            <th class="py-3">KI</th>
                            <th class="py-3">KUM</th>
                            <th class="py-3">KUR</th>
                            <th class="py-3">KSM</th>
                            <th class="py-3">KKP</th>
                            <th class="py-3">KPR</th>
                            <th class="py-3">SME</th>
                            <th class="py-3">Payroll</th>
                            <th class="py-3">Status Kunjungan</th>
                            <th class="py-3">Keterangan</th>
                            <th class="py-3">Aksi</th>
                        </tr>
                    </thead>

                        
                        <tbody>


                            <?php
                            if (isset($_GET['keyword'])) {
                                $keyword = $_GET['keyword'];
                                $query = "SELECT * FROM kunjungan_nasabah WHERE nama_nasabah LIKE '%$keyword%' OR status_potensi LIKE '%$keyword%' OR keterangan LIKE '%$keyword%' OR potensi_segmen LIKE '%$keyword%' OR status_kunjungan LIKE '%$keyword%'";
                                $result = mysqli_query($conn, $query);
                                echo "<div style='margin-bottom: 16px;'>Hasil pencarian: $keyword</div>";    
                            } else {
                                $result = mysqli_query($conn, "SELECT * FROM kunjungan_nasabah ORDER BY tanggal_kunjungan DESC");
                            }
    
                            $no = 1;
                            
                            // Looping untuk menampilkan data
                            while ($row = mysqli_fetch_array($result)):
                                ?>
                                <tr>
                                <td class="py-3"><?= $no++ ?></td>
                                <td class="py-3"><?= $row['nama_nasabah'] ?></td>
                                <td class="py-3"><?= $row['nomor_rekening'] ?></td>
                                <td class="py-3"><?= $row['nominal_pipeline'] ?></td>
                                <td class="py-3"><?= $row['status_nasabah'] ?></td>
                                <td class="py-3"><?= $row['status_potensi'] ?></td>
                                <td class="py-3"><?= $row['potensi_segmen'] ?></td>
                                <td class="py-3"><?= $row['no_telepon'] ?></td>
                                <td class="py-3"><?= date('d-m-Y', strtotime($row['tanggal_kunjungan'])) ?></td>
                                <td class="py-3"><?= $row['PIC'] ?></td>
                                <td class="py-3"><?= $row['giro'] ?></td>
                                <td class="py-3"><?= $row['tabungan'] ?></td>
                                <td class="py-3"><?= $row['deposito'] ?></td>
                                <td class="py-3"><?= $row['kopra'] ?></td>
                                <td class="py-3"><?= $row['kartu_kredit'] ?></td>
                                <td class="py-3"><?= $row['KMK'] ?></td>
                                <td class="py-3"><?= $row['KI'] ?></td>
                                <td class="py-3"><?= $row['KUM'] ?></td>
                                <td class="py-3"><?= $row['KUR'] ?></td>
                                <td class="py-3"><?= $row['KSM'] ?></td>
                                <td class="py-3"><?= $row['KKP'] ?></td>
                                <td class="py-3"><?= $row['KPR'] ?></td>
                                <td class="py-3"><?= $row['SME'] ?></td>
                                <td class="py-3"><?= $row['Payroll'] ?></td>
                                <td class="py-3"><?= $row['status_kunjungan'] ?></td>
                                <td class="py-3"><?= $row['keterangan'] ?></td>

                                    <td class="py-3">
                                        <a href="ubah.php?id=<?= $row['id_kunjungan'] ?>"><i class="fa-solid fa-pen me-3 btn-primary"></i></a>
                                        <a href="hapus.php?kunjungan_nasabah&id=<?= $row['id_kunjungan'] ?>"><i class="fa-solid fa-trash btn-danger"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pilih laporan -->
                <div id="laporanKunjungan" class="modal">
                    <div class="modal-content">
                        <div class="d-flex justify-content-between">
                            <div class="h3">Laporan</div>
                            <div class="btn btn-close" onclick="closeLaporan()"></div>
                        </div>
                        <hr style="margin-top: 0px; margin-bottom: 30px;">
                        <div class="card-text mb-4">Buat laporan berdasarkan:</div>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary px-4 me-2" onclick="inputTanggal()">Tanggal</button>
                                <button class="btn btn-secondary px-4 me-2" onclick="pilihStatusNasabah()">Status</button>
                            </div>
                        </div>

                        <form id="tanggalForm" method="GET" action="laporan.php" class="mt-4" style="display: none;">
                            <div class="input-group">
                                <input type="date" class="form-control rounded-end me-2" name="tanggal">
                                <button type="submit" class="btn btn-primary rounded-start px-4">Buat</button>
                            </div>
                        </form>

                        <form id="statusForm" method="GET" action="laporan.php" class="mt-4" style="display: none;">
                            <div class="input-group">
                                <select name="status" class="form-select rounded-end me-2">
                                    <option selected>Pilih</option>
                                    <option value="BMRI">BMRI</option>
                                    <option value="NON">Non-BMRI</option>
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

        function tambahKunjungan() {
            var modal = document.getElementById('tambahKunjungan');
            modal.style.display = 'block';
        }

        function closeKunjungan() {
            var modal = document.getElementById('tambahKunjungan');
            modal.style.display = 'none';
        }

        function laporanKunjungan() {
            var modal = document.getElementById('laporanKunjungan');
            modal.style.display = 'block';
        }

        function closeLaporan() {
            var modal = document.getElementById('laporanKunjungan');
            modal.style.display = 'none';
        }

        function inputTanggal() {
            var dateInput = document.getElementById('tanggalForm');
            if (dateInput.style.display === 'none') {
                dateInput.style.display = 'block';
            } else {
                dateInput.style.display = 'none';
            }
        }

        function pilihStatusNasabah() {
            var bagianInput = document.getElementById('statusForm');
            if (bagianInput.style.display === 'none') {
                bagianInput.style.display = 'block';
            } else {
                bagianInput.style.display = 'none';
            }
        }
    </script>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>