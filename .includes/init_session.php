<?php
session_start();

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
