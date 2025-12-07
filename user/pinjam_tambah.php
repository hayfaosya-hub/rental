<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Pinjam</h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="pinjam_aksi.php">
                    <div class="form-group">
                        <label>Nomor Kendaraan</label>
                        <input type="text" name="kendaraan_nomor" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control">
                    </div>

                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>