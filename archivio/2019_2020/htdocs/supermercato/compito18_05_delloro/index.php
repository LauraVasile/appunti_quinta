<?php
ini_set('display_errors', 1);
ini_set('log_errors', 0);

$host = 'localhost';
$db   = 'supermercatoDB';
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
}
else
    $utente_autenticato = false;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="mini-default.min.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header class="sticky">
      <?php if ($utente_autenticato): ?>
          <a href="conta_persone.php" role="button">Applicazione</a>
          <a href="logout.php" role="button">Logout</a>
      <?php else: ?>
          <a href="login.php" role="button">Login</a>
      <?php endif; ?>
    </header>
    <br/>
    <div class="container">
      <div class="row">
        <div class="col-sm">
        <div class="card fluid">
          Se non hai fatto l'accesso scegli Login <br>
          Altrimenti puoi usare l'applicazione o fare il logout
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
