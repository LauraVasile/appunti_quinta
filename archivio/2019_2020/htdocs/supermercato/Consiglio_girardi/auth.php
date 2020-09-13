<?php
include './config.php';
session_start();

if (isset($_POST["username"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM dipendenti WHERE matricola = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $recordUtente = $stmt->fetch();

    if ($recordUtente && password_verify($password, $recordUtente["HashedPW"])) {
        $_SESSION["utente"] = $recordUtente;
    }
}

if (isset($_SESSION["utente"])) {
    $utente_autenticato = true;
    $nome = $_SESSION["utente"]["Nome"];
    $cognome = $_SESSION["utente"]["Cognome"];
    $dipendente_id = $_SESSION["utente"]["ID"];
    // header('Location: ./home.php');
} else {
    $utente_autenticato = false;
    // echo "<p>Wrong credentials!</p>";
    session_abort();
    sleep(3);
    header('Location: ./index.php');
}
