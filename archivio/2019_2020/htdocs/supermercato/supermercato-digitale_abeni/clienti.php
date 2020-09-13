<?php
require_once("config.php");

session_start();

$numero_clienti = 0;

$mostra = true;

//Verifica se c'è un utente autenticato
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
<h2>Area gestione clienti</h2>
  <div class="row">
    <div class="col-sm">
    <!--Questa parte serve a far vedere che c'è una sessione attiva-->
    <?php
        if (!$utente_autenticato)
        {
            header("Location: saluti.php");
        }
        

        if($mostra) {
            $stmt = $pdo->query('SELECT QuantiEntrati - QuantiUsciti AS QuantiDentro
            FROM 
            ((SELECT COUNT(azione) AS QuantiEntrati
            FROM clienti
            WHERE azione = "ENTRATO")AS A), ((SELECT COUNT(azione) AS QuantiUsciti
            FROM clienti
            WHERE azione = "USCITO")AS B)');
            $numero_clienti = $stmt->fetch()["QuantiDentro"];
            if($numero_clienti == 1) {
                echo "<p>C'è dentro " . $numero_clienti . " cliente nel supermercato.</p>";
            } else {
                echo "<p>Ci sono " . $numero_clienti . " clienti dentro il supermercato.</p>";
            }
        }

    ?>
        
       
        
        <input type="button" onclick="window.location='aggiungi.php'" class="Redirect" value="Aggiungi cliente"/>
        
        <input type="button" <?php if($numero_clienti <= 0) { echo "disabled"; } ?> onclick="window.location='rimuovi.php'" class="Redirect" value="Rimuovi cliente"/>
        
        <br>

        <label for="sf1-check">Auto-update</label>
        <input type="checkbox" id="autoupdate">
        
  </div>
</div>
<footer>
    <p>Supermercato A.C.M.E.</p>
</footer>
<script src="index.js"></script>
</body>
</html>
