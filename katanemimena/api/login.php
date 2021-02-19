<?php
session_start();
if(isset($_POST["email"])&&$_POST["email"]!=""){
    $email  = $_POST["email"];
}

if(isset($_POST["password"])&&$_POST["password"]!=""){
    $password  = $_POST["password"];
}
$data = array(
    'email' => $email,
    'password' => $password
);
$url = "http://localhost:8080/spring-mvc-demo-2020/api/login";
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
  if($response->isValid){
    
    $_SESSION['id'] = $response->id;
    $_SESSION['role'] = $response->role;
    $_SESSION['firstName'] = $response->firstName;
    $_SESSION['lastName'] = $response->lastName;
    $_SESSION['isValid'] = 1;
  }
  echo $result;
?>
