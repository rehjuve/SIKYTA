<?php 
include_once "config/koneksi.php";

if (isset($_GET['id'])) {

    if (isset($_GET['kunjungan_nasabah'])) {
        $result = mysqli_query($conn, "DELETE FROM kunjungan_nasabah WHERE id_kunjungan = '$_GET[id]' "); // Corrected query
        
        if ($result) {
            echo "<script>alert('Data berhasil dihapus!')</script>";
            echo "<script>window.location.href='home.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus!');</script>";
            echo "<script>window.location.href='home.php';</script>";
        }  
    }

    elseif (isset($_GET['potensi_nasabah'])) {
        $result = mysqli_query($conn, "DELETE FROM potensi_nasabah WHERE id_potensi = '$_GET[id]' "); // Corrected query
        
        if ($result) {
            echo "<script>alert('Data berhasil dihapus!')</script>";
            echo "<script>window.location.href='data_potensi_nasabah.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus!');</script>";
            echo "<script>window.location.href='data_potensi_nasabah.php';</script>";
        }  
    }
}

$conn->close();
?>
