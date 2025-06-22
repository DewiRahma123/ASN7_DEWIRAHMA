<?php include 'db_connect.php'; ?>

<?php
if (isset($_GET['kode_barang'])) {
    $kode_barang = mysqli_real_escape_string($conn, $_GET['kode_barang']);

    // Ambil data berdasarkan kode_barang
    $data = mysqli_query($conn, "SELECT * FROM inventaris_barang WHERE kode_barang = '$kode_barang'");
    $row = mysqli_fetch_assoc($data);
} else {
    echo "Kode barang tidak ditemukan.";
    exit;
}
?>

<h2>Edit Data Barang</h2>
<form method="POST" action="">
    Nama Barang: <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required><br>
    Kategori: <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>" required><br>
    Jumlah: <input type="number" name="jumlah" value="<?php echo $row['jumlah']; ?>" required><br>
    Harga: <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required><br>
    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $query = "UPDATE inventaris_barang SET 
                nama_barang = '$nama_barang', 
                kategori = '$kategori', 
                jumlah = '$jumlah', 
                harga = '$harga' 
              WHERE kode_barang = '$kode_barang'";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diupdate! <a href='index.php'>Kembali</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
