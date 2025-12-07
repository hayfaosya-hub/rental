<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
    <script type="text/javascript" src="../asset/js/jquery.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
</head>
<body style="background: #f0f0f0;">
    <?php
        session_start();
        if ($_SESSION['status'] != "login") {
            header("location:../index.php?pesan=belum_login");
        }
    ?>
    
    <nav class="navbar navbar-inverse" style="border-radius:0px;">
        <div class="container-fluid">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand">Rental</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php 
                    $page = basename($_SERVER['PHP_SELF']);
                ?>
                <ul class="nav navbar-nav">
                    <li class="<?= ($page == 'index.php') ? 'active' : '' ?>">
                        <a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li class="<?= ($page == 'pinjam.php') ? 'active' : '' ?>">
                        <a href="pinjam.php"><i class="glyphicon glyphicon-list-alt"></i> Pinjam</a>
                    </li>
                        <li class="<?= ($page == 'kendaraan.php') ? 'active' : '' ?>">
                        <a href="kendaraan.php"><i class="glyphicon glyphicon-road"></i> Kendaraan</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><p style="color:white; padding:15px;"><b>Halo, <?php echo $_SESSION['username']; ?></b>!</p></li>
                </ul>
            </div>

        </div>
    </nav>
</body>
</html>
