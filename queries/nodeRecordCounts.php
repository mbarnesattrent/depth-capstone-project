<?php
    //For DB connection
    require_once "../phpHeader.php";

    //Get the username from the session
    $user = $_SESSION['user'];

    //Use for testing
    // $user = "dexterfichuk@gmail.com";

    //Query to get data for the logged in user
    $sql = "SELECT data.nodeid AS node, COUNT(*) AS `Record Count`
        FROM data, nodes, users 
        WHERE users.email = '$user' 
        AND users.id = nodes.userid
        AND nodes.nodeID = data.nodeid
        GROUP BY data.nodeid";
    
    //Print the json so it can be used with a ajax call
    connectToDb();
    // header('Content-Type: text/csv');
    // header('Content-Disposition: attachment; filename="export.csv"');
    // header('Pragma: no-cache');
    // header('Expires: 0');

    echo csvQuery($sql);
    // echo $result;

    closeConnectToDb();
?>