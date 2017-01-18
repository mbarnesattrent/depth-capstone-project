<?php
  require 'phpHeader.php';
  
  $error = $user = $pass = "";
  if (isset($_POST['user']))
  {
    connectToDb();

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

        header('Location: members.php?=$user');
        die();
      }
    }
  }
    require 'headerhtml.php';
?>

  <div class='main'><h3>Please enter your details to log in</h3>
    <form method='post' action='login.php'> <?php $error ?>
    <span class='fieldname'>Username</span><input type='text'
      maxlength='32' name='user'><br>
    <span class='fieldname'>Password</span><input type='password'
      maxlength='32' name='pass'>
    <br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login'>
    </form>
    <br>
  </div>
  </body>
</html>