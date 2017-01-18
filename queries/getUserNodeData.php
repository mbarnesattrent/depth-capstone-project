<?php
    //For DB connection
    require_once "../functions/functions.php";

    //Get the username from the session
    $user = $_SESSION['username'];

    //Use for testing
    // $user = "dexterfichuk@gmail.com";

    //Query to get data for the logged in user
    $sql = "SELECT data.* 
        FROM data, nodes, users 
        WHERE users.email = '$user' 
        AND users.id = nodes.userid
        AND nodes.nodeID = data.nodeid";
    
    //Print the json so it can be used with a ajax call
    echo jsonQuery($sql);
?>