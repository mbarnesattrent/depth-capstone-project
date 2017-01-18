 <?php
  require 'header.php';
  echo "<div class='main'><h3>Please enter your details to log in</h3>";
  $error = $user = $pass = "";
  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else {
      $result = queryMySQL("SELECT email, password FROM users
        WHERE email='$user' AND password='$pass'");
      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      } else {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;

        $test = $_SESSION['user'];
        echo "test:".$test;
        print_r($_SESSION); 

        die("You are now logged in. Please <a href='members.php?view=$user'>" .
            "click here</a> to continue.<br><br>");
      }
    }
  }
  echo <<<_END
    <form method='post' action='login.php'>$error
    <span class='fieldname'>Username</span><input type='text'
      maxlength='32' name='user' value='$user'><br>
    <span class='fieldname'>Password</span><input type='password'
      maxlength='32' name='pass' value='$pass'>
_END;
?>
    <br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login'>
    </form><br></div>
  </body>
</html>