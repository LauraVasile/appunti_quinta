<?php
require_once("config.php");
session_start();

if (isset($_POST["username"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM dipendenti WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username'=>$username]);
    $recordUtente = $stmt->fetch();

    if ($recordUtente && password_verify($password, $recordUtente["password"]))
        $_SESSION["utente"] = $recordUtente;
}
require_once("autenticato.php");
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
  <a href="saluti.php" role="button">Home</a>
  <!--Il menù viene diversificato se è attivo un utente o no-->
  <?php
  require_once("header.php");
  ?>
</header>
<br />
<div class="container">
  <div class="row">
    <div class="col-sm">
    <!--Questa parte serve a far vedere che c'è una sessione attiva-->
    <?php
        if ($utente_autenticato) {
            echo '<div class="card warning fluid">Ciao ' . $nome . ' ' . $cognome . ' <strong>ID di sessione</strong> ' . session_id() . '</div>';
        }   
    ?>
    <div class="card fluid">
        <h3>Lista impiegati</h3>
        
        <?php
        $stmt = $pdo->query("SELECT username FROM dipendenti");
        while ($row = $stmt->fetch()) {
            echo "<p>username: <mark>" . $row["username"] . "</mark></p>";
        }
        ?>
    </div>
    <p>Password di acoradi: ciaone</p>
    <p>Password di abe: prova</p>
    </div>
  </div>
</div>
<footer>
    <p>Supermercato A.C.M.E.</p>
</footer>

</body>
</html>
