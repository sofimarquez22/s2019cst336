<?php
include '../dbConnection.php';

$conn = getDatabaseConnection("poll");
$opt = $_GET["option"];
$sql = "UPDATE `poll_response` SET . "$opt". = . "$opt + 1" Where 1;

$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

?>