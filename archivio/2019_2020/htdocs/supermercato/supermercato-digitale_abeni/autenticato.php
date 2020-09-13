<?php
if (isset($_SESSION["utente"]))
{
    $utente_autenticato = true;
    $id = $_SESSION["utente"]["id"];
    $nome = $_SESSION["utente"]["nome"];
    $cognome = $_SESSION["utente"]["cognome"];
}
else
    $utente_autenticato = false;