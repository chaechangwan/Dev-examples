<?php
    include "./include/dbconn.php";
    $memo_content = $_POST['content'];
    $memo_check = $_POST['check'];
    $sql = "INSERT INTO tb_memo (memo_content, memo_check) values ('$memo_content', '$memo_check')";
    $result = mysqli_query($conn, $sql);
    echo "<script>location.href='./page1.php'</script>";
?>