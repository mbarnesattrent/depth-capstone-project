<?php
    //For DB connection
    require_once "../phpHeader.php";

    //Get the username from the session
    $user = $_SESSION['user'];

    //Use for testing
    //Pass a byDate with a flag of 1 to trigger this

if ($_GET['nodeID']){
        $node = "AND nodes.nodeID = " . $_GET['nodeID'];
    }
    else{
        $node = "";
    }

        //Query to get data for the logged in user
        $sql = "SELECT DATE(timestamp) as date, AVG(waterTemp) AS Temp, 'Water' AS Type
            FROM data, nodes, users 
            WHERE users.email = '$user' 
            AND users.id = nodes.userid
            AND nodes.nodeID = data.nodeid $node
            GROUP BY DATE(timestamp)
            UNION ALL
            SELECT DATE(timestamp) as date, AVG(airTemp) AS Temp, 'Air' AS Type
            FROM data, nodes, users 
            WHERE users.email = '$user' 
            AND users.id = nodes.userid
            AND nodes.nodeID = data.nodeid $node
            GROUP BY DATE(timestamp)";
    
    
    
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