<?php
include "./connect.php";

$db = getDBConnection();

$query = "select * from mp_product"; //select everything from table mp_product
    $statement = $db -> prepare($query);
    $statement -> execute();
        
    $records = $statement -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>