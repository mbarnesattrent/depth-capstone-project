<?php
    //For DB connection
    require "../phpHeader.php";

    connectToDb();

    //Get the username from the session
    $user = $_SESSION['user'];

    //Performs a get for the specified node
    $node = $_GET['nodeID'];
    if ($node){

        $sql = "SELECT MAX(timestamp) as updated FROM data WHERE nodeid = $node";
    
        $lastUpdated = arrayQuery($sql);

        $tsql = "SELECT DISTINCT typeID as type FROM nodes WHERE nodeID = $node";
    
        $type = arrayQuery($tsql);

        $nodeinfo = array($lastUpdated[0], $type[0]);

        echo json_encode($nodeinfo);

    }
    else{
        echo "Error, you must pass a nodeID by using ?nodeID=xxxx";
    }
    
    closeConnectToDb();
?>