<?php
session_start();
if(isset($_POST["id"])&&$_POST["id"]!=""){
    $id  = $_POST["id"];
}

$data = array(
    'role' => $_SESSION["role"],
    'id' => $id
);
$url = "http://localhost:8080/spring-mvc-demo-2020/api/tasks/disapproval";
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
