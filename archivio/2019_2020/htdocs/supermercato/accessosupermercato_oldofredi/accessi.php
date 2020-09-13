<?php

    $host = 'localhost';
    $db   = 'accesso'; 
    $user = 'root'; // TODO impostare un utente con permessi dedicati a questo db
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $pdo = new PDO($dsn, $user, $pass);

    session_start();

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
        <title>Accessi</title>
        <link rel="stylesheet" href="mini-default.min.css">
    </head>

    <body>
        <header class="sticky">
        <a href="home.php" role="button">Home</a>
        <?php if ($utente_autenticato): ?>
            <a href="logout.php" role="button">Logout</a>
        <?php else: ?>
            <a href="login.php" role="button">Login</a>
        <?php endif; ?>
        </header>
        <br />
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <?php
                        if ($utente_autenticato)
                        {
                            echo '<div class="card fluid">Welcome back, ' . $nome . ' ' . $cognome .'.</div>';

                            echo '<div class="card fluid">';
                            if(isset($_POST['increment'])) { 
                                $inc = 'UPDATE data SET counter=counter+1 WHERE id=0 ';
                                $stmt = $pdo->query($inc); 

                            } 
                            if(isset($_POST['decrement'])) { 
                                $dec = 'UPDATE data SET counter=counter-1 WHERE id=0 ';
                                $stmt = $pdo->query($dec); 
                            }  
                            
                    
                            echo '<form method="post"> 
                                    <input type="submit" class="button" name="increment" value="+"/>
                                    <input type="submit" class="button" name="decrement" value="-"/> 
                                    <input type="submit" class="button" name="update" value="Update"/> 
                                </form> 
                            </div>';
                            
                            if(isset($_POST['update'])) { 
                                $counter = 'SELECT * FROM data WHERE id=0';
                                $stmt=$pdo->query($counter);
                                $data = $stmt->fetch();
                                echo "Ci sono " . $data["counter"] . " persone nel supermercato.\n"; 
                            } 
                            
                        } else {
                            echo '<p>Devi autenticarti per poter modificare gli accessi al supermercato</p>';
                        }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
