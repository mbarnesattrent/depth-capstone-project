<?php
    //For DB connection
    require_once "../phpHeader.php";

    connectToDb();

    $user = $_SESSION['user'];
    //Performs a get for the specified node
    $node = $_GET['nodeID'];
    if ($node){
        $sql = "UPDATE nodes 
             SET userID = 0 WHERE nodeID=$node AND userID=(SELECT id FROM users WHERE email = '$user')";
    
        jsonQuery($sql);

        echo "Successfully removed node for $user";
    }
    else{
        echo "Error, you must pass a nodeID by using ?nodeID=xxxx";
    }
    
    closeConnectToDb();
?>