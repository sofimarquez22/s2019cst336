<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("final");
    
    $sql = "SELECT * FROM `table` WHERE `id` = " . $_GET["id"] . "";
    // echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>