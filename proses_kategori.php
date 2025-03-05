<?php
// Menghubungkan ke file konfigurasi database
include("config.php");

// Memulai sesi untuk menyimpan notifikasi
session_start();

// Proses penambahan kategori baru
if (isset($_POST['simpan'])) {
    // Mengambil data nama kategori dari form
    $kategori_pekerjaan = $_POST['kategori_pekerjaan'];

    // Query untuk menambahkan data kategori ke dalam database
    $query = "INSERT INTO pekerjaan (kategori_pekerjaan) VALUES ('$kategori_pekerjaan')";
    $exec = mysqli_query($conn, $query);

    // Menyimpan notifikasi berhasil atau gagal ke dalam session
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary', // Jenis notifikasi (contoh: primary untuk keberhasilan)
            'message' => 'Kategori berhasil ditambahkan!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger', // Jenis notifikasi (contoh: danger untuk kegagalan)
            'message' => 'Gagal menambahkan kategori: ' . mysqli_error($conn)
        ];
    }

    // Redirect kembali ke halaman kategori
    header('Location: kategori.php');
    exit();
}
if (isset($_POST['delete'])) {
    $catID = $_POST['catID'];
    $query = "DELETE FROM pekerjaan WHERE pekerjaan_id = $catID";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Kategori berhasil dihapus!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus kategori: ' . mysqli_error($conn)
        ];
    }

    header('Location: kategori.php');
    exit();
}

// Proses pembaruan kategori
if (isset($_POST['update'])) {
    // Mengambil data dari form pembaruan
    $catID = $_POST['catID'];
    $kategori_pekerjaan = $_POST['kategori_pekerjaan'];

    // Query untuk memperbarui data kategori berdasarkan ID
    $query = "UPDATE pekerjaan SET kategori_pekerjaan = '$kategori_pekerjaan' WHERE pekerjaan_id = $catID";
    $exec = mysqli_query($conn, $query);

    // Menyimpan notifikasi keberhasilan atau kegagalan ke dalam session
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Kategori berhasil diperbarui!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui kategori: ' . mysqli_error($conn)
        ];
    }

    // Redirect kembali ke halaman kategori
    header('Location: kategori.php');
    exit();
}
