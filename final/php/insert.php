<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("final");
    
    $sql = "INSERT INTO `table`(`username`, `date`, `start_time`, `duration`, `booked`) VALUES ('" . $_POST['user'] . "', '" . $_POST['date'] . "', '" . $_POST['start'] . "', '" . $_POST['duration'] . "', '" . $_POST['booked'] . "')";
    // echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>
