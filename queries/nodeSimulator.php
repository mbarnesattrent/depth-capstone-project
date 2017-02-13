<?php
    //For DB connection
    require_once "../phpHeader.php";

    //Get the username from the session
    $user = $_SESSION['user'];

    //Use for testing
    //Pass a byDate with a flag of 1 to trigger this
    echo "Node simulator started!";
    
    $tempmin=22;
    $tempmax=26;
    $humiditymin = 16;
    $humiditymax = 19;

    if ($_GET['nodeID'] && $_GET['iterations']) {
        $node = $_GET['nodeID'];
        $iter = $_GET['iterations'];

        connectToDb();

        while ($iter){
            
            $airtemp = rand($tempmin*100,$tempmax*100)/100;
            $watertemp = rand($tempmin*100,$tempmax*100)/100;
            $humidity = rand($humiditymin,$humiditymax);
            $pH = rand(500,800)/100;

            echo "Writing record $iter";
            $sql = "INSERT INTO  `depth`.`data` (
            `record` , `nodeid` , `waterTemp` , `airTemp` , `airHumidity` , `pH` , 
            `turbidity` , `conductivity` , `gpsLatitude` , `gpsLongitude` , `timestamp`)
            VALUES (NULL ,  '$node',  '$watertemp',  '$airtemp',  '$humidity',  '$pH',  '0',  '0',  '0',  '0', CURRENT_TIMESTAMP)";

            csvQuery($sql);
            $iter--;
        }

        echo "Done writing records!";

        closeConnectToDb();
    
    }
    else{
        echo "Sorry, you must append a ?nodeID=xxxx&iterations=xxxx to the end of the URL";
    }

?>