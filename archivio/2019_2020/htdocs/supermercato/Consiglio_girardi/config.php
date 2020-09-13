<?php
ini_set('display_errors', 1);
ini_set('log_errors', 0);

$host = 'localhost';
$db = 'supermercato'; // db name
$user = 'root';
$pass = ''; // put you pwd here :D
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

//Questa istruzione indica al server di istanziare una
//sessione o di continuare con una già presente,
//senza di questa non funzionerebbe niente
//Attenzione che nel file php.ini il percorso dove sono salvate le sessioni
//sia corretto, nel mio caso ho dovuto metterlo a posto a mano in questo modo
//session.save_path = "F:\xampp_7_4_1\tmp"
