<?php
    include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><b>Data Kendaraan Rental Skanega</b></h4>
        </div>
        <div class="panel-body">
            <a href="kendaraan_tambah.php" class="btn btn-sm btn-warning">+ Kendaraan Baru</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nomor Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Type Kendaraan</th>
                    <th>Harga Perhari</th>
                    <th>Status</th>
                    <th width="15%">OPSI</th>
                </tr>
                <?php
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"select * from kendaraan");
                    while ($d = mysqli_fetch_array($data)) {

                        if($d['kendaraan_status'] == 1){
                            $status = "<span class='label label-success'>Ready</span>";
                        } else if($d['kendaraan_status'] == 2){
                            $status = "<span class='label label-danger'>Dipinjam</span>";
                        } else {
                            $status = "-";
                        }
                ?>
                    <tr>
                        <td><?php echo $d['kendaraan_nomor']; ?></td>
                        <td><?php echo $d['kendaraan_nama']; ?></td>
                        <td><?php echo $d['kendaraan_type']; ?></td>
                        <td><?php echo $d['kendaraan_harga_perhari']; ?></td>
                        <td><?php echo $status; ?></td>
                        <td>
                            <a href="kendaraan_edit.php?id=<?php echo $d['kendaraan_nomor']; ?>" class="btn btn-sm btn-info Edit">Edit</a>
                            <a href="kendaraan_hapus.php?id=<?php echo $d['kendaraan_nomor']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>