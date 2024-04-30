<?php
include "config/koneksi.php";

// Tambah Kunjungan
if (isset($_POST['tambah_kunjungan'])) {
    date_default_timezone_set('Asia/Jakarta');

    $nama_nasabah = $_POST['nama_nasabah'];
    $nomor_rekening = $_POST['nomor_rekening'];
    $nominal_pipeline = $_POST['nominal_pipeline'];
    $status_nasabah = $_POST['status_nasabah'];
    $status_potensi = $_POST['status_potensi'];
    $potensi_segmen = $_POST['potensi_segmen'];
    $no_telepon = $_POST['no_telepon'];
    $tanggal_kunjungan = $_POST['tanggal_kunjungan'];
    $PIC = $_POST['PIC'];
    $giro = $_POST['giro'];
    $tabungan = $_POST['tabungan'];
    $deposito = $_POST['deposito'];
    $kopra = $_POST['kopra'];
    $kartu_kredit = $_POST['kartu_kredit'];
    $KMK = $_POST['KMK'];
    $KI = $_POST['KI'];
    $KUM = $_POST['KUM'];
    $KUR = $_POST['KUR'];
    $KSM = $_POST['KSM'];
    $KKP = $_POST['KKP'];
    $KPR = $_POST['KPR'];
    $SME = $_POST['SME'];
    $Payroll = $_POST['Payroll'];
    $status_kunjungan = $_POST['status_kunjungan'];
    $keterangan = $_POST['keterangan'];

    // Create the INSERT query
    $query = "INSERT INTO kunjungan_nasabah 
        (nama_nasabah, nomor_rekening, nominal_pipeline, status_nasabah, status_potensi, potensi_segmen, no_telepon, tanggal_kunjungan, 
        PIC, giro, tabungan, deposito, kopra, kartu_kredit, KMK, KI, KUM, KUR, KSM, KKP, KPR, SME, Payroll, status_kunjungan, keterangan) 
        VALUES ('$nama_nasabah', '$nomor_rekening', '$nominal_pipeline', '$status_nasabah', '$status_potensi', '$potensi_segmen', '$no_telepon', '$tanggal_kunjungan', 
        '$PIC', '$giro', '$tabungan', '$deposito', '$kopra', '$kartu_kredit', '$KMK', '$KI', '$KUM', '$KUR', 
        '$KSM', '$KKP', '$KPR', '$SME', '$Payroll', '$status_kunjungan', '$keterangan')";
    
    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        echo "<script>window.location='home.php'</script>"; // Redirect to home page after successful insertion
    } else {
        die("Maaf, data gagal disimpan: " . mysqli_error($conn)); // Display error message if insertion fails
    }
}


elseif (isset($_POST['tambah_akun'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $role = $_POST['role'];

    $query = "INSERT INTO users (username, pass, nama, email, status, role)
              VALUES ('$username', '$pass', '$nama', '$email', '$status', '$role')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>window.location='index.php'</script>";
    } else {
        die("Maaf data gagal disimpan: " . mysqli_error($conn));
    }
}

// Tambah Potensi Nasabah
elseif (isset($_POST['tambah_potensi'])) {
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

    $query = "INSERT INTO potensi_nasabah 
        (nama, alamat, kota, tipe, klasifikasi_BC, nomor_telepon, email, website, maps, status_kunjungan, PIC) 
        
        VALUES ('$nama', '$alamat', '$kota', '$tipe', '$klasifikasi_BC', $nomor_telepon, '$email', '$website', '$maps', '$status_kunjungan', '$PIC')";
        
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>window.location='data_potensi_nasabah.php'</script>";
    } else {
        die("Maaf, data gagal disimpan: " . mysqli_error($conn));
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
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

        <!-- Form Login -->
        <div class="card mx-auto rounded-4 shadow" style="max-width: 600px; margin-top: 150px;">
            <div class="card-body p-5">
                <div class="card-title h2 text-center mb-3">Tambah Akun</div>
                <p class="card-text text-center text-secondary mb-4" style="font-size: 14px;">Silahkan Isi Data dengan Benar!</p>
                <hr>
                <form method="POST" enctype="multipart/form-data" class="form-akun">
                    <a href="index.php" class="d-flex justify-content-center" style="font-size: 14px; cursor: pointer;">Sudah punya akun</a>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <div class="input-group mt-4 mb-4 input-user">
                                <label class="input-group-text"><i class="fa-solid fa-user"></i></label>
                                <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="input-group mt-4 mb-4 input-nama">
                                <label class="input-group-text"><i class="fa-solid fa-signature"></i></label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama" aria-label="Nama" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <label class="input-group-text"><i class="fa-solid fa-envelope"></i></label>
                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" required>
                    </div>
                    <div class="input-group mb-4">
                        <label class="input-group-text"><i class="fa-solid fa-key"></i></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <div class="input-group mb-4 input-status">
                                <label class="input-group-text"><i class="fa-solid fa-chart-simple"></i></label>
                                <select class="form-select" name="status">
                                    <option selected>Pilih status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non-Aktif">Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="input-group mb-4 input-role">
                                <label class="input-group-text"><i class="fa-solid fa-dice-d6"></i></label>
                                <select class="form-select" name="role">
                                    <option selected>Pilih role</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="tambah_akun" class="btn btn-primary fw-semibold form-control text-uppercase"
                        style="letter-spacing: 1px;">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-white py-3" style="margin-top: 68px;">
        <div class="container-fluid text-center">
            &copy; <?php echo date('Y'); ?> - Sistem Pendataan Nasabah Mandiri KCP Kyai Tapa
        </div>
    </footer>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>