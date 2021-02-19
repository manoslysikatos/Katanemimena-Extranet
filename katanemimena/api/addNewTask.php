<?php
session_start();
if(isset($_POST["candidate"])&&$_POST["candidate"]!=""){
    $candidate  = $_POST["candidate"];
}

if(isset($_POST["type"])&&$_POST["type"]!=""){
    $type  = $_POST["type"];
}
if(isset($_POST["description"])){
    $description  = $_POST["description"];
}


if($_SESSION['role'] == "ROLE_SUPER"){
    $data = array(
        'type' => $type,
        'description' => $description,
        'supervisor' => $_SESSION['id'],
        'candidate' => $candidate
    );
}else{
    echo "No Privileges for that action";
}
$url = "http://localhost:8080/spring-mvc-demo-2020/api/add-new-task";
$options = array(
    'http' => array(
      'method'  => 'POST',
      'content' => json_encode( $data ),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
  );
  
  $context  = stream_context_create( $options );
  $result = file_get_contents( $url, false, $context );
  
  $response = json_decode($result);
 
  echo $result;

?>
