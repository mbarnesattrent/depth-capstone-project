<?php
    //For DB connection
    require_once "../phpHeader.php";

    //Get the username from the session
    $user = $_SESSION['user'];

    //Use for testing
    //Pass a byDate with a flag of 1 to trigger this
    echo "<img src='http://www.animatedimages.org/data/media/694/animated-submarine-image-0006.gif' border='0' alt='animated-submarine-image-0006'/><br>";
    echo "Node simulator started!<br>";
    
    $tempmin=22;
    $tempmax=25;
    $humiditymin = 16;
    $humiditymax = 19;

    // Used for generating days between NOW()-rand between range
    $dayMin = 0;
    $dayMax = 5;

    if ($_GET['nodeID'] && $_GET['iterations']) {
        $node = $_GET['nodeID'];
        $iter = $_GET['iterations'];
        $times = 0;
        $actualIts = $_GET['iterations'];
        connectToDb();

        while ($iter){
            
            $airtemp = rand(($tempmin+2)*100,($tempmax+2)*100)/100;
            $watertemp = rand($tempmin*100,$tempmax*100)/100;
            $humidity = rand($humiditymin,$humiditymax);
            $pH = rand(650,740)/100;
            $times++;
            $daySubtract = rand($dayMin, $dayMax);

            echo "Writing record $times/$actualIts <br>";
            echo "Values: ID: $node, WaterTemp: $watertemp, AirTemp: $airtemp, Humidty: $humidity, pH: $pH<br>";

            $sql = "INSERT INTO  `depth`.`data` (
            `record` , `nodeid` , `waterTemp` , `airTemp` , `airHumidity` , `pH` , 
            `turbidity` , `conductivity` , `gpsLatitude` , `gpsLongitude` , `timestamp`)
            VALUES (NULL ,  '$node',  '$watertemp',  '$airtemp',  '$humidity',  '$pH',  '0',  '0',  '0',  '0', CURRENT_TIMESTAMP - INTERVAL $daySubtract DAY)";

            csvQuery($sql);
            $iter--;
        }

        echo "Done writing records!<br>";

        closeConnectToDb();
    
    }
    else{
        echo "Sorry, you must append a ?nodeID=xxxx&iterations=xxxx to the end of the URL<br>";
    }

?>