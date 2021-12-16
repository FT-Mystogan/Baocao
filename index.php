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
                    <li><a href="report.php">Xem báo cáo</a></li>
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
                            <img src="<?php echo $_SESSION['img'] ?>" alt="" style=" border-radius: 50%; width:50px; height:50px">
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

    <div class="main">
        <div class="wrapper">
            <main>
                <h2>Tin gần đây</h2>
                <div class="articles">
                    <article>
                        <div class="article-left">
                            <img src="images/art1.jpg" alt="Article">
                        </div>
                        <div class="article-right">
                            <h3>Đà Nẵng: 2 người chở rau, chuối tử vong thương tâm bên lề đường</h3>
                            <p class="meta">
                                <span class="date">December 8, 2021</span>
                                <span class="author">by Thắng Nguyễn</span>
                            </p>
                            <p class="description">Công an huyện Hòa Vang, Đà Nẵng đang tìm kiếm nhân chứng liên quan đến vụ tai nạn giao thông khiến 2 nạn nhân tử vong thương tâm tại đường tránh Nam Hải Vân... </p>
                            <p class="additional">
                                <span class="views">266</span>
                                <span class="comments">3</span>
                            </p>
                        </div>
                    </article>
                    <article>
                        <div class="article-left">
                            <img src="images/art2.jpg" alt="Article">
                        </div>
                        <div class="article-right">
                            <h3>Ớn lạnh hình ảnh xe khách bị xé toạc, biến dạng sau TNGT trên cao tốc</h3>
                            <p class="meta">
                                <span class="date">December 7, 2021</span>
                                <span class="author">by Thắng Nguyễn</span>
                            </p>
                            <p class="description">Cú va chạm khủng khiếp với xe container trên cao tốc khiến xe khách 16 chỗ bị xé toạc một... </p>
                            <p class="additional">
                                <span class="views">363</span>
                                <span class="comments">0</span>
                            </p>
                        </div>
                    </article>
                    <article>
                        <div class="article-left">
                            <img src="images/art3.jpg" alt="Article">
                        </div>
                        <div class="article-right">
                            <h3>Nam thanh niên lao xe máy vào cổng nhà dân tử vong</h3>
                            <p class="meta">
                                <span class="date">November 26, 2021</span>
                                <span class="author">by Thắng Nguyễn</span>
                            </p>
                            <p class="description">Cú tông mạnh khiến xe máy dính vào cột cổng nhà người dân, nam thanh niên tử vong.
                            </p>
                            <p class="additional">
                                <span class="views">545</span>
                                <span class="comments">19</span>
                            </p>
                        </div>
                    </article>
                    <article>
                        <div class="article-left">
                            <img src="images/art4.jpg" alt="Article">
                        </div>
                        <div class="article-right">
                            <h3>Va chạm liên hoàn trên đường dẫn cao tốc, một người tử vong</h3>
                            <p class="meta">
                                <span class="date">November 11, 2021</span>
                                <span class="author">by Thắng Nguyễn</span>
                            </p>
                            <p class="description">Một vụ va chạm giao thông giữa 2 xe tải và xe ba gác xảy ra trên đường dẫn cao tốc TP.HCM - Trung Lương (đoạn qua địa bàn xã Tam Hiệp, huyện Châu Thành, tỉnh Tiền Giang) ...</p>
                            <p class="additional">
                                <span class="views">741</span>
                                <span class="comments">17</span>
                            </p>
                        </div>
                    </article>
                    <article>
                        <div class="article-left">
                            <img src="images/art5.jpg" alt="Article">
                        </div>
                        <div class="article-right">
                            <h3>Xe máy tông nát đuôi ô tô trên đại lộ ở Sài Gòn</h3>
                            <p class="meta">
                                <span class="date">November 7, 2021</span>
                                <span class="author">by Thắng Nguyễn</span>an>
                            </p>
                            <p class="description">Thanh niên điều khiển mô tô lưu thông trên đại lộ ở TP Thủ Đức (TP.HCM) với tốc độ cao... </p>
                            <p class="additional">
                                <span class="views">896</span>
                                <span class="comments">0</span>
                            </p>
                        </div>
                    </article>
                </div>
                <button class="more">More</button>
            </main>

            <aside class="right-sidebar">
                <div class="search-box">
                    <label for="search"><i class="fas fa-search"></i></label>
                    <input type="text" autocomplete="off" placeholder="Họ tên vi phạm" />
                    <div class="result"></div>
                    <a href="find.php?"></a>
                </div>
                <div id="piechart" style="width: 300px;height: 300px;"></div>
                <?php
                require_once('db/dbhelper.php');
                require_once('utility/utility.php');
                $sql = "SELECT thang,COUNT(thang) as tong
                from baocao group by thang";
                $data = test($sql);

                ?>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            <?php
                            if (isset($data)) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    $t = "Tháng" . $result['thang'];

                            ?>['<?php echo $t ?>', <?php echo $result['tong'] ?>],
                            <?php
                                }
                            }
                            ?>
                        ]);

                        var options = {
                            title: 'Biểu đồ vi phạm các tháng'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>
                <div class="popular-news">
                    <h2>Tin phổ biến</h2>
                    <article>
                        <p class="date meta">November 7, 2021</p>
                        <h3>Xe máy tông nát đuôi ô tô trên đại lộ ở Sài Gòn</h3>
                    </article>
                    <article>
                        <p class="date meta">November 11, 2021</p>
                        <h3>Va chạm liên hoàn trên đường dẫn cao tốc, một người tử vong</h3>
                    </article>
                    <article>
                        <p class="date meta">November 26, 2021</p>
                        <h3>Nam thanh niên lao xe máy vào cổng nhà dân tử vong</h3>
                    </article>
                    <article>
                        <p class="date meta">December 7, 2021</p>
                        <h3>Ớn lạnh hình ảnh xe khách bị xé toạc, biến dạng sau TNGT trên cao tốc</h3>
                    </article>
                    <article>
                        <p class="date meta">December 8, 2021</p>
                        <h3>Đà Nẵng: 2 người chở rau, chuối tử vong thương tâm bên lề đường</h3>
                    </article>
                </div>

            </aside>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.search-box input[type="text"]').on("keyup input", function() {
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("backend-search.php", {
                        term: inputVal
                    }).done(function(data) {
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>


</body>


</html>