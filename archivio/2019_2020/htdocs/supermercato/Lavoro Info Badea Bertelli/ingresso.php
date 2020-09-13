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
}
else
    $utente_autenticato = false;
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Aggiungi Ingresso</title>
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
      <form action="inserimento.php" method="post" class="form-login w-25 mx-auto">
          <h3 class="mt-5">Form inserimento</h3>
          <label class="sr-only" for="username" style="width: 80px;">Nome</label>
          <input class="form-control mt-4" type="text" value="" name="nome_ins" placeholder="nome_ins">
          <label class="sr-only" for="pwd" style="width: 80px;">Cognome</label>
          <input class="form-control mt-2" type="text" value="" name="cognome_ins" placeholder="cognome_ins">
          <button class="btn btn-primary mt-4">Aggiungi Ingresso</button>
      </form>
</body>
</html>