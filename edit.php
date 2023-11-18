<?php
    require './config/db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            echo "produk tidak ditemukan.";
            exit();
        }
    } else {
        echo "ID produk tidak disediakan.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $update_result = mysqli_query($db_connect, "UPDATE products SET name='$name', price='$price' WHERE id='$id'");

        if ($update_result) {
            header("Location: show.php");
        } else {
            echo "gagal melakukan update produk.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form method="POST">
        <label for="name">Nama Produk:</label>
        <input type="text" name="name" value="<?=$row['name'];?>" required>
        <br>

        <label for="price">Harga:</label>
        <input type="text" name="price" value="<?=$row['price'];?>" required>
        <br>

        <label for="image">Gambar produk:</label>
        <input type="text" name="image" id="image" value="<?=$row['image'];?>">
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
