<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <style>
        #logo{
            border: 1px solid darkblue;          
            margin: 20px;
            font-family : 'RocknRoll One', sans-serif;
            font-size: 40px;
            font-style: italic;
            color: #FFF56E;
        }
        body, html{
            margin: 0;
            height: 100%;
        }
        .section {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            margin: 0 auto;
            width: 80%;
            height: 80%;
            background: beige;
        }
        form {
            width: 100%;
            height: 100%;
        }
        textarea {
            width: 100%;
            height: 80%;
        }
    </style>
</head>
<body>
    <header>
        <div id="logo">MyMEMO</div>
    </header>
    <div class="section">
        <form method="write_ok.php">
            <textarea></textarea>                 
            <input type="button" value="취소">
        </form>
    </div>
</body>
</html>