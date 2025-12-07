<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit User</h4>
            </div>
            <div class="panel-body">

                <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $data= mysqli_query($koneksi,"select * from user where user_id='$id'");
                while($d=mysqli_fetch_array($data)) {
                    ?>

                    <form method="POST" action="user_update.php">
                        <div class="form-group">
                        <input type="hidden" name="id_lama" value="<?php echo $d['user_id']; ?>">
                            <label>Username </label>
                            <input type="text" class="form-control" name="username" 
                             value="<?php echo $d['username']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" 
                             value="<?php echo $d['password']; ?>">
                        </div>

                         <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="user_nama" 
                             value="<?php echo $d['user_nama']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="user_alamat" 
                             value="<?php echo $d['user_alamat']; ?>">
                        </div>

                         <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" name="user_status" 
                             value="<?php echo $d['user_status']; ?>">
                        </div>

                    <br/>

                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>

                <?php

                }
                ?>
            </div>
        </div>
    </div>
</div>