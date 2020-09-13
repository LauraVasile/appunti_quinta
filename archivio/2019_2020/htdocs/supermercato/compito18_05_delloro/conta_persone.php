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


if (isset($_SESSION["utente"])){
    $utente_autenticato = true;


    if (isset($_POST['plus_button'])) {
      $sql = "UPDATE supermercato
                SET n_clienti = n_clienti+1
                WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$_SESSION["utente"]["id_supermercato"]]);

    } else if(isset($_POST['minus_button'])){
      $sql = "UPDATE supermercato
                SET n_clienti = n_clienti-1
                WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id'=>$_SESSION["utente"]["id_supermercato"]]);

    }

    $sql = "SELECT n_clienti
            FROM `supermercato`, utenti
            WHERE utenti.id_supermercato = supermercato.id
            AND utenti.id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_SESSION["utente"]["id_supermercato"]]);
    $n_persone = $stmt->fetch();


}
else{
    $utente_autenticato = false;
    header("Location: index.php");
}


if (isset($_POST["username"])){
  $sql = "SELECT n_clienti
          FROM `supermercato`, utenti
          WHERE utenti.id_supermercato = supermercato.id
  	      AND utenti.username = :username";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['username' => $username]);
  $n_persone = $stmt->fetch();
}



?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Prova di autenticazione</title>
    <link rel="stylesheet" href="mini-default.min.css">
</head>


<body>

<header class="sticky">
      <a href="index.php" role="button">Home</a>
      <a href="logout.php" role="button">Logout</a>
</header>
<br/>

<div class="">
  <form target="_self" method="post">

    <?php if ($n_persone["n_clienti"] > 0): ?>
      <button type="submit" name="minus_button">-</button>
    <?php else: ?>
      <button type="submit" name="minus_button" disabled>-</button>
    <?php endif; ?>

      <?php
        echo $n_persone["n_clienti"];
      ?>

    <button type="submit" name="plus_button">+</button>
  </form>
</div>


</body>
</html>
