<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    require './config/db.php';

    $delete_query = "DELETE FROM products WHERE id = $id";
    $result = mysqli_query($db_connect, $delete_query);

    if ($result) {
        echo "Data produk berhasil dihapus.";
    } else {
        echo "Gagal menghapus data produk: " . mysqli_error($db_connect);
    }

    mysqli_close($db_connect);
} else {
    echo "ID produk tidak valid.";
}

header("Location: show.php");
exit();
?>
