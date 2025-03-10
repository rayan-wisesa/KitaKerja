<?php
require_once("../../config.php");
// Mulai Session
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelamar = $_POST["nama_pelamar"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO pelamar (nama_pelamar, email, password) VALUES ('$nama_pelamar', '$email', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        // Simpan notifikasi ke dalam session
        $_SESSION['notification'] = [
            'type' => 'primary', 'message' => 'Registrasi Berhasil!'
        ];
    } else {
        $_SESSION['notification'] = ['type' => 'danger', 'message' => 'Gagal Registrasi: ' . mysqli_error($conn)];
    }
    header('Location: login.php');
    exit();
}

$conn->close();
?>