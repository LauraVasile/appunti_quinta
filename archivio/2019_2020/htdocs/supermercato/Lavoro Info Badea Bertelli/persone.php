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

//Questa istruzione indica al server di istanziare una
//sessione o di continuare con una già presente,
//senza di questa non funzionerebbe niente
session_start();

//Verifica se c'è un utente autenticato
if (isset($_SESSION["utente"]))
{
    $utente_autenticato = true;
    //$id = $_SESSION["utente"]["id"];
    $nome = $_SESSION["utente"]["nome"];
    $cognome = $_SESSION["utente"]["cognome"];
}
else
    $utente_autenticato = false;
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Prova di autenticazione</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>


<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
<?php if ($utente_autenticato): ?>
      <a class="navbar-brand" href="menu_utente.php" role="button">Menù</a>
      <a class="navbar-brand" href="logout.php" role="button">Logout</a> 
  <?php else: ?>
      <a href="login.php" role="button">Login</a>
  <?php endif; ?>
</nav>
      <?php
        $stmt = $pdo->query("SELECT COUNT(*) FROM clienti");
        $num = $stmt->fetchColumn();
        echo '<h3 class="ml-4">I clienti attualmente dentro il negozio sono: ' . $num . "</h3>";
      ?>
</body>
</html>