<?php
$host = 'localhost';
$db   = 'accesso';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

session_start();

if (isset($_POST["username"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM utenti WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username'=>$username]);
    $recordUtente = $stmt->fetch();
    
    if ($recordUtente && password_verify($password, $recordUtente["password"]))
        $_SESSION["user"] = $recordUtente;
}
if (isset($_SESSION["user"]))
{
    $utente_autenticato = true;
    $nome = $_SESSION["user"]["nome"];
    $cognome = $_SESSION["user"]["cognome"];
}
else
    $utente_autenticato = false;
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Contatore accessi</title>
    <link rel="stylesheet" href="mini-default.min.css">
</head>


<body>

<header class="sticky">
  <a href="home.php" role="button">Home</a>
  <?php if ($utente_autenticato): ?>
      <a href="accessi.php" role="button">Contatore accessi</a>
      <a href="logout.php" role="button">Logout</a>
  <?php else: ?>
      <a href="login.php" role="button">Login</a>
  <?php endif; ?>
</header>
<br />
<div class="container">
  <div class="row">
    <div class="col-sm">
    <!--TODO Da rimuovere quando pubblicato-->
    <div class="card fluid"> Dati di login esistenti:<br>
        <p>Username: <mark>Lisa</mark>, Password: <mark>1234</mark></p>
        <p>Username: <mark>Ryujin</mark>, Password: <mark>0357</mark></p>
        <p>Username: <mark>Mario</mark>, Password: <mark>io12me</mark></p>
    </div>
    </div>
  </div>
</div>
</body>
</html>
