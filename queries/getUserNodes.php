<?php
    //For DB connection
    require_once "../functions/functions.php";

    //Get the username from the session
    $user = $_SESSION['username'];

    //Use for testing
    // $user = "dexterfichuk@gmail.com";

    //Query to get data for the logged in user
    $sql = "SELECT nodes.* 
        FROM nodes, users 
        WHERE users.email = '$user' 
        AND users.id = nodes.userid";
    
    //Print the json so it can be used with a ajax call
    echo jsonQuery($sql);
?>