<?php 
include("../security.php");
include("../../koneksi.php");

if(isset($_POST['ubah'])){
    $id = $_POST['id'] ;
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = (int) $_POST['price'];

    if($title == '' || $description == '' || $price <= 0){
        echo "Semua field wajib di isi dengan benar.";
        exit;
    }

    $sql = "update course set title='$title', description='$description', price='$price' where id='$id'";
    $query =mysqli_query($conn, $sql);
    if($query){
         header("Location: index.php");
        exit;
    }else{
        echo "Data Gagal Diubah.";
    } 
    } else { 
        header("Location: index.php"); 
        exit;
    }
?>