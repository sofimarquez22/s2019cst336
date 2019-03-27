<?php

include '../dbConnection.php';
$conn = getDatabaseConnection('ottermart');

$productId = $_GET['productId'];
$sql = "SELECT * FROM om_product NATURAL JOIN om_purchase WHERE productId = :pId";
    
$np = array(); //named parameters to prevent SQL injection
$np[':pId'] = $productId;

$stmt = $conn->prepare($sql); //send that SQL to the database
$stmt->execute($np);//execute the sql
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($records);
?>