<?php
    include './include/dbconn.php';
    $sql = "SELECT * FROM tb_memo WHERE memo_idx = 10";
    $result = mysqli_query($conn, $sql);
    $temp = mysqli_num_rows($result);
    echo "<script>alert($temp);</script>"
?>