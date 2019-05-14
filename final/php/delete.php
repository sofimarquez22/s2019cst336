<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("final");
    
    $sql = "DELETE FROM `table` WHERE id =" . $_POST["id"] . "";
    // echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>