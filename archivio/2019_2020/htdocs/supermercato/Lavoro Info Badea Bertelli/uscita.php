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
    <title>Aggiungi Uscita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>


<body class="text-center">
<nav class="navbar navbar-expand navbar-dark bg-dark">
<?php if ($utente_autenticato): ?>
      <a class="navbar-brand" href="menu_utente.php" role="button">Menù</a>
      <a class="navbar-brand" href="logout.php" role="button">Logout</a> 
  <?php else: ?>
      <a href="login.php" role="button">Login</a>
  <?php endif; ?>
</nav>
      <form class="form-group" action="eliminazione.php" method="post">
          <h3 class="mt-5">Form eliminazione</h3>
            <div class="input-group w-25 mx-auto mt-4">
                <select class="custom-select" id="name" name="nomeuscita">
                <?php
                    $stmt = $pdo->query("SELECT * FROM clienti");
                    while ($cliente = $stmt->fetch()){
                        echo "<option value=" . $cliente['nome'] . ' ">' . $cliente['nome'] . "</option>";
                    }
                ?>
                </select>
            </div>
            <div class="input-group w-25 mx-auto mt-2">
            <select class="custom-select" id="cognome" name="cognomeuscita">
                <?php
                    $stmt = $pdo->query("SELECT * FROM clienti");
                    while ($cliente = $stmt->fetch()){
                        echo "<option value=" . $cliente['cognome'] . ' ">' . $cliente['cognome'] . "</option>";
                    }
                ?>
            </select>
            </div>
              <button class="btn btn-primary mt-3">Aggiungi Uscita</button>
      </form>
</body>
</html>