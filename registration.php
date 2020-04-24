<?php
if (isset($_GET["username"]) && isset($_GET["password"])){
    $username = $_GET["username"];
    $password = $_GET["password"];
    $conn = new mysqli("localhost", "khorning2", "khorning2");
    
    if ($conn->connect_error){ 
        die("Connection failed: " . $conn->connect_error);
    }
    
    $conn->query("USE khorning2");
    
    $result = $conn->query('INSERT INTO users (username, password) VALUES ("' . $username . '", "' . $password . '");');

    if ($result){
        echo json_encode(1);
    }
    else {
        echo json_encode(0);
    }
}
else
    echo "Error: username and password not sent";

?>