<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrazione effettuata</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">

</head>
<?php require_once('config.php') ?>
<body>
<header class="sticky">
  <a href="index.php" role="button">Home</a>
  <a href="SignIn.php" role="button">Accedi</a>
</header>
<h1>Registrazione effettuata con successo!</h1>
<?php
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password,PASSWORD_DEFAULT);
$sql = "INSERT INTO addetto(nome,cognome,username,password) VALUES (:nome,:cognome,:username,:password)";
$stmt = $pdo ->prepare($sql);
$stmt->execute(
    [
        "nome" => $nome,
        "cognome" => $cognome,
        "username" => $username,
        "password" => $password
    ]
);
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class = "sticky">
  <p> © 2020 - 2021 | Powered by Francesco Mio - Paolo Cordioli - Claudio Sycaj</p>
</footer> 
</body>
</html>