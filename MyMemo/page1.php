<?php
    include "./include/dbconn.php";
    if($conn){
        echo "<script>console.log('db연결되었습니다');</script>";
    }else{
        echo "<script>console.log('db연결실패');</script>";
    }
    $sql = "SELECT * FROM tb_memo";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page1</title>
    <link rel="stylesheet" type="text/css" href="./css/page1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <script src="./js/page1.js"></script>

</head>
<body>
    <header>
        <div id="header">

            <div class = "flexbox1"> <!--flex-->
                <div id="logo">MyMEMO</div> 
                <div id="toplist"> <!--flex-->
                    <!--왼쪽 버튼 -->
                    <img class="prevbtn" src="./photo/moveleft.png" onclick="loadPrev()">
                    
                    <ul class="carousel-slide"> <!-- flex-->
                        <li>memo1</li>
                        <li>memo2</li>                                                          
                        <li>memo3</li>                                                          
                        <li style="display: none;">memo4</li>                                                          
                    </ul>
                    
                    <!--오른쪽 버튼 -->
                    <img class="nextbtn" src="./photo/moveright.png" onclick="loadNext()">                  
                </div>
                <div id="goWrite"><img src="./photo/writing.png"></div>
            </div>


            <div id="search">
                <img src="./photo/search.png" width="40px;"><input id="searchBar" type="text" onkeyup="search()" placeholder="검색어를 입력해주세요">
            </div>

        </div>
    </header>
    <section>
        <div id="section">
            <ul>
<?php
    while($row = mysqli_fetch_array($result)){
?>
                <li>     
                    <div style="position:relative;text-align:right;border-bottom:1px solid black;">
                        <img src="./photo/heart.png" width="20px" style="position: absolute;left:10px;">2021-02-28
                    </div>
                    <div>
                        <a href="#"><?=$row['memo_content']?><a>
                    </div>               
            
                    <ul class="dropdown">
                        <li><a href='#'><img src='./photo/heart.png'></a></li>
                        <li><a href='#'><img src='./photo/trash.png'></a></li>
                    </ul>
                </li>
<?php
    }
?>
            </ul>
        </div>
    </section>
    <div id="eye"><img src="./photo/photoOff.png"></div>
</body>
</html>