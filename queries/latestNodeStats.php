<?php
    //For DB connection
    require_once "../phpHeader.php";

    //Get the username from the session
    $user = $_SESSION['user'];
    
    // echo $user;

    //Performs a get for the specified node
    $node = $_GET['nodeID'];

    //Query to get data for the logged in user
    $sql = "SELECT d1.* FROM data d1
            INNER JOIN (SELECT data.nodeid, MAX(record) as rid, MAX(timestamp) as ts 
                FROM data, nodes, users WHERE users.email = '$user' 
                AND users.id = nodes.userid
                AND nodes.nodeID = data.nodeid GROUP BY nodeid) d2
            ON (d1.nodeid = d2.nodeid AND d1.timestamp = d2.ts)";
    
    //Print the json so it can be used with a ajax call
    connectToDb();
    echo jsonQuery($sql);
    closeConnectToDb();
?>