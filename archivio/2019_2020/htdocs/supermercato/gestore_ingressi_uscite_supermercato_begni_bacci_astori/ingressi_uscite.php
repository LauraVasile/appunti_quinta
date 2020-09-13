<?php
ini_set('display_errors', 1);
ini_set('log_errors', 0);

$host = 'localhost';
$db   = 'ingressi_uscite_supermercato';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

session_start();


if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    //Lo username è un campo di tipo UNIQUE, quindi la riga di risposta è unica
    //oppure non è presente
    $sql = "SELECT * FROM dipendente WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $recordUtente = $stmt->fetch();
    //se esiste l'utente, verifica password e registra informazioni nella sessione
    if ($recordUtente && password_verify($password, $recordUtente["password"]))
        $_SESSION["utente"] = $recordUtente;
}

//se l'utente è autenticato recupera dei dati dalla sessione
if (isset($_SESSION["utente"])) {
    $id_dipendente = $_SESSION["utente"]["id"];
    //recupera il numero di persone attuali nel supermercato
    $stmt = $pdo->query("SELECT numero_persone FROM stato");
    if ($row = $stmt->fetch()) {
        $numero_persone = $row["numero_persone"];
        $aggiornato = true;
    } else {
        $aggiornato = false;
    }
} else {
    //se si prova ad accedere a questa pagina senza essere autenticati 
    //riporta alla pagina di login
    header("Location: login.php");
    return;
}

?>

<?php
if (isset($_POST['aggiorna_persone'])) {
    $stmt = $pdo->query("SELECT numero_persone FROM stato");
    if ($row = $stmt->fetch()) {
        $numero_persone = $row["numero_persone"];
        $aggiornato = true;
    } else {
        $aggiornato = false;
    }
}

if (isset($_POST['persona_uscita'])) {
    $stmt = $pdo->query("SELECT numero_persone FROM stato");
    $numero_persone = $stmt->fetch()["numero_persone"];
    //dopo aver recuperato il numero di persone, ne toglie una
    $numero_persone--;
    //modifica la quantità di persone nel db
    $stmt = $pdo->prepare("UPDATE stato SET numero_persone = :numero_persone WHERE id=1");
    if ($stmt->execute(['numero_persone' => $numero_persone])) {
        $aggiornato = true;
    } else {
        $aggiornato = false;
    }
    $stmt = $pdo->prepare("INSERT INTO uscita (id_dipendente) VALUES (:id_dipendente)");
    $stmt->execute(['id_dipendente' => $id_dipendente]);
}

if (isset($_POST['persona_entrata'])) {
    $stmt = $pdo->query("SELECT numero_persone FROM stato");
    $numero_persone = $stmt->fetch()["numero_persone"];
    //dopo aver recuperato il numero di persone, ne aggiunge una
    $numero_persone++;
    //modifica la quantità di persone nel db
    $stmt = $pdo->prepare("UPDATE stato SET numero_persone = :numero_persone WHERE id=1");
    if ($stmt->execute(['numero_persone' => $numero_persone])) {
        $aggiornato = true;
    } else {
        $aggiornato = false;
    }
    $stmt = $pdo->prepare("INSERT INTO ingresso (id_dipendente) VALUES (:id_dipendente)");
    $stmt->execute(['id_dipendente' => $id_dipendente]);
}

//ricarica la pagina ogni minuto
header("Refresh: 60;");

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Ingressi e uscite</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <header class="sticky">
        <a href="ingressi_uscite.php" class="button">Home</a>
        <a href="statistiche.php" class="button">Statistiche</a>
        <a href="logout.php" class="button">Logout</a>
    </header>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div id="numero-persone" class="card fluid">
                    NUMERO PERSONE: <?php echo $numero_persone ?>
                </div>
                <form method="post">
                    <div id="entrata-uscita">
                    <?php if ($numero_persone > 0) : ?>
                        <input  type="submit" name="persona_uscita" value="Persona uscita" class="button3" />
                    <?php else : ?>
                        <input type="submit" name="persona_uscita" value="Persona uscita" class="button3" disabled />
                    <?php endif; ?>
                    <input type="submit" name="persona_entrata" value="Persona entrata" class="button3" />
                    </div>
                    <br>
                    <div id="aggiorna"><input type="submit" name="aggiorna_persone" value="Aggiorna numero persone" class="button3" /></div>
                </form>
                <div class="card fluid fade-out">
                    <?php if ($aggiornato) : ?>
                        <div id="numero-aggiornato">Numero di persone aggiornato</div>
                    <?php else : ?>
                        <div>Qualcosa è andato storto, riprova</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>