<?php //functions.php
  require_once 'creds.php';
  
  $appname = "depth";

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
    global $connection;

    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();

    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    // echo json_encode($emparray);
    return json_encode($emparray);
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