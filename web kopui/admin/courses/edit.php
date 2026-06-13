<?php
include ("../security.php");
include ("../../koneksi.php");

$id = $_GET['id'] ?? '';

if($id == ''){
    header("Location: index.php");
    exit;
}

$sql = "select * from course where id = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if(!$data){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>

<html>
<body>
<h1>Edit Course</h1>
<a href="index.php">Kembali</a>
<br><br>

<form method="POST" action="ubah.php">
    <input type="hidden" name="id" value="<?=$data['id']; ?>">
    <label> Judul Course:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($data['name']); ?>"><br><br>
    <label> Deskripsi Course:</label>
    <textarea name="description" rows="5" cols="40"><?= htmlspecialchars($data['description']); ?></textarea><br><br>
    <label> Harga Course:</label>
    <input type="number" name="price" value="<?= $data['price']; ?>"><br><br>
    <button type="submit">Ubah</button> 
</form>
</body> 
</html>