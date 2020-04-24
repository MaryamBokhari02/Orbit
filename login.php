<?php
if (isset($_GET["username"]) && isset($_GET["password"])){
    $username = $_GET["username"];
    $password = $_GET["password"];
    $conn = new mysqli("localhost", "khorning2", "khorning2");
    
    if ($conn->connect_error){ 
        die("Connection failed: " . $conn->connect_error);
    }
    
    $conn->query("USE khorning2");
    
    $result = $conn->query('SELECT * FROM users WHERE username = "' . $username . '" AND password = "' . $password . '";');

    if (is_array($result->fetch_assoc())){
        echo json_encode(1);
    }
    else {
        echo json_encode(0);
    }

    /* to get all rows
    $enc;
    while($row = $result->fetch_assoc()){
        
        foreach($row as $cname => $cvalue){
            $j = json_encode("$cname: $cvalue\t");
            json_decode($j);
            if (json_last_error() == JSON_ERROR_NONE)
                echo $j;
            }
        }
    }
    */
}
else
    echo "Error: username and password not sent";

?>