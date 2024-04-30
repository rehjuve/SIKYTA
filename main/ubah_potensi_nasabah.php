<?php
include "config/koneksi.php";
include "login.php";
include "login_session.php";

if (isset($_POST['ubah_potensi'])) {
    
    if (isset($_GET['id'])) {
        $id_potensi = $_GET['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $tipe = $_POST['tipe'];
        $klasifikasi_BC = $_POST['klasifikasi_BC'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $maps = $_POST['maps'];
        $status_kunjungan = $_POST['status_kunjungan'];
        $PIC = $_POST['PIC'];
    
        $query = "UPDATE potensi_nasabah 
            SET nama = '$nama',
                alamat = '$alamat',
                kota = '$kota',
                tipe = '$tipe',
                klasifikasi_BC = '$klasifikasi_BC',
                nomor_telepon = '$nomor_telepon',
                email = '$email',
                website = '$website',
                maps = '$maps',
                status_kunjungan = '$status_kunjungan',
                PIC = '$PIC'
            WHERE id_potensi = '$_GET[id]'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>window.location.href='data_potensi_nasabah.php';</script>";
        } else {
            echo "<script>alert('Data gagal diubah!');</script>";
        }
    }
}

$id_potensi = "";
$nama = "";
$alamat = "";
$kota = "";
$tipe = "";
$klasifikasi_BC = "";
$nomor_telepon = "";
$email = "";
$website = "";
$maps = "";
$status_kunjungan = "";
$PIC = "";

if (isset($_GET['id'])) {
    $id_potensi = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM potensi_nasabah WHERE id_potensi = '$id_potensi'");
    $row = mysqli_fetch_array($result);

    if ($row) {
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $kota = $row['kota'];
        $tipe = $row['tipe'];
        $klasifikasi_BC = $row['klasifikasi_BC'];
        $nomor_telepon = $row['nomor_telepon'];
        $email = $row['email'];
        $website = $row['website'];
        $maps = $row['maps'];
        $status_kunjungan = $row['status_kunjungan'];
        $PIC = $row['PIC'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
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

        <!-- Form Ubah Potensi Nasabah -->
        <div class="card mx-auto rounded-4 shadow" style="max-width: 1000px; margin-top: 120px;">
            <div class="card-body p-5">
                <div class="h3 card-title">Ubah Data Potensi Nasabah</div>
                <hr style="margin-top: 0px; margin-bottom: 30px;">
                <form method="POST" enctype="multipart/form-data" class="form-ubah">
                    <div class="row g-3">
                        <!-- Nama -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-signature"></i></label>
                            <input type="text" class="form-control" name="nama" placeholder="<?= $nama ?>" value="<?= $nama ?>">
                        </div>

                        <!-- Alamat -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-map-pin"></i></label>
                            <input type="text" class="form-control" name="alamat" placeholder="<?= $alamat ?>" value="<?= $alamat ?>">
                        </div>

                        <!-- Kota -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-location-dot"></i></label>
                            <input type="text" class="form-control" name="kota" placeholder="<?= $kota ?>" value="<?= $kota ?>">
                        </div>

                        <!-- Tipe -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-layer-group"></i></label>
                            <input type="text" class="form-control" name="tipe" placeholder="<?= $tipe ?>" value="<?= $tipe ?>">
                        </div>

                        <!-- Klasifikasi BC -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-briefcase"></i></label>
                            <input type="text" class="form-control" name="klasifikasi_BC" placeholder="<?= $klasifikasi_BC ?>" value="<?= $klasifikasi_BC ?>">
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-phone"></i></label>
                            <input type="tel" class="form-control" name="nomor_telepon" placeholder="<?= $nomor_telepon ?>" value="<?= $nomor_telepon ?>">
                        </div>

                        <!-- Email -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-envelope"></i>></label>
                            <input type="text" class="form-control" name="email" placeholder="<?= $email ?>" value="<?= $email ?>">
                        </div>
                        <!-- Website -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-globe"></i></label>
                            <input type="text" class="form-control" name="website" placeholder="<?= $website ?>" value="<?= $website ?>">
                        </div>
                        <!-- Maps -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-map"></i></label>
                            <input type="text" class="form-control" name="maps" placeholder="<?= $maps ?>" value="<?= $maps ?>">
                        </div>
                        <!-- Status Kunjungan -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-person-walking"></i></label>
                            <input type="text" class="form-control" name="status_kunjungan" placeholder="<?= $status_kunjungan ?>" value="<?= $status_kunjungan ?>">
                        </div>
                        <!-- PIC -->
                        <div class="input-group mb-4">
                            <label class="input-group-text id-label"><i class="fa-solid fa-user"></i></label>
                            <input type="text" class="form-control" name="PIC" placeholder="<?= $PIC ?>" value="<?= $PIC ?>">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-6 col-sm-3 col-md-2 button-ubah">
                            <a href="home.php" type="button" class="btn btn-secondary form-control px-4 me-2 mt-4"><i class="fa-solid fa-xmark me-2"></i>Batal</a>
                        </div>
                        <div class="col-6 col-sm-9 col-md-10 button-ubah">
                            <button type="submit" name="ubah_potensi" class="btn btn-primary form-control text-uppercase mt-4">Simpan</button>
                        </div>
                    </div>
                </form>
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
    </script>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>