<?php
require_once('db/dbhelper.php');
require_once('utility/utility.php');
if(isset($_REQUEST["term"])){
    $data = $_REQUEST["term"];
    $sql = "SELECT * FROM baocao WHERE fullname LIKE '$data%'";
    $query = test($sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $fullname = $row["fullname"];
            echo "<p><a href='find.php?fullname=$fullname'> ".$row["fullname"]."</a> </p>";
        }
    } else{
        echo "<p>Không tìm thấy kết quả nào</p>";
    }
     
}
?>