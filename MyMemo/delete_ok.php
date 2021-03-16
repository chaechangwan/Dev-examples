<?php
include './include/dbconn.php';
$memo_idx = $_GET['memo_idx'];
$sql = "DELETE FROM tb_memo WHERE memo_idx = '$memo_idx'";
$result = mysqli_query($conn, $sql);
?>