<?php include 'db_connect.php'; ?> <!-- pastikan file koneksi sesuai -->

<?php
if (isset($_GET['kode_barang'])) {
    $kode_barang = mysqli_real_escape_string($conn, $_GET['kode_barang']); // mencegah SQL injection

    $query = "DELETE FROM inventaris_barang WHERE kode_barang = '$kode_barang'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "kode_barang tidak ditemukan di URL.";
}
?>

