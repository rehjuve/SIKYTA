<?php
include "config/koneksi.php";
include "assets/library/fpdf/fpdf.php";

// Mulai dokumen PDF
$pdf = new FPDF('l', 'mm');

// Add a page with a fixed height
$pdf->AddPage('L', [350, 210]); // A4 size

$pdf->SetTitle('Laporan');

if (isset($_GET['tanggal'])) {

    $pdf->SetTitle('Laporan Kunjungan Nasabah');

    // Judul laporan
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(280, 7, 'LAPORAN KUNJUNGAN NASABAH', 0, 1, 'C');
    $pdf->Cell(10, 12, '', 0, 1);

    // Judul tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 10, 'NO', 1, 0, 'C');
    $pdf->Cell(50, 10, 'NAMA NASABAH', 1, 0, 'C');
    $pdf->Cell(40, 10, 'NOMOR REKENING', 1, 0, 'C');
    $pdf->Cell(40, 10, 'NOMINAL PIPELINE', 1, 0, 'C');
    $pdf->Cell(30, 10, 'SEGMEN', 1, 0, 'C');
    $pdf->Cell(50, 10, 'TANGGAL KUNJUNGAN', 1, 0, 'C');
    $pdf->Cell(50, 10, 'STATUS KUNJUNGAN', 1, 1, 'C');

    // Menampilkan data dari database
    $pdf->SetFont('Arial', '', 10);
    $tanggal = $_GET['tanggal'];
    $no = 1;
    $result = mysqli_query($conn, "SELECT * FROM kunjungan_nasabah WHERE tanggal_kunjungan LIKE '%$tanggal%'");
    while ($row = mysqli_fetch_array($result)) {
        $pdf->Cell(10, 10, $no++, 1, 0, 'C');
        $pdf->Cell(50, 10, $row['nama_nasabah'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['nomor_rekening'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['nominal_pipeline'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['potensi_segmen'], 1, 0, 'C');
        $pdf->Cell(50, 10, date('d-m-Y', strtotime($row['tanggal_kunjungan'])), 1, 0, 'C');
        $pdf->Cell(50, 10, $row['status_kunjungan'], 1, 1, 'C');
    }
}

elseif (isset($_GET['status'])) {

    $pdf->SetTitle('Laporan Kunjungan Nasabah');

    // Judul laporan
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(280, 7, 'LAPORAN KUNJUNGAN NASABAH', 0, 1, 'C');
    $pdf->Cell(10, 12, '', 0, 1);

    // Judul tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 10, 'NO', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Nama Nasabah', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Status Potensi', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Nominal Pipeline', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Potensi Segmen', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Status Kunjungan', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Keterangan', 1, 1, 'C');

    function tampilkanData($conn, $pdf, $kondisi) {
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $result = mysqli_query($conn, "SELECT nama_nasabah, status_potensi, nominal_pipeline, potensi_segmen, status_kunjungan, keterangan FROM kunjungan_nasabah WHERE $kondisi");
    
        while ($row = mysqli_fetch_array($result)) {
            $pdf->Cell(10, 10, $no++, 1, 0, 'C');
            $pdf->Cell(50, 10, $row['nama_nasabah'], 1, 0, 'C');
            $pdf->Cell(50, 10, $row['status_potensi'], 1, 0, 'C');
            $pdf->Cell(50, 10, $row['nominal_pipeline'], 1, 0, 'C');
            $pdf->Cell(50, 10, $row['potensi_segmen'], 1, 0, 'C');
            $pdf->Cell(50, 10, $row['status_kunjungan'], 1, 0, 'C');
            $pdf->Cell(50, 10, $row['keterangan'], 1, 1, 'C');
        }
    }
    
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'BMRI') {
            tampilkanData($conn, $pdf, "status_nasabah = 'BMRI'");
        } elseif ($_GET['status'] == 'Non-BMRI') {
            tampilkanData($conn, $pdf, "status_nasabah = 'Non-BMRI'");
        }
    }
}


elseif (isset($_GET['potensi_nasabah'])) {
    // Mulai dokumen PDF
    $pdf = new FPDF('l', 'mm');
    // Add a page with a fixed height
    $pdf->AddPage('L', [400, 210]); // A4 size

    $pdf->SetTitle('Laporan Data Potensi Nasabah');

    // Judul laporan
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(280, 7, 'LAPORAN DATA POTENSI NASABAH', 0, 1, 'C');
    $pdf->Cell(10, 12, '', 0, 1);

    // Judul tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'NO', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Nama', 1, 0, 'C');
    $pdf->Cell(150, 10, 'Alamat', 1, 0, 'C'); // Increased width for the Alamat field
    $pdf->Cell(40, 10, 'Tipe', 1, 0, 'C');
    $pdf->Cell(70, 10, 'Klasifikasi BC', 1, 1, 'C');

    // Menampilkan data dari database
    $pdf->SetFont('Arial', '', 10);
    $no = 1;
    $result = mysqli_query($conn, "SELECT * FROM potensi_nasabah");
    while ($row = mysqli_fetch_array($result)) {
        $pdf->Cell(20, 10, $no++, 1, 0, 'C');
        $pdf->Cell(80, 10, $row['nama'], 1, 0, 'C');
        
        // Get the width of the alamat text
        $alamatWidth = $pdf->GetStringWidth($row['alamat']);

        // Determine the maximum width of the cell
        $maxWidth = 150; // Maximum width of the Alamat cell
       
        // Display the alamat using MultiCell with dynamic width and height
        $pdf->Cell($maxWidth, 10, $row['alamat'], 1, 'C');

        // Reset font size to default
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(40, 10, $row['tipe'], 1, 0, 'C');
        $pdf->Cell(70, 10, $row['klasifikasi_BC'], 1, 1, 'C');
    }
}


elseif (isset($_GET['status_kunjungan'])) {
    // Mulai dokumen PDF
    $pdf = new FPDF('l', 'mm');
    $pdf->AddPage('L', [400, 210]); // A4 size
    $pdf->SetTitle('Laporan Data Potensi Nasabah');

    // Judul laporan
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(10, 5, '', 0, 1);
    $pdf->Cell(280, 7, 'LAPORAN DATA POTENSI NASABAH', 0, 1, 'C');
    $pdf->Cell(10, 12, '', 0, 1);

    // Judul tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(35, 10, 'NO', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Nama', 1, 0, 'C');
    $pdf->Cell(120, 10, 'Alamat', 1, 0, 'C');
    $pdf->Cell(70, 10, 'Klasifikasi BC', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Status Kunjungan', 1, 1, 'C');

    function tampilkanData($conn, $pdf, $kondisi) {
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM potensi_nasabah WHERE $kondisi");
    
        while ($row = mysqli_fetch_array($result)) {
            $pdf->Cell(35, 10, $no++, 1, 0, 'C');
            $pdf->Cell(80, 10, $row['nama'], 1, 0, 'C');
            $pdf->Cell(120, 10, $row['alamat'], 1, 0, 'C');
            $pdf->Cell(70, 10, $row['klasifikasi_BC'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['status_kunjungan'], 1, 1, 'C');
        }
    }

    if (isset($_GET['status_kunjungan'])) {
        if ($_GET['status_kunjungan'] == 'Sudah') {
            tampilkanData($conn, $pdf, "status_kunjungan = 'Sudah'");
        } elseif ($_GET['status_kunjungan'] == 'Belum') {
            tampilkanData($conn, $pdf, "status_kunjungan = 'Belum'");
        }
    }    
}

$pdf->Output();
?>