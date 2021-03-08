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
        <form action="write_ok.php" method="post">
            <textarea class="content" autofocus></textarea>
            <div class="button">                 
                <input type="button" class="back" value="back" onclick="history.back()"><input type="submit" class="save" value="save">
            </div>
        </form>
    </section>
</body>
</html>