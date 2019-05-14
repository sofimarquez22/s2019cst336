<?php

include 'dbConnection.php';

function filterUploadedFile(){
  $allowedTypes = array("text/plain","image/png");
  $allowedExtensions = array("txt", "png");
  $allowedSize = 1000;
  $filterError = "";
  if (!in_array($_FILES["fileName"]["type"],  $allowedTypes ) ) {
        $filterError = "Invalid type. <br>";
   }

  $fileName = $_FILES["fileName"]["name"];
   if (!in_array(substr($fileName,strrpos($fileName,".")+1), $allowedExtensions) ) {
       $filterError = "Invalid extension. <br>";
    }

   if ($_FILES["fileName"]["size"]  > $allowedSize  ) {
        $filterError .= "File size too big. <br>";
    }
    return $filterError;
}
function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    
    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}

if(isset($_POST['uploadForm'])){
    $file_ary = reArrayFiles($_FILES['fileName']);
    foreach ($file_ary as $file) {
        if ($_FILES["fileName"]["error"] > 0) {
            echo "Error: " . $_FILES["fileName"]["error"] . "<br>";
        }
        else {
            echo "Upload: " . $_FILES["fileName"]["name"] . "<br>";
            echo "Type: " . $_FILES["fileName"]["type"] . "<br>";
            echo "Size: " . ($_FILES["fileName"]["size"] / 1024) . " KB<br>";
            echo "Stored in: " . $_FILES["fileName"]["tmp_name"];
            $binaryData = file_get_contents($_FILES["fileName"]["tmp_name"]);
            $sql = "INSERT INTO up_files (fileName, fileType, fileData ) " . "  VALUES (:fileName, :fileType, :fileData) ";
            $stm=$dbConn->prepare($sql);
            $stm->execute(array (":fileName"=>$_FILES["fileName"]["name"], ":fileType"=>$_FILES["fileName"]["type"], ":fileData"=>$binaryData));
            echo "<br />File saved into database <br /><br />"; 
        }  
    }//end empty($filterError)
} //endIf form submission
?>

<!--<form method="POST" enctype="multipart/form-data">-->
<!--  Select file: <input type="file" name="fileName" /> <br />-->
<!--  <input type="submit"  name="uploadForm" value="Upload File" />-->
<!--</form>-->
