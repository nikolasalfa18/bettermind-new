<?php
include ("koneksi.php");
$user = $_POST['nama'];
$umur = $_POST['umur'];
    session_start(); 
    $_SESSION['nama'] = $user; //Simpan session Nama
    $_SESSION['umur'] = $umur;
    header('location:question.php');

?>