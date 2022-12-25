<?php
require "../config.php";
session_start();



function pushDataJson($data){
    $json_data = json_decode(file_get_contents('../images.json'),true);
    foreach($data as $answer){
        $json_data['groups'][$answer['question']]['1']['answers']['weight']+=intval($answer['img1']);
        $json_data['groups'][$answer['question']]['2']['answers']['weight']+=intval($answer['img2']);
        $json_data['groups'][$answer['question']]['3']['answers']['weight']+=intval($answer['img3']);
        $json_data['groups'][$answer['question']]['4']['answers']['weight']+=intval($answer['img4']);

        $json_data['groups'][$answer['question']]['1']['answers']['count']+=1;
        $json_data['groups'][$answer['question']]['2']['answers']['count']+=1;
        $json_data['groups'][$answer['question']]['3']['answers']['count']+=1;
        $json_data['groups'][$answer['question']]['4']['answers']['count']+=1;
    }
    file_put_contents('../images.json', json_encode($json_data));
}
pushDataJson($_SESSION['answers'])
?>



<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ыы</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Montserrat:400,500,700|Playfair+Display:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">
    <link href="../style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1>шрек</h1>
    <div class="main-block">

        <button type="button" class="btn btn-primary btn-lg" onClick='location.href="../index.php"'>Начать заново</button>

        <h2>Результаты</h2>

        <div class="result">
            <p class="titleResult">результат:</p>
            <br>
            <?php print_r($_SESSION)?>
        </div>
    </div>
</body>

</html>