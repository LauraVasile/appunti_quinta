<?php
ini_set('display_errors', 1);
ini_set('log_errors', 0);

$host = 'localhost';
$db   = 'accesso';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

session_start();

if (isset($_SESSION["utente"]))
{
    $utente_autenticato = true;
    $nome = $_SESSION["utente"]["nome"];
    $cognome = $_SESSION["utente"]["cognome"];

    $nomeins = $_POST["nome_ins"];
    $cognomeins = $_POST["cognome_ins"];

    $stmt = $pdo->query("SELECT COUNT(*) FROM clienti WHERE nome = '$nomeins' AND cognome = '$cognomeins'");
    $num = $stmt->fetchColumn();
}
else
    $utente_autenticato = false;


?>

<!DOCTYPE html>
<html lang="it">

    <head>
        <meta charset="UTF-8">
        <title>Inserimento</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>


    <body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <?php if ($utente_autenticato): ?>
        <a class="navbar-brand" href="menu_utente.php" role="button">Menù</a>
        <a class="navbar-brand" href="ingresso.php" role="button">Aggiungi Ingresso</a>
        <a class="navbar-brand" href="logout.php" role="button">Logout</a> 
        <?php else: ?>
        <a href="login.php" role="button">Login</a>
        <?php endif; ?>
    </nav>
                <?php
                    if ($num > 0)
                        echo '<h3 class="ml-5 mt-1">L' . "'" . 'utente che stai cercando di inserire è gia presente all' . "'" . 'interno del negozio</h3>';
                    else {
                        $sql = "INSERT INTO clienti (nome, cognome) VALUES ('$nomeins', '$cognomeins')";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        echo '<h3 class="ml-5 mt-1">È entrato/a: ' . $nomeins . " " . $cognomeins . "</h3>";
                    }
                ?>
    </body>
</html>