<?php

include '../dbConnection.php';
$conn = getDatabaseConnection('ottermart');
$sql = 'SELECT catId, catName FROM om_category ORDER BY catName';
    //SELECT column_names_needed FROM table_where_values_are;
$stmt = $conn->prepare($sql); //send that SQL to the database
$stmt->execute();//execute the sql
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($records);
?>