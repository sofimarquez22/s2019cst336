<?php
  session_start();

  $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

  switch($httpMethod) {
    case "OPTIONS":
      onOptions();
      exit();
    case "GET":
      onGet();
      break;
    case 'POST':
      onPost();
      break;
    case 'PUT':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'DELETE':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      break;
  }

  function onOptions() {
    // Allows anyone to hit your API, not just this c9 domain
    header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Max-Age: 3600");
  }

  function onGet() {
    // Allow any client to access
    header("Access-Control-Allow-Origin: *");
    // Let the client know the format of the data being returned
    header("Content-Type: application/json");

    // TODO: do stuff to get the $results which is an associative array
    $results = array();
    array_push($results, "something");

    // Sending back down as JSON
    echo json_encode($results);
  }

  function onPost() {
    // Get the body json that was sent
    $rawJsonString = file_get_contents("php://input");

    //var_dump($rawJsonString);
    $messages = array();
    
    
    $username = $_POST["username"];
    
    $password = $_POST["password"];
    
    $isValid = true;
    
    //checks if username is inserted"
    if($username === "")
    {
       $isValid = false;
      $messages["error"]="username required";
    }
    // checks if password slots are empty
    else if($password[1] === ""  || $password[0] === "")
    {
      $isValid = false;
      $messages["error"]="require to type password and confirm password";
    }
    //requires password to be filled
    else if($password[0]==="" )
    {
       $isValid = false;
      $messages["error"]= "password required";
    }
    //checks if password and confirmed password match
    else if($password[1] != $password[0])
    {
       $isValid = false;
      $messages["error"]= "password does not match";
    }
    //checks if username is within password
    if(strpos($password[0], $username) === false)
    {
       $isValid = false;
      $messages["error"] = "works";
    }
    else
    {
       $isValid = false;
      $messages["error"] = "username is inside password";
    }

    
    // checks if username has been used
    foreach($_SESSION as $name => $pass){
      if($username === $name)
      {
        $isValid = false;
        $messages["message"] = "used";
      }
    }
    
    if($isValid)
    {
      $_SESSION[$username] = $password[0];
      $messages["message"] = "Success";
    }
    // Make it a associative array (true, second param)
    $jsonData = json_decode($rawJsonString, true);

    // TODO: do stuff to get the $results which is an associative array
    // $results = array();

    // Allow any client to access
    header("Access-Control-Allow-Origin: *");
    // Let the client know the format of the data being returned
    header("Content-Type: application/json");

    // Sending back down as JSON
    echo json_encode($messages);
  }
?>