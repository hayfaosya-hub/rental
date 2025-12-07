<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Kendaraan</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';

                $kendaraan_nomor = $_GET['id'];

                $data = mysqli_query($koneksi,"SELECT * FROM kendaraan WHERE kendaraan_nomor='$kendaraan_nomor'");
                $d = mysqli_fetch_assoc($data);
                ?>

                <form action="kendaraan_update.php" method="post">
                    <div class="form-group">
                        <label>Nomor Kendaraan</label>
                        <input type="text" name="kendaraan_nomor" class="form-control"
                            value="<?php echo $d['kendaraan_nomor']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Nama Kendaraan</label>
                        <input type="text" name="kendaraan_nama" class="form-control"
                            value="<?php echo $d['kendaraan_nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Type Kendaraan</label>
                        <input type="text" name="kendaraan_type" class="form-control"
                            value="<?php echo $d['kendaraan_type']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Harga Perhari</label>
                        <input type="text" name="kendaraan_harga_perhari" class="form-control"
                            value="<?php echo $d['kendaraan_harga_perhari']; ?>">
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>

            </div>
        </div>
    </div>
</div>