<?php

include 'dbConnection.php';

$conn = getDatabaseConnection('quizLab');

$email = $_GET["email"];
$points = $_GET["points"];

$sql = "SELECT * FROM quiz WHERE email= '" . $email . "'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($records === false){
    $sql = "INSERT INTO `quiz` VALUES ('" . $email . "'," . $points . ", 0)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
else{
    $sql = "UPDATE `quiz` SET `score`=" . $points . ",`taken`= `taken` +1 WHERE email= '" . $email . "'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
$sql = "SELECT * FROM quiz WHERE email= '" . $email . "'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($records);




//receive email and score from the quiz

//1. Get latest score based on email
//2. If record found, first display it in JSON format, then update record
//3. If record not found, insert a new record for that email


?>