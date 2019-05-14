<?php
session_start();
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("final");
    
    $sql =  "SELECT `password` FROM `account` WHERE `username` = '" . $_POST['name'] . "'";
    echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($records == false){
        echo json_encode("Not an account in database. Create an account.");
    }
    else{
        
        if(password_verify($_POST['pass'], $records['password'])){
            $_SESSION['user'] = $_POST['name'];
            echo json_encode($_POST['name']);
        }
        else{
            echo json_encode("Password incorrect.");
        }
    }
?>
