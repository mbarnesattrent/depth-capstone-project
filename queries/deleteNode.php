<?php
    //For DB connection
    require "../phpHeader.php";

    connectToDb();

    //Performs a get for the specified node
    $node = $_GET['nodeID'];
    if ($node){
        $sql = "UPDATE nodes 
             SET userID = 0 WHERE nodeID=$node";
    
        jsonQuery($sql);

        echo "Successfully added node for $user";
    }
    else{
        echo "Error, you must pass a nodeID by using ?nodeID=xxxx";
    }
    
    closeConnectToDb();
?>