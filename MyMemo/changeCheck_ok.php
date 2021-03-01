<?php
    $memo_idx = $_GET['memo_idx'];
    include "./include/dbconn.php";
    $sql = "SELECT * FROM tb_memo WHERE memo_idx = '$memo_idx'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['memo_check'] == 'y'){
        $sql = "UPDATE tb_memo SET memo_check = 'n' WHERE memo_idx = '$memo_idx'";
    }else{
        $sql = "UPDATE tb_memo SET memo_check = 'y' WHERE memo_idx = '$memo_idx'";
    }
    $result = mysqli_query($conn, $sql);
?>