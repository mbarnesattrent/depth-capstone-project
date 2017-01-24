<?php
  require 'phpHeader.php';  //must happen first if php is being used, also includes functions.php
  
  $error = $user = $pass = "";
  $panelclass = 'panel-success';
  if (isset($_POST['user']))
  {
    connectToDb();

    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
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
    <div class='main container-fluid'>
      <div class='row'>
        <div class='col-xs-6 col-sm-4 col-sm-offset-4'>
          <div class='panel <?php echo "$panelclass" ?>'>
            <div class="panel-heading">
              <h3 class="panel-title">Please enter your details to log in</h3>
            </div>
            <div class="panel-body">
              <form method='post' action='login.php'> <?php $error ?>
                <span class='fieldname'>Username</span><input type='text'
                  maxlength='32' name='user'><br>
                <span class='fieldname'>Password</span><input type='password'
                  maxlength='32' name='pass'>
                <span class='fieldname'>&nbsp;</span>
                <input type='submit' value='Login'>
              </form>
            </div>
          </div>
        </div>
      <div>
    </div>
  </body>
</html>