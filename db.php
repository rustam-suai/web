<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "karandash";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("ОШИБКА Соединение с БД не установлено: " . mysqli_connect_error());
}
?>