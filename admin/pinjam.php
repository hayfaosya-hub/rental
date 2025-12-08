<?php
    include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><b>Data Peminjaman Rental Skanega</b></h4>
        </div>
        <div class="panel-body">
            <a href="pinjam_tambah.php" class="btn btn-primary btn-sm">+ Tambah Peminjaman</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="15%">ID Pinjam</th>
                    <th>Nomor Kendaraan</th>
                    <th>ID User</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th width="15%">OPSI</th>
                </tr>
                <?php
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"select * from pinjam");
                    $no = 1;
                    while ($d=mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $d['pinjam_id']; ?></td>
                        <td><?php echo $d['kendaraan_nomor']; ?></td>
                        <td><?php echo $d['user_id']; ?></td>
                        <td><?php echo $d['tgl_pinjam']; ?></td>
                        <td><?php echo $d['tgl_kembali']; ?></td>
                        <td>
                            <?php
                                if ($d['pinjam_status']=='1') {
                                    echo "<div class='label label-info'>READY</div>";
                                }elseif ($d['pinjam_status']=='2') {
                                    echo "<div class='label label-warning'>DIPINJAM</div>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php if($d['pinjam_status'] == '1'){ ?>                           
                                <span class="label label-success" style="display:block; text-align:center;">Selesai</span>
                            <?php } else { ?>
                                <div style="display:flex; gap:6px; flex-wrap:nowrap;">
                                    <a href="pinjam_edit.php?id=<?php echo $d['pinjam_id']; ?>" 
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <a onclick="return confirm('Yakin batalkan?')" 
                                        href="pinjam_hapus.php?id=<?php echo $d['pinjam_id']; ?>" 
                                        class="btn btn-sm btn-danger">Batalkan</a>

                                    <a href="pinjam_kembalikan.php?id=<?php echo $d['pinjam_id']; ?>" 
                                        class="btn btn-sm btn-success">Dikembalikan</a>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>