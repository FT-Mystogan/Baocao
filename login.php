<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">
    <style>
        h3 {
            color: red;
            font-size: large;
        }
    </style>
</head>

<body>
    <div class="login">
        <div style=" font-size: 60px;
        margin-bottom: 20px; ">
            <img src="images/logo.jpg" alt="" width="80px" height="80px">
        </div>
        <h2>Đăng nhập</h2>
        <?php
        session_start();
        $mk = $tk = '';
        require_once('db/dbhelper.php');
        require_once('utility/utility.php');
        if (!empty($_POST)) {
            $mk = getPOST('mk');
            $tk    = getPOST('tk');

            if ($mk != '' && $tk != '') {
                //save user into database
                $sql  = "select * from users where tk = '$tk' and mk = '$mk'";
                $data = executeResult($sql);
                if ($data != null && count($data) > 0) {
                    $_SESSION['fullname'] = $data['fullname'];
                    $_SESSION['tk'] = $data['tk'];
                    $_SESSION['mk'] = $data['mk'];
                    $_SESSION['img'] = $data['img'];
                    header('Location: index.php');
                    die();
                } else {
                    echo "<h3>Sai thông tin đăng nhập</h3>";
                }
            } else {
                echo "<h3>Mời nhập đầy đủ thông tin</h3>";
            }
        }
        ?>
        <form action="" method="POST">
            <div class="group"><input type="text" placeholder="Tài khoản" name="tk"><i class="fa fa-user"></i></div>
            <div class="group"><input type="password" placeholder="Mật khẩu" name="mk"><i class="fa fa-lock"></i></div>
            <button> <i class="fa fa-send"></i>Đăng nhập</button>
        </form>
        <p class="fs">Quên <a href="#">Tài khoản</a> / <a href="#">Mật khẩu</a> ? </p>
    </div>
</body>

</html>