<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
    <title>Socio eliminato</title>
</head>
<body>
    <p>
    <?php
        require_once('config.php');
        //var_dump($_POST);
        //var_dump($_COOKIE);
        $sql = 'DELETE FROM giocatori WHERE N_GIOCATORE = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'id' => $_COOKIE['id']
            ]
        );
        if ($stmt->rowCount() == 1)
            echo '<p>Il socio è stato eliminato</p>';
        else {
            echo '<p>Il socio non è stato eliminato, contatta l\'amministratore</p>';
        }
     ?>
     </p>
</body>
</html>
