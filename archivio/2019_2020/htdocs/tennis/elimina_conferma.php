<?php setcookie('id',$_GET['id']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
    <title>Conferma eliminazione</title>
</head>
<body>
<h1>Confermi l'eliminazione di questo socio?</h1>
    <p>
    <?php
        require_once('config.php');
        $sql = 'SELECT * FROM giocatori WHERE N_GIOCATORE = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'id' => $_GET['id']
            ]
        );
        $row = $stmt->fetch();
        echo '<p><mark>Cognome</mark> : ' . $row['COGNOME'] . ' </p>';
        echo '<p><mark>Sesso</mark> : ' . $row['SESSO'] . ' </p>';
        echo '<p><mark>Data di nascita</mark> : ' . date('d/m/Y',strtotime($row['DATA_NASCITA'])) . ' </p>';
        echo '<p><mark>Indirizzo</mark> : ' . $row['INDIRIZZO'] . ' </p>';
     ?>
     </p>
     <a href="elimina.php" class="button">Conferma</a>
     <a href="scegli_modifica.php" class="button">Annulla</a>
</body>
</html>
