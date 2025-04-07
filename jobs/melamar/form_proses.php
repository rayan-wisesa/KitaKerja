<?php
// Menghubungkan file konfigurasi database
include '../../config.php';

// Memulai sesi PHP
session_start();

// Mendapatkan ID pengguna dari sesi
$id = $_SESSION["pelamar_id"];
$name = $_SESSION["nama_pelamar"];
$email = $_SESSION["email"];

// Menangani form untuk menambahkan postingan baru
if (isset($_POST['kirim'])) {
    // Mendapatkan data dari form
    $pekerjaan_id = $_POST["pekerjaan_id"];
    $pelamar_id = $id;
    $no_hp = $_POST["no_hp"];
    $pesan = $_POST["pesan"];

        $query = "INSERT INTO lamaran (pekerjaan_id, pelamar_id, no_hp, message, tanggal_melamar) VALUES ('$pekerjaan_id','$pelamar_id','$no_hp','$pesan', NOW())";
        if ($conn->query($query) === TRUE) {
            // Notifikasi berhasil jika postingan berhasil ditambahkan
            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'Lamaran berhasil dikirim.'
            ];
        } else {
            // Notifikasi error jika gagal menambahkan postingan
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Gagal mengirim: ' . $conn->error
            ];
        }

    // Arahkan ke halaman dashboard setelah selesai
    header('location: ../index.php');
    exit();
}


