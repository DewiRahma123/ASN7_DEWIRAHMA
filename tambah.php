<?php include 'db_connect.php'; ?> <!-- pastikan nama file koneksi sama -->

<form method="POST" action="">
    Kode Barang: <input type="text" name="kode_barang" required><br>
    Nama Barang: <input type="text" name="nama_barang" required><br>
    Kategori: <input type="text" name="kategori" required><br>
    Jumlah: <input type="number" name="jumlah" required><br>
    Harga: <input type="number" name="harga" required><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO inventaris_barang (kode_barang, nama_barang, kategori, jumlah, harga)
              VALUES ('$kode_barang', '$nama_barang', '$kategori', '$jumlah', '$harga')";
    
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
