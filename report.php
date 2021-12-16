<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['fullname'])) {
    header("Location:login.php");
    die();
}

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
                    <li><a href="addreport.php">Thêm báo cáo </a></li>
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
                                die();
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

    <div class="main pt-3">
        <div class="table-responsive " style="width: 100%;">
            <table class="table table-bordered" id="crud_table">
                <thead>
                    <tr style="font-size: small;">
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Họ và tên</th>
                        <th rowspan="2">Địa chỉ</th>
                        <th rowspan="2">Biển kiểm soát</th>
                        <th rowspan="2">Nội dung vi phạm</th>
                        <th rowspan="2">Tổng tiền xử phạt</th>
                        <th rowspan="2"></th>
                        <th rowspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('db/dbhelper.php');
                    require_once('utility/utility.php');
                    
                    if (isset($_GET['idreport'])) {
                        
                        $id = $_GET['idreport'];
                        $sql = "DELETE  FROM baocao where id='$id'";
                        execute($sql);
                    }
                    $sql = "SELECT * FROM baocao";
                    $data = test($sql);
                    while ($result = mysqli_fetch_assoc($data)) {


                    ?>
                        <tr>
                            <td><?php echo $result['id'] ?></td>
                            <td><?php echo $result['fullname'] ?></td>
                            <td><?php echo $result['address'] ?></td>
                            <td><?php echo $result['bks'] ?></td>
                            <td><?php echo $result['content'] ?></td>
                            <td><?php echo $result['money'] ?></td>
                            <td><a href="updatereport.php?idreport=<?php echo $result['id'] ?>" class="btn btn-primary">Sửa</a></td>
                            <td><a href="?idreport=<?php echo $result['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa báo cáo này?')" class="btn btn-warning">Xoá</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
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