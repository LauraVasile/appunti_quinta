<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
    <title>Gestisci giocatori</title>
</head>
<body>
    <h1>Elenco giocatori</h1>
<?php
    require_once('config.php');
    $sql = 'SELECT * FROM giocatori';
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() == 0)
        echo "<p>Non sono presenti giocatori</p>";
    else {
        echo '<table>';
$header=<<<EOT
    <thead>
    <tr>
      <th>Nome</th>
      <th>Sesso</th>
      <th>Data di nascita</th>
      <th>Indirizzo</th>
      <th>#</th>
      <th>#</th>
    </tr>
  </thead>
EOT;
        echo $header;
        while ($row = $stmt->fetch())
        {
            echo '<tr><td data-label="Name">' . $row['COGNOME'] . '</td><td>' . $row['SESSO'] . '</td><td>' . date('d/m/Y',strtotime($row['DATA_NASCITA'])) . '</td><td>' . $row['INDIRIZZO'] . '</td><td><a href="modifica.php?id=' . $row['N_GIOCATORE'] . '">Modifica<img src="update.jpg"></a></td><td><a href="elimina_conferma.php?id=' . $row['N_GIOCATORE'] . '">Elimina<img src="trash.png"></a></td></tr>';
        }
        echo '</table>';
    }
?>
</body>
</html>
