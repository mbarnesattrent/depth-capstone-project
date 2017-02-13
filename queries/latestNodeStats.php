<?php
    //For DB connection
    require_once "../phpHeader.php";

    //Get the username from the session
    $user = $_SESSION['user'];
    
    // echo $user;

    //Performs a get for the specified node
    $node = $_GET['nodeID'];

    //Use for testing
    // $user = "dexterfichuk@gmail.com";

    //Query to get data for the logged in user
    $sql = "SELECT r.*
        FROM data r, nodes, users
        WHERE users.email =  '$user'
        AND users.id = nodes.userid
        AND nodes.nodeID = r.nodeid
        AND timestamp = (SELECT MAX(timestamp) FROM data d WHERE r.nodeid = d.nodeid)
        GROUP BY r.nodeid";
    
    //Print the json so it can be used with a ajax call
    connectToDb();
    
    echo csvQuery($sql);
    closeConnectToDb();
?>