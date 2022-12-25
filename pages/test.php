<?php
// require "../config.php";
session_start();

$temp = file_get_contents("../questions.json");

$num_questions=3;
$questions = json_decode($temp, true);

$question = $_GET['question'] ?? null;

if ($question != 1) {
    add_user_answer($question-1, $_GET['img1'], $_GET['img2'], $_GET['img3'], $_GET['img4']);
}

function add_user_answer($question, $img1, $img2, $img3, $img4){
    $_SESSION['answers'][] = [
        'img1' => $img1,
        'img2' => $img2,
        'img3' => $img3,
        'img4' => $img4,
        'question' => $question
    ];
}

function print_answers($question_id)
{
    global $question;

    if($question<=3){
        ?>
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="../images/<?php echo $question.'/'.$question; ?>.jpg" alt="Card image cap">
                    <div class="card-body">
                        <input class="form-check-input" list="cocktail" name="img1">
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="../images/<?php echo $question.'/'.$question; ?>.jpg" alt="Card image cap">
                    <div class="card-body">
                        <input class="form-check-input" list="cocktail" name="img2">
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="../images/<?php echo $question.'/'.$question; ?>.jpg" alt="Card image cap">
                    <div class="card-body">
                        <input class="form-check-input" list="cocktail" name="img3">
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="../images/<?php echo $question.'/'.$question; ?>.jpg" alt="Card image cap">
                    <div class="card-body">
                        <input class="form-check-input" list="cocktail" name="img4">
                    </div>
                </div>
                <datalist id="cocktail">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </datalist>
                <button type="submit" class="btn btn-primary">Далее</button>
                <?php 
    }

                else{
                    ?><button type="button" onClick='location.href="results.php"' class="btn btn-primary">Готово</button> <?php
                }
                ?>
                <input type="hidden" name="question" value=<?php echo $question+1; ?>>
        <?php
    
}

?>


<!DOCTYPE HTML>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>лаба</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Montserrat:400,500,700|Playfair+Display:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">
    <link href="../style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1>лаба</h1>
    <div class="main-block">

        <button type="button" class="btn btn-primary btn-lg" onClick='location.href="../index.php"'>Начать заново</button>

        <form class="questions_form" action="test.php" method="get">
            <div class="form-check">
                <?php 
                print_answers($question)
                ?>
            </div>
        </form>
        <?php print_r($_SESSION) ?>
    </div>
</body>
<script src="test.js"></script>

</html>