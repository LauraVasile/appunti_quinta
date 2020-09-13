<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">

    <title>Inserimento Data</title>
</head>
<body>

    <header class="sticky">
        <a href="logout.php" role="button">Logout</a>
    </header>

    <?php
    require_once('config.php');
    $data_giorno = $_POST['data_giorno'];
    $temp = 0;
    $temp2 = 0;
    $sql = "INSERT INTO monitoraggio(data_giorno,ingressi,uscite)VALUES(:data_giorno,:temp,:temp2)";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute(
    [
        "data_giorno" => $data_giorno,
        "temp" => $temp,
        "temp2" => $temp2
    ]
    );
    ?>
    <h1>Data insertita correttamente!</h1> <hr>
    <a href="insertDataContinua.php" role="button">Inizia a gestire gli ingressi e le uscite</a>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class = "sticky">
    <p> © 2020 - 2021 | Powered by Francesco Mio - Paolo Cordioli - Claudio Sycaj</p>
    </footer>
</body>
</html>