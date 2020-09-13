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

    $nomeuscita = $_POST["nomeuscita"];
    $cognomeuscita = $_POST["cognomeuscita"];

    $del=$pdo->prepare("DELETE FROM clienti 
                            WHERE clienti.nome = '$nomeuscita' 
                            AND clienti.cognome = '$cognomeuscita'");
    $del->execute();
    $err=$del->rowCount();

}
else
    $utente_autenticato = false;


?>

<!DOCTYPE html>
<html lang="it">

    <head>
        <meta charset="UTF-8">
        <title>Eliminazione</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>


    <body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <?php if ($utente_autenticato): ?>
        <a class="navbar-brand" href="menu_utente.php" role="button">Menù</a>
        <a class="navbar-brand" href="uscita.php" role="button">Aggiungi Uscita</a>
        <a class="navbar-brand" href="logout.php" role="button">Logout</a> 
        <?php else: ?>
        <a href="login.php" role="button">Login</a>
        <?php endif; ?>
    </nav>
                <?php
                    if ($err == 0){
                        echo "<h3>Non è stato possibile rimuovere nessun cliente." . "</h3></br>";
                        echo "<h4>Forse volevi eliminare ";
                        $stmt = $pdo->query("SELECT nome, cognome FROM clienti WHERE nome = '$nomeuscita'");
                        while ($res = $stmt->fetch()){
                            echo $res["nome"] . " " . $res["cognome"] . ", ";
                        }
                        echo "</h4></br>";
                        echo "<h4>Oppure ";
                        $stmt = $pdo->query("SELECT nome, cognome FROM clienti WHERE cognome = '$cognomeuscita'");
                        while ($res = $stmt->fetch()){
                            echo $res["nome"] . " " . $res["cognome"] . ", </h4>";
                        }
                        
                    }
                    else
                        echo "<h3>È stato eliminato: " . $nomeuscita . " " . $cognomeuscita . "</h3>";
                    
                ?>
    </body>
</html>