<?php
  session_start();
  include 'dbConnection.php';
  $conn = getDatabaseConnection("final");

//   $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");
    
      // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");
    
      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);
    
      // Perform password validations
      
      // Was a password provided?
      if (empty($_POST["password"])) {
        echo json_encode(array(
          "isSignedUp" => false, 
          "message" => "No password provided"));
          
        exit;
      }

      if (empty($_POST["confirmation"])) {
        echo json_encode(array(
          "isSignedUp" => false, 
          "message" => "No password confirmation provided"));
          
        exit;
      }

      if ($_POST["password"] != $_POST["confirmation"]) {
        echo json_encode(array(
          "isSignedUp" => false, 
          "message" => "password does not equal confirmation"));
          
        exit;
      }
      
      // Hash my password!!!!!!
      $options = [
        'cost' => 11,
      ];

      $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

      try {
        $sql = "INSERT INTO `account` (`username`, `password`)  " .
               "VALUES (:user, :hashedPassword) ";
               
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array (
          ":user" => $_POST['user'],
          ":hashedPassword" => $hashedPassword));
        
        $_SESSION["user"] = $record["user"];
        $_SESSION["isAdmin"] = false;
  
        // Sending back down as JSON
        echo $sql;
        echo json_encode(array("isSignedUp" => true));
  
      } catch (PDOException $ex) {
        switch ($ex->getCode()) {
          case "23000":
            echo json_encode(array(
              "isSignedUp" => false, 
              "message"=> "user taken, try another",
              "details" => $ex->getMessage()));
            break;
          default:
            echo json_encode(array(
              "isSignedUp" => false, 
              "message"=> $ex->getMessage(),
              "details" => $ex->getMessage()));
            break;
        }
        exit;
      }
?>