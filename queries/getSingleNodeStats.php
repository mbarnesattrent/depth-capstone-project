<?php
    //For DB connection
    require "../phpHeader.php";

    //Get the username from the session
    $user = $_SESSION['user'];
    
    // echo $user;

    //Performs a get for the specified node
    $node = $_GET['nodeID'];

    //Use for testing
    // $user = "dexterfichuk@gmail.com";

    //Query to get data for the logged in user
    $sql = "SELECT data.* 
        FROM data, nodes, users 
        WHERE users.email = '$user' 
        AND users.id = nodes.userid
        AND nodes.nodeID = data.nodeid
        AND data.nodeid = '$node'";
    
    //Print the json so it can be used with a ajax call
    connectToDb();
    echo jsonQuery($sql);
    closeConnectToDb();
?>