<?php

include 'config.php';

// Memulai sesi PHP
session_start();

// Mendapatkan ID pengguna dari sesi
$id = $_SESSION["perusahaan_id"];

if (isset($_POST['delete'])) {
    // Mengambil ID post dari parameter URL
    $id = $_POST['postID'];

    // Query untuk menghapus post berdasarkan ID
    $exec = mysqli_query($conn, "DELETE FROM lamaran WHERE lamaran_id='$id'");

    // Menyimpan notifikasi keberhasilan atau kegagalan ke dalam session
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Post succesfully deleted.'
        ];
    } else {
        $SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error deleting post: ' . mysqli_error($conn)
        ];
    }

    // Arahkan ke halaman dashboard
    header('Location: dashboard_lamaran.php');
    exit();
}