<?php
session_start();
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("final");
    
    $sql = "SELECT * FROM `table` WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>