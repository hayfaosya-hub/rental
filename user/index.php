<?php
    include 'header.php';
    include '../koneksi.php';
?>

<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px;">Sistem Informasi Rental Kendaraan RPL Skanega</h4>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h4><b>Riwayat Peminjaman Terakhir Saya</b></h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama User</th> 
                    <th>Alamat</th>
                    <th>Status Pinjam</th> 
                    <th>Nama Kendaraan</th>
                    <th>Tanggal Pinjam</th> 
                    <th>Tanggal Kembali</th>
                </tr>
                <?php
                    $id_user = $_SESSION['user_id'];
                    $data = mysqli_query($koneksi, "
                        SELECT * FROM pinjam
                        JOIN user ON pinjam.user_id = user.user_id
                        JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                        WHERE pinjam.user_id = '$id_user'
                        ORDER BY pinjam.pinjam_id DESC
                        LIMIT 10
                    ");
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr> 
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['user_nama']; ?></td>
                        <td><?php echo $d['user_alamat']; ?></td>
                        <td>
                            <?php
                                if ($d['pinjam_status']=='1') {
                                    echo "<div class='label label-info'>READY</div>";
                                }elseif ($d['pinjam_status']=='2') {
                                    echo "<div class='label label-warning'>DIPINJAM</div>";
                                }
                            ?>
                        </td>
                        <td><?php echo $d['kendaraan_nama']; ?></td>
                        <td><?php echo $d['tgl_pinjam']; ?></td>
                        <td><?php echo $d['tgl_kembali']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
        </div>
    </div>
</div>