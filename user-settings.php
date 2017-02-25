<?php  
  $error = $user = $pass = "";
  $panelclass = 'panel-success';
  if (isset($_POST['user']))
  {
    connectToDb();

    $user = $_SESSION['user'];
    // $pass = sanitizeString($_POST['pass']);
    if ($user == "" || $pass == "") {
        $error = "Not all fields were entered<br>";
        $panelclass = 'panel-danger';
    } else {
      $result = queryMySQL("SELECT email, password FROM users
        WHERE email='$user' AND password='$pass'");
      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
        $panelclass = 'panel-danger';

      } else {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        
        header('Location: index.php');
        //header('Location: members.php?=$user');
        die();
      }
    }
  }

  require 'headerhtml.php'; //includes document header, and state depending on $loggedin variable
?>
<?php
    //For DB connection
    // require 'phpHeader.php';

    require "../phpHeader.php";    

    //Get the username from the session
    $user = $_SESSION['user'];
    //Use for testing
    // $user = "dexterfichuk@gmail.com";

    //Query to get data for the logged in user
    $sql = "SELECT nodes.* 
        FROM nodes, users 
        WHERE users.email = '$user'
        AND users.id = nodes.userid";
    
    //Print the json so it can be used with a ajax call
    connectToDb();
    echo jsonQuery($sql);
    closeConnectToDb();
?>