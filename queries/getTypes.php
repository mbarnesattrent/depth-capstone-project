<?php
    //For DB connection
    require_once "../phpHeader.php";

    //Query to get data for the logged in user
    $sql = "SELECT * 
        FROM type";
    
    //Print the json so it can be used with a ajax call
    connectToDb();
    echo jsonQuery($sql);
    closeConnectToDb();
?>