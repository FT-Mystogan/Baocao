<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QLGT</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <div class="page-header">
        <div class="wrapper">
            <nav class="left-nav">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">QL nhân viên</a></li>
                    <li><a href="#">Tin tức</a></li>
                </ul>
            </nav>
            <div class="header-logo">
                <a href="index.php">
                    <img src="images/tải xuống.png" alt="Logo" width="69px" height="69px">
                </a>
            </div>
            <nav class="right-nav">
                <ul>
                    <li><a href="#">Thêm báo cáo </a></li>
                    <li><a href="#">Xem báo cáo</a></li>
                    <?php
                    if (!isset($_SESSION['fullname'])) {
                        echo '<li><a href="login.php">Đăng nhập</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <?php
            if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != null) {
            ?>
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="images/avatar1.jpg" alt="" style=" border-radius: 50%; width:50px; height:50px">
                            <span><?php echo $_SESSION['fullname'] ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                            <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                            <div class="dropdown-divider"></div>
                            <?php
                            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                                session_destroy();
                                header("location: index.php");
                            }
                            ?>
                            <a class="dropdown-item" href="index.php?action=logout">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    require_once('db/dbhelper.php');
    require_once('utility/utility.php');
    if (isset($_GET['idreport'])) {
        $idreport = $_GET['idreport'];
        $sql = "SELECT * FROM baocao WHERE id='$idreport'";
        $data = executeResult($sql);
    }
    if(isset($_POST['submit'])){
        $fullname=$_POST['fullname'] ;
        $address=$_POST['address'] ;
        $bks=$_POST['bks'] ;
        $content=$_POST['content'] ;
        $money=$_POST['money'] ;
        $thang=$_POST['month'] ;
        $sql ="UPDATE baocao SET fullname='$fullname',address ='$address',bks='$bks',content='$content',money='$money',thang='$thang' WHERE id='$idreport'";
        execute($sql);
        header("Location:report.php");
        die();
    }
    ?>
    <div class="main">
        <div class="table-all table-responsive p-3">
            <?php
            if (isset($data) && $data != null) {
            ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="fullname">Họ và tên:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $data['fullname']?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address"value="<?php echo $data['address']?> ">
                    </div>
                    <div class="form-group">
                        <label for="bks">Biển kiểm soát:</label>
                        <input type="text" class="form-control" id="bks" name="bks" value="<?php echo $data['bks']?> " >
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung vi phạm:</label>
                        <input type="text" class="form-control" id="content" name="content" value="<?php echo $data['content']?> ">
                    </div>
                    <div class="form-group">
                        <label for="money">Tiền phạt:</label>
                        <input type="text" class="form-control" id="money" name="money" value="<?php echo $data['money']?> ">
                    </div>
                    <div class="form-group">
                        <label for="month">Tháng:</label>
                        <input type="text" class="form-control" id="month" name="month" value="<?php echo $data['thang']?> ">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success " style="width: 120px;" name="submit">Sửa</button>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="page-footer">
        <div class="wrapper">


            <div class="socials">
                <a href="#" class="fb"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="tw"><i class="fab fa-twitter"></i></a>
                <a href="#" class="gp"><i class="fab fa-google-plus-g"></i></a>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>


</html>