<?php require_once('config.php') ?>
<?php

//Questa istruzione indica al server di istanziare una
//sessione o di continuare con una già presente,
//senza di questa non funzionerebbe niente
//Attenzione che nel file php.ini il percorso dove sono salvate le sessioni
//sia corretto, nel mio caso ho dovuto metterlo a posto a mano in questo modo
//session.save_path = "F:\xampp_7_4_1\tmp"
session_start();

//Verifica se la richiesta arriva dalla pagina di login
if (isset($_POST["username"])){
    //Controlla se le credenziali sono corrette
    $username = $_POST["username"];
    $password = $_POST["password"];
    //Lo username è un campo di tipo UNIQUE, quindi la riga di risposta è unica
    //oppure non è presente
    $sql = "SELECT * FROM impiegato WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username'=>$username]);
    $recordUtente = $stmt->fetch();
    //Se c'è l'utente selezionato e la password è corretta allora tutti i suoi
    //dati vengono registrati nella sessione
    //Siccome si usa password_verify per verificare la correttezza della password
    //per memorizzarla nel database bisogna usare password_hash
    if ($recordUtente && password_verify($password, $recordUtente["password"]))
        $_SESSION["utente"] = $recordUtente;
}
//Qua si può entrare se nel passaggio precedente sono stati
//salvati i dati di sessioni
//oppure se c'è già una sessione in corso
//Vengono create alcune variabili che verranno usate in seguito
if (isset($_SESSION["utente"]))
{
    $utente_autenticato = true;
    $username = $_SESSION["utente"]["username"];
}
else
    $utente_autenticato = false;
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Gestione ingressi-uscite</title>
    <!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="styles.css">
<!--===============================================================================================-->
</head>

<body>

<header class="topnav">
  <a href="index.php" role="button">Home</a>
  <!--Il menù viene diversificato se è attivo un utente o no-->
  <?php if ($utente_autenticato): ?>
      <a href="logout.php" role="button">Logout</a>
  <?php else: ?>
      <a href="accedi.php" role="button">Login</a>
  <?php endif; ?>
</header>
<br />
<div class="container">
  <div class="row">
    <div class="col-sm">
    <!--Questa parte serve a far vedere che c'è una sessione attiva-->
    <?php if ($utente_autenticato):?>
        <a href="giornate.php" role="button">Nuova giornata</a> <br>

    <?php else: ?>
        <div class="card warning fluid">Non riconosciuto!<a href = "accedi.php">login</a></div>
    <?php endif; ?>
    </div>
  </div>
</div>
<footer>
    <p>Controllo ingressi-uscite</p>
</footer>
</body>
</html>