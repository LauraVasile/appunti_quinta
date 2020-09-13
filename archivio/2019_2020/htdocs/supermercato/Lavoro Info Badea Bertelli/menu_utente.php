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

if (isset($_POST["username"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM utenti WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username'=>$username]);
    $recordUtente = $stmt->fetch();
    if ($recordUtente && password_verify($password, $recordUtente["password"]))
        $_SESSION["utente"] = $recordUtente;
}
if (isset($_SESSION["utente"]))
{
    $utente_autenticato = true;
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
    <title>Menù</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>


<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
<?php if ($utente_autenticato): ?>
      <a class="navbar-brand" href="ingresso.php" role="button">Aggiungi Ingresso</a>
      <a class="navbar-brand" href="uscita.php" role="button">Aggiungi Uscita</a>
      <a class="navbar-brand" href="persone.php" role="button">Clienti Attuali</a>
      <a class="navbar-brand" href="logout.php" role="button">Logout</a> 
  <?php else: ?>
      <a href="login.php" role="button">Login</a>
  <?php endif; ?>
</nav>
    <?php
        if ($utente_autenticato)
            echo '<h3 class="ml-4">Ciao ' . $nome . ' ' . $cognome . "</h3>";

    ?>
</body>
</html>