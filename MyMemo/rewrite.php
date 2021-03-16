<?php
include './include/dbconn.php';
$memo_idx = $_GET['memo_idx'];
$sql = "SELECT * FROM tb_memo WHERE memo_idx = $memo_idx";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/write.css">
</head>
<body>
    <header>
        <div id="logo">MyMEMO</div>
    </header>
    <section>
        <form action="rewrite_ok.php" name="frm" method="post">
            <input type="hidden" name="check" value="n">
            <textarea name="content" autofocus><?=$row['memo_content']?></textarea>
            <div class="button">                 
                <input type="button" class="back" value="BACK" onclick="history.back()"><input type="button" class="save" value="SAVE">
            </div>
        </form>
    </section>
    <div class="modal hidden">
        <div class="md_overlay"></div>
        <div class="md_content">
            <div class="md_X">X</div>
            <div class="md_text">
                Do you want to mark important?
            </div>
            <div class="md_btn">
                <button id="no">NO</button>
                <button id="yes">YES</button>
            </div>
        </div>
    </div>
    <script src="./js/write.js"></script>
</body>
</html>
