<?php
session_start();

$id = $_SESSION["perusahaan_id"];
$name = $_SESSION["username"];
$role = $_SESSION["role"];
// Ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']);
}
if (empty($_SESSION["username"]) || empty($_SESSION["role"])) {
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silahkan Login Terlebih Dahulu!'
    ];
    //Header masih salah. link ke auth/perusahaan
    header ('Location: ./auth/login.php');
    exit();
}
