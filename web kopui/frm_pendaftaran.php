<?php include ("koneksi.php"); ?>
<section>
    <form method="POST" action="sv_pendaftaran.php">
        <label>Nama Lengkap:</label>
        <input type="text" name="name" placeholder="Nama Lengkap">

        <label>Email:</label>
        <input type="email" name="email" placeholder="contoh@gmail.com">

        <label>Nomor Whatsapp:</label>
        <input type="text" name="phone_number" placeholder="081234567890">
    
        <label>Kelas yang Dipilih:</label>
        <select name="course_id">
            <option value="">Pilih Kelas</option>
            <?php 
            $sql = "select * from courses";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                $id = $result["id"];
                $course_name = $result["name"];
                $course_price = $result["price"];
                ?>
                <option value="<?=$id; ?>"><?=$course_name; ?> - Rp. <?=number_format($course_price, 0, ',', '.'); ?></option>
                <?php
            }
            ?>
        </select>

        <label>Jumlah Peserta:</label>
        <input type="number" name="participant_count" min="1" value="1">
    
        <button type="submit" name="daftar">Daftar Sekarang</button>
    </form> 
</section>