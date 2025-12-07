<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Pinjam</h4>
            </div>
            <div class="panel-body">

                <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $data= mysqli_query($koneksi,"select * from pinjam where pinjam_id='$id'");
                while($d=mysqli_fetch_array($data)) {
                    ?>

                    <form method="POST" action="pinjam_update.php">
                        <input type="hidden" name="pinjam_id" value="<?php echo $d['pinjam_id']; ?>">


                        <div class="form-group">
                            <label>Nomor Kendaraan</label>
                            <input type="text" class="form-control" name="kendaraan_nomor" 
                                value="<?php echo $d['kendaraan_nomor']; ?>">
                        </div>

                        <div class="form-group">
                            <label>ID User</label>
                            <input type="text" class="form-control" name="user_id" 
                                value="<?php echo $d['user_id']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" class="form-control" name="tgl_pinjam" 
                                value="<?php echo $d['tgl_pinjam']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" class="form-control" name="tgl_kembali" 
                                value="<?php echo $d['tgl_kembali']; ?>">
                        </div>

                        <br>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>

                <?php

                }
                ?>
            </div>
        </div>
    </div>
</div>