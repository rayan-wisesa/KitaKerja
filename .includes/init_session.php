<?php
session_start();

<<<<<<< HEAD
$username =$_SESSION['username'];
$email =$_SESSION['email'];

$notification = $_SESSION['notification'] ?? null;
if($notification){
    unset($_SESSION['notification']);
}
    if (isset($_SESSION['username']) || isset($_SESSION['email'])) {
      $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'silahkan login terlebih dahulu'
      ];
      header("Location: ./auth/login.php");
}
?>
=======
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
    header ('Location: ./auth/login.php');
    exit();
}
>>>>>>> 5e5ebd041ccc46bbb8dac483892299e20ece53a5
