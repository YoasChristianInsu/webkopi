<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['Simpan'])) {
    $title = trim($_POST['title']);
    $description =trim($_POST['description']);
    $price =(int) $_POST['price'];

    if ($title == ''|| $description == '' || $price <= 0) {
        echo "Semua field wajib di isi dengan benar.";
        exit;
    }else{
        $sql = "Insert into course (name, description, price) values ('$title', '$description', $price)";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            echo "Data Gagal Disimpan.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Course</title>
    </head>
    <body>
        <h1>Tambah Course</h1>
        <a href="index.php">Kembali</a>
        <br><br>
    
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label> Judul Course:</label>
        <input type="text" name="title"><br><br>
        <label> Deskripsi Course:</label>
        <textarea name="description" rows="5" cols="40"></textarea><br><br>
        <label> Harga Course:</label>
        <input type="number" name="price"><br><br>
        <button type="submit" name="Simpan">Simpan</button>
    </form> 
    </body>
</html>