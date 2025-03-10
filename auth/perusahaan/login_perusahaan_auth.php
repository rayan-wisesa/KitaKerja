<?php
session_start();
require_once("../../config.php");
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql ="SELECT * FROM perusahaan WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])){
            $_SESSION["email"] = $email;
            $_SESSION["nama_perusahaan"] = $row["nama_perusahaan"];
            $_SESSION["perusahaan_id"] = $row["perusahaan_id"];
            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' =>'selamat datang kembali!'
            ];
            header('location: ../../dashboard.php');
            exit();
        } else {
                $_SESSION['notification'] = [
                    'type' => 'danger',
                    'message' => 'Email atau password salah!'
            ];
        }
        } else{
            $_SESSION['notification'] = [
                'type' => 'danger',
                    'message' => 'Email atau password salah!'
            ];
        }
        header('Location: login.php');
        exit();
    }
    $conn->close();

?>

