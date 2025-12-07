<?php
include 'header.php';
include '../koneksi.php';

$id_user = $_SESSION['user_id'];
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><b>Data Peminjaman Saya</b></h4>
        </div>
        <div class="panel-body">
            <a href="pinjam_tambah.php" class="btn btn-success btn-sm">+ Tambah Peminjaman</a>
            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID Pinjam</th>
                    <th>Nomor Kendaraan</th>
                    <th>ID User</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>OPSI</th>
                </tr>

                <?php
                $data = mysqli_query($koneksi,
                    "SELECT * FROM pinjam WHERE user_id='$id_user' ORDER BY pinjam_id DESC"
                );

                while ($d=mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?= $d['pinjam_id']; ?></td>
                        <td><?= $d['kendaraan_nomor']; ?></td>
                        <td><?= $d['user_id']; ?></td>
                        <td><?= $d['tgl_pinjam']; ?></td>
                        <td><?= $d['tgl_kembali']; ?></td>
                        <td>
                            <?php
                                if ($d['pinjam_status']=='1') {
                                    echo "<div class='label label-info'>READY</div>";
                                } else {
                                    echo "<div class='label label-warning'>DIPINJAM</div>";
                                }
                            ?>
                        </td>
                            <td>
                                <?php if($d['pinjam_status'] == 2) { ?>
                                    <a href="pinjam_edit.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="pinjam_hapus.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-sm btn-danger">Batalkan</a>

                                <?php } elseif($d['pinjam_status'] == 1) { ?>
                                    <span class="label label-success">Selesai</span>

                                <?php } ?>
                            </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>
