<?php

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM categories WHERE user_id=$id");
if($query) {
    echo '<script>alert("Hapus Data Berhasil"); location.href="?page=categories"</script>';
}else{
    echo '<script>alert("Hapus Data Gagal")</script>';
}