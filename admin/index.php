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
            <h4>Dashboard</h4>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="pull-right">
                                    <?php
                                        $user = mysqli_query($koneksi,"SELECT * FROM user WHERE user_status = 2");
                                        echo mysqli_num_rows($user);
                                    ?>
                                </span>
                            </h1>
                            Jumlah User
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-road"></i>
                                <span class="pull-right">
                                    <?php
                                        $kendaraan = mysqli_query($koneksi,"SELECT * FROM kendaraan");
                                        echo mysqli_num_rows($kendaraan);
                                    ?>
                                </span>
                            </h1>
                            Total Kendaraan
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-ok-circle"></i>
                                <span class="pull-right">
                                    <?php
                                        $ready = mysqli_query($koneksi,"SELECT * FROM pinjam  WHERE pinjam_status='1'");
                                        echo mysqli_num_rows($ready);
                                    ?>
                                </span>
                            </h1>
                            Kendaraan Ready
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-retweet"></i>
                                <span class="pull-right">
                                    <?php
                                        $dipinjam = mysqli_query($koneksi,"SELECT * FROM pinjam WHERE pinjam_status='2'");
                                        echo mysqli_num_rows($dipinjam);
                                    ?>
                                </span>
                            </h1>
                            Kendaraan Dipinjam
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h4><b>Riwayat Peminjaman Terakhir</b></h4>
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
                    $data = mysqli_query($koneksi, "
                        SELECT * FROM pinjam
                        JOIN user ON pinjam.user_id = user.user_id
                        JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
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