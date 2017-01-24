<?php
    //For DB connection
    require_once "../phpHeader.php";

    connectToDb();

    //Get the username from the session
    $user = $_SESSION['user'];

    //Performs a get for the specified node
    $node = $_GET['nodeID'];
    if ($node){
        $sql = "UPDATE nodes 
             SET userID = (SELECT id FROM users WHERE email = '$user') WHERE nodeID=$node";
    
        jsonQuery($sql);

        echo "Successfully added node for $user";
    }
    else{
        echo "Error, you must pass a nodeID by using ?nodeID=xxxx";
    }
    
    closeConnectToDb();
?>