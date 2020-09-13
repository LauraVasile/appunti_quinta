<?php
require_once("config.php");

session_start();

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
        if ($utente_autenticato)
        {
            $sql = 'INSERT INTO clienti (azione, dipendente_id) VALUES (:azione, :dipendente_id)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'azione' => 'ENTRATO',
                    'dipendente_id' => $id
                ]
            );
            if ($stmt->rowCount() == 1) {
                echo '<p>Il cliente è stato inserito con successo </p>';
                header("Location: clienti.php");
            }
            else {
                echo 'Il cliente non è stato inserito, contatta l\'amministratore';
            }
        } else {
            header("Location: saluti.php");
        }
    ?>
  </div>
</div>
<footer>
    <p>Supermercato A.C.M.E.</p>
</footer>
</body>
</html>