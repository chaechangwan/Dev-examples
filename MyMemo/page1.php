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
</head>
<body>
    <header>
        <div id="header">
            <div id="logo">MyMEMO</div>
            <div id="list">
                <button id="leftbtn">&lt;</button>
                <ul>
                    <li>memo1</li>
                    <li>memo2</li>
                    <li>memo3</li>
                </ul>
                <button id="rightbtn">&gt;</button>
            </div>
            <div id="goWrite"><img src="./photo/writing.png"></div>
            <div id="search">
                <input type="button" value="검색"><input type="text" onkeyup="search()">
            </div>
        </div>
    </header>
    <section>
        <div id="section">
            <ul>
<?php
    while($row = mysqli_fetch_array($result)){
?>
                <li><?=$row['memo_content']?></li>
<?php
    }
?>
            </ul>
        </div>
    </section>
    <div id="eye"><img src="./photo/photoOff.png"></div>

    <script>
        let httpRequest = 0;
        function search(){
            const val = document.getElementById('search').children[1].value
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = getContent;
            httpRequest.open('POST', 'list_ok.php', true);
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send('key='+val);           
        }
        function getContent(){
            if(httpRequest.readyState == XMLHttpRequest.DONE){
                if(httpRequest.status == 200){
                    const resp = JSON.parse(httpRequest.responseText);
                    const ul = document.getElementById('section').firstElementChild;
                    while(ul.hasChildNodes()){
                        ul.removeChild(ul.firstChild);
                    }
                    resp.forEach(function(element, idx, array){
                        const li = document.createElement('li');
                        li.innerHTML = element.memo_content;
                        ul.appendChild(li);
                    });
                    console.log(resp);
                }
            }              
        }

    </script>
</body>
</html>