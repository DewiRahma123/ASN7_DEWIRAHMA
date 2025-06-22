<?php include 'db_connect.php'; ?> <!-- pastikan nama file koneksi sesuai -->

<h2>Data Inventaris Barang</h2>
<a href="tambah.php">Tambah Data</a><br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM inventaris_barang");

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>".$row['kode_barang']."</td>
            <td>".$row['nama_barang']."</td>
            <td>".$row['kategori']."</td>
            <td>".$row['jumlah']."</td>
            <td>".$row['harga']."</td>
            <td>
                <a href='edit.php?kode_barang=".$row['kode_barang']."'>Edit</a> |
                <a href='hapus.php?kode_barang=".$row['kode_barang']."' onclick=\"return confirm('Yakin hapus?');\">Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>
