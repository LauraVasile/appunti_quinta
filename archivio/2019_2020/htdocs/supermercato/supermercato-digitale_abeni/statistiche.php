<?php
require_once("config.php");

//Questa istruzione indica al server di istanziare una
//sessione o di continuare con una già presente,
//senza di questa non funzionerebbe niente
session_start();


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
    <h1>Statistiche giornaliere</h1>    
  <div class="row">
    <div class="">
    <!--Questa parte serve a far vedere che c'è una sessione attiva-->
    <?php
        if (!$utente_autenticato)
        {
            header("Location: saluti.php");
        }
    ?>
    </div>
        <?php
        $clienti = [];
        $stmt = $pdo->query('SELECT azione, data FROM `clienti` ORDER BY data');
        while($row = $stmt->fetch()) {
            $ore = explode(' ', $row["data"])[1];
            $ora = explode(':', $ore)[0];
            $minuto = explode(':', $ore)[1];
            //echo "ORA $ora, MINUTO $minuto";
            //$ora = 22;
            // $minuto = 14;
            $key = "";
            if ($minuto < 15) {
                // 22:00
                $key = "$ora:00";
                
            } elseif ($minuto <= 30) {
                $key = "$ora:00 - $ora:30";
            } elseif ($minuto <= 59) {
                $key = "$ora:30 - " . ($ora+1) . ":00";
            }
            if(!array_key_exists($key, $clienti)) {
                $clienti[$key] = ["ENTRATO" => 0, "USCITO" => 0];
            }
            $clienti[$key][$row["azione"]]++; // = $clienti[$key][$row["azione"]]+1;
        }
        echo "<table>";
        echo "<thead><th>Ore</th><th>Entrati</th><th>Usciti</th></tr></thead>";
        foreach($clienti as $orario => $value) {
            echo "<tr><td>$orario</td><td>". $value["ENTRATO"] . "</td><td>" . $value["USCITO"] . "</td></tr>";
        }
        echo "</table>";
        ?>
    </div>
    <h2>Statistiche dipendenti</h2>
    <?php

        $stmt = $pdo->query('SELECT username, COUNT(*) AS QuanteInterazioni
        FROM clienti, dipendenti
        WHERE clienti.dipendente_id = dipendenti.id
        GROUP BY username');

        while($row = $stmt->fetch()) {
            echo "<p><mark>" . $row["username"] . "</mark> " . $row["QuanteInterazioni"] . " interazioni</p>";
        }
    ?>
  </div>
</div>
<footer>
    <p>Supermercato A.C.M.E.</p>
</footer>
</body>
</html>
