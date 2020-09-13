<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="hidden" name="nome" value="geppo">
    <input type="submit" value="">
    <?php
        require_once ('conf/config.php');
        spl_autoload_register(function ($class_name) {
        include_once __DIR__ . '/' . str_replace('\\','/', $class_name) . '.php';
        });

    use Model\Question as Question;
    use Model\QuestionRepository;
    use Util\Request;

    $request = new Request($ROOT);
        var_dump($request);

        $question = QuestionRepository::getQuestionByID(1);
        echo $question->getPublicationDate();
        //QuestionRepository::saveQuestion(new Question(null, 'Ti fai la doccia la mattina o la sera?','Geppo',));
        //QuestionRepository::saveQuestion(new Question(6, 'Ti piace il tuo nome?','Fillis',null));
    ?>

</form>
</body>
</html>
