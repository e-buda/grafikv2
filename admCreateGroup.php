<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
    header("Location: login.php");
    exit;
}
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true) {
    header("Location: index.php");
    exit;
}
if ($_GET) {
    require_once "config.php";
    $conn = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die('Błąd bazy:' . $conn->connect_error);
    }
    $conn->query("INSERT into grupyZawodowe (Etykieta) values ('".$_GET['name']."')");
    $conn->close();
    echo "Dodano";
}
