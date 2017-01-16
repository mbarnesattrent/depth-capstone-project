<?php

function query($sql){
$servername = "159.203.4.227";
$username = "arduino";
$password = "theminnesotansarecoming!";
$dbname = "depth";

//open connection to mysql db
    $connection = mysqli_connect($servername,$username,$password,$dbname) or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    //$sql = "select * from Profile";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    // echo json_encode($emparray);

    //close the db connection
    mysqli_close($connection);

    return json_encode($emparray);
}
?>
