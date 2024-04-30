<?php
include "config/koneksi.php";
include "login.php";
include "login_session.php";

if (isset($_POST['ubah_kunjungan'])) {
    
   if (isset($_GET['id'])) {
       $id_kunjungan = $_GET['id'];
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
   
       // Sanitize input to prevent SQL injection
       $nama_nasabah = mysqli_real_escape_string($conn, $nama_nasabah);
       $nomor_rekening = mysqli_real_escape_string($conn, $nomor_rekening);
       // Repeat this for all other variables...

       $query = "UPDATE kunjungan_nasabah 
           SET nama_nasabah = '$nama_nasabah',
               nomor_rekening = '$nomor_rekening',
               nominal_pipeline = '$nominal_pipeline',
               status_nasabah = '$status_nasabah',
               status_potensi = '$status_potensi',
               potensi_segmen = '$potensi_segmen',
               no_telepon = '$no_telepon',
               tanggal_kunjungan = '$tanggal_kunjungan',
               PIC = '$PIC',
               giro = '$giro',
               tabungan = '$tabungan',
               deposito = '$deposito',
               kopra = '$kopra',
               kartu_kredit = '$kartu_kredit',
               KMK = '$KMK',
               KI = '$KI',
               KUM = '$KUM',
               KUR = '$KUR',
               KSM = '$KSM',
               KKP = '$KKP',
               KPR = '$KPR',
               SME = '$SME',
               Payroll = '$Payroll',
               status_kunjungan = '$status_kunjungan',
               keterangan = '$keterangan'
           WHERE id_kunjungan = '$id_kunjungan'";

       $result = mysqli_query($conn, $query);

       if ($result) {
           echo "<script>window.location.href='home.php';</script>";
       } else {
           echo "<script>alert('Data gagal diubah!');</script>";
       }
   }
}


$id_kunjungan = "";
$nama_nasabah = "";
$nomor_rekening = "";
$nominal_pipeline = "";
$status_nasabah = "";
$status_potensi = "";
$potensi_segmen = "";
$no_telepon = "";
$tanggal_kunjungan = "";
$PIC = "";
$giro = "";
$tabungan = "";
$deposito = "";
$kopra = "";
$kartu_kredit = "";
$KMK = "";
$KI = "";
$KUM = "";
$KUR = "";
$KSM = "";
$KKP = "";
$KPR = "";
$SME = "";
$Payroll = "";
$status_kunjungan = "";
$keterangan = "";

if (isset($_GET['id'])) {
    $id_kunjungan = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM kunjungan_nasabah WHERE id_kunjungan = '$id_kunjungan'");
    $row = mysqli_fetch_array($result);

    if ($row) {
        $nama_nasabah = $row['nama_nasabah'];
        $nomor_rekening = $row['nomor_rekening'];
        $nominal_pipeline = $row['nominal_pipeline'];
        $status_nasabah = $row['status_nasabah'];
        $status_potensi = $row['status_potensi'];
        $potensi_segmen = $row['potensi_segmen'];
        $no_telepon = $row['no_telepon'];
        $tanggal_kunjungan= date('Y-m-d', strtotime($row['tanggal_kunjungan'])); 
        $PIC = $row['PIC'];
        $giro = $row['giro'];
        $tabungan = $row['tabungan'];
        $deposito = $row['deposito'];
        $kopra = $row['kopra'];
        $kartu_kredit = $row['kartu_kredit'];
        $KMK = $row['KMK'];
        $KI = $row['KI'];
        $KUM = $row['KUM'];
        $KUR = $row['KUR'];
        $KSM = $row['KSM'];
        $KKP = $row['KKP'];
        $KPR = $row['KPR'];
        $SME = $row['SME'];
        $Payroll = $row['Payroll'];
        $status_kunjungan = $row['status_kunjungan'];
        $keterangan = $row['keterangan'];
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
               <div class="h3">Konfirmasi</div>
               <hr style="margin-top: 0px; margin-bottom: 30px;">
               <div class="fs-5 mb-4">Apakah anda yakin ingin logout? </div>
               <div class="d-flex justify-content-end">
                  <button id="btn-ya" class="btn btn-primary px-4 me-2">Ya</button>
                  <button id="btn-tidak" class="btn btn-secondary px-4">Tidak</button>
               </div>
            </div>
         </div>
         
         <!-- Form Ubah Kunjungan -->
         <div class="card mx-auto rounded-4 shadow" style="max-width: 1000px; margin-top: 120px;">
            <div class="card-body p-5">
               <div class="h3 card-title">Ubah Data Kunjungan</div>
               <hr style="margin-top: 0px; margin-bottom: 30px;">
               <form method="POST" enctype="multipart/form-data" class="form-ubah">
                  <div class="row g-3">
                     <!-- Nama Nasabah -->
                     <div class="input-group mb-4">
                        <label class="input-group-text id-label"><i class="fa-solid fa-signature"></i></label>
                        <input type="text" class="form-control" name="nama_nasabah" placeholder="<?= $nama_nasabah ?>" value="<?= $nama_nasabah ?>">
                     </div>

                     <!-- Nomor Rekening -->
                     <div class="input-group mb-4">
                        <label class="input-group-text id-label"><i class="fa-solid fa-money-check-dollar"></i></label>
                        <input type="number" class="form-control" name="nomor_rekening" placeholder="<?= $nomor_rekening ?>" value="<?= $nomor_rekening ?>">
                     </div>

                     <!-- Nominal Pipeline -->
                     <div class="input-group mb-4">
                        <label class="input-group-text id-label"><i class="fa-solid fa-money-bill-transfer"></i></label>
                        <input type="number" class="form-control" name="nominal_pipeline" placeholder="<?= $nominal_pipeline ?>" value="<?= $nominal_pipeline ?>">
                     </div>

                     <!-- status nasabah -->
                     <div class="input-group mb-4">
                        <label class="input-group-text"><img src="https://iconape.com/wp-content/png_logo_vector/bank-mandiri.png" style="width: 20px; height: auto;" /></label>
                        <label class="input-group-text">Status Nasabah</label>
                        <select name="status_nasabah" class="form-select">
                           <option selected>Pilih</option>
                           <option value="BMRI" <?= ($status_nasabah == 'BMRI') ? 'selected' : '' ?>>BMRI</option>
                           <option value="NON" <?= ($status_nasabah == 'NON') ? 'selected' : '' ?>>Non-BMRI</option>
                        </select>
                     </div>


                     <!-- status potensi -->
                     <div class="input-group mb-4">
                        <label class="input-group-text"><i class="fa-solid fa-user-tag"></i></label>
                        <label class="input-group-text">Status Potensi</label>
                        <select name="status_potensi" class="form-select">
                           <option selected>Pilih</option>
                           <option value="potensial" <?= ($status_potensi == 'potensial') ? 'selected' : '' ?>>Potensial</option>
                           <option value="non" <?= ($status_potensi == 'non') ? 'selected' : '' ?>>Tidak Potensial</option>
                        </select>
                     </div>

                     <!-- Potensi Segmen -->
                     <div class="input-group mb-4">
                        <label class="input-group-text"><i class="fa-solid fa-object-group"></i></label>
                        <label class="input-group-text">Potensi Segmen</label>
                        <select name="potensi_segmen" class="form-select" >
                           <option selected>Pilih</option>
                           <option value="individu" <?= ($potensi_segmen == 'individu') ? 'selected' : '' ?>>Individu</option>
                           <option value="corporate" <?= ($potensi_segmen == 'corporate') ? 'selected' : '' ?>>Corporate</option>
                           <option value="commercial" <?= ($potensi_segmen == 'commercial') ? 'selected' : '' ?>>Commercial</option>
                           <option value="sme" <?= ($potensi_segmen == 'sme') ? 'selected' : '' ?>>SME</option>
                           <option value="wealth" <?= ($potensi_segmen == 'wealth') ? 'selected' : '' ?>>Wealth</option>
                           <option value="micro" <?= ($potensi_segmen == 'micro') ? 'selected' : '' ?>>Micro</option>
                           <option value="kelembagaan" <?= ($potensi_segmen == 'kelembagaan') ? 'selected' : '' ?>>Kelembagaan</option>
                        </select>
                     </div>

                     <!-- Nomor Telepon -->
                     <div class="input-group mb-4">
                        <label class="input-group-text id-label"><i class="fa-solid fa-phone"></i></label>
                        <input type="tel" class="form-control" name="no_telepon" placeholder="Nomor Telepon" value="<?= $no_telepon ?>">
                     </div>

                     <!-- Tanggal Kunjungan -->
                     <div class="input-group mb-4 input-tanggal">
                        <label class="input-group-text"><i class="fa-solid fa-calendar-days"></i></label>
                        <input type="date" class="form-control" name="tanggal_kunjungan" placeholder="Tanggal Kunjungan" value="<?= $tanggal_kunjungan ?>">
                     </div>
                     
                     <!-- PIC -->
                     <div class="input-group mb-4">
                        <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                        <input type="text" class="form-control" name="PIC" placeholder="PIC" value="<?= $PIC ?>">
                     </div>

                     <div>
                        <h4>Produk yang Ditawarkan</h4>
                     </div>

                     <!-- Giro -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Giro</label>
                           <select name="giro" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($giro == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($giro == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- Tabungan -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Tabungan</label>
                           <select name="tabungan" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($tabungan == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($tabungan == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- Deposito -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Deposito</label>
                           <select name="deposito" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($deposito == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($deposito == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- Kopra -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kopra</label>
                           <select name="kopra" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($kopra == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($kopra == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- Kartu Kredit -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kartu Kredit</label>
                           <select name="kartu_kredit" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($kartu_kredit == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($kartu_kredit == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- KMK -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kredit Modal Kerja</label>
                           <select name="KMK" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($KMK == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($KMK == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- KI -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kredit Investasi</label>
                           <select name="KI" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($KI == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($KI == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- KUM -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kredit Usaha Mikro</label>
                           <select name="KUM" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($KUM == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($KUM == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- KUR -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kredit Usaha Rakyat</label>
                           <select name="KUR" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($KUR == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($KUR == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- KSM -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kredit Serbaguna Mandiri</label>
                           <select name="KSM" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($KSM == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($KSM == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>
                     
                     <!-- KKP -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kartu Kredit Pemerintah</label>
                           <select name="KKP" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($KKP == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($KKP == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- KPR -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Kredit Kepemilikan Rumah</label>
                           <select name="KPR" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($KPR == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($KPR == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- SME -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Small Medium Enterprise</label>
                           <select name="SME" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($SME == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($SME == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <!-- Payroll -->
                     <div class="col-12 col-sm-6">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-id-badge"></i></label>
                           <label class="input-group-text">Payroll</label>
                           <select name="Payroll" class="form-select">
                              <option selected>-</option>
                              <option value="Sudah" <?= ($Payroll == 'Sudah') ? 'selected' : '' ?>>Sudah</option>
                              <option value="Belum" <?= ($Payroll == 'Belum') ? 'selected' : '' ?>>Belum</option>
                           </select>
                        </div>
                     </div>

                     <div>
                        <h4>Hasil Kunjungan</h4>
                     </div>

                     <!-- Status Kunjungan -->
                     <div class="input-group mb-4">
                                    <label class="input-group-text"><i class="fa-solid fa-person-walking"></i></label>
                                    <label class="input-group-text">Status Kunjungan</label>
                                    <select name="status_kunjungan" class="form-select">
                                        <option selected>Pilih</option>
                                        <option value="Closing" <?= ($status_kunjungan == 'Closing') ? 'selected' : '' ?>>Closing</option>
                                        <option value="Follow Up" <?= ($status_kunjungan == 'Follow Up') ? 'selected' : '' ?>>Follow Up</option>
                                        <option value="Tidak Bersedia" <?= ($status_kunjungan == 'Tidak Bersedia') ? 'selected' : '' ?>>Tidak Bersedia</option>
                                    </select>
                                </div>

                     <!-- Keterangan -->
                     <div class="input-group mb-4">
                        <div class="input-group mb-4">
                           <label class="input-group-text id-label"><i class="fa-solid fa-file-lines"></i></label>
                           <textarea class="form-control" name="keterangan" placeholder="Keterangan"><?= $keterangan ?></textarea>
                        </div>
                     </div>

                  </div>
                  
                  <div class="row g-3">
                     <div class="col-6 col-sm-3 col-md-2 button-ubah">
                        <a href="home.php" type="button" class="btn btn-secondary form-control px-4 me-2 mt-4"><i class="fa-solid fa-xmark me-2"></i>Batal</a>
                     </div>
                     <div class="col-6 col-sm-9 col-md-10 button-ubah">
                        <button type="submit" name="ubah_kunjungan" class="btn btn-primary form-control text-uppercase mt-4">Simpan</button>
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