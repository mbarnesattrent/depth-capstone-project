<?php //functions.php
  require_once 'creds.php';
  $appname = "depth";
  $csvString = '';

  function connectToDb() {
    global $connection, $dbhost, $dbuser, $dbpass, $dbname;
    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($connection->connect_error) die($connection->connect_error);
  }

  function closeConnectToDb() {
    global $connection;
    mysqli_close($connection);
  }

  function jsonQuery($sql){
    // connectToDb();

    global $connection;

    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();

    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    // echo json_encode($emparray);

    // closeConnectToDb();

    return json_encode($emparray);
  }

  function csvQuery($sql){
    // connectToDb();

    global $connection;

    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    $emparray = array();
    
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }

      return to_csv($emparray);
  }

  function to_csv( $array ) {
    $csv;

    ## Grab the first element to build the header
    $arr = array_pop( $array );
    $temp = array();
    foreach( $arr as $key => $data ) {
      $temp[] = $key;
    }
    $csv = implode( ',', $temp ) . "\n";

    ## Add the data from the first element
    $csv .= to_csv_line( $arr );

    ## Add the data for the rest
    foreach( $array as $arr ) {   
      $csv .= to_csv_line( $arr );
    }

    return $csv;
}

  function to_csv_line( $array ) {
    $temp = array();
    foreach( $array as $elt ) {
      $temp[] = '"' . addslashes( $elt ) . '"';
    }

    $string = implode( ',', $temp ) . "\n";

    return $string;
}


  function arrayQuery($sql){
    // connectToDb();

    global $connection;

    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();

    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    // echo json_encode($emparray);

    // closeConnectToDb();

    return $emparray;
  }


  function createTable($name, $query) //createsTable if it does not exist.
  {
      queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
      echo "Table '$name' created or already exists.<br>";
  }
  
  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time()-2592000, '/');
    session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);

  }

  function showProfile($user)
  {
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";
    
    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
    
    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  }
?>