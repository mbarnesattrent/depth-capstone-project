<?php
  require_once 'phpHeader.php';
  require_once 'headerhtml.php';
  echo <<<_END
    <script>
      function checkUser(user)
      {
        if (user.value == '')
        {
          O('info').innerHTML = ''
return }
        params  = "user=" + user.value
        request = new ajaxRequest()
        request.open("POST", "functions/checkuser.php", true)
        request.setRequestHeader("Content-type",
          "application/x-www-form-urlencoded")
        request.setRequestHeader("Content-length", params.length)
        request.setRequestHeader("Connection", "close")
        request.onreadystatechange = function()
        {
          if (this.readyState == 4)
            if (this.status == 200)
              if (this.responseText != null)
                O('info').innerHTML = this.responseText
}
        request.send(params)
      }
      function ajaxRequest()
      {
        try { var request = new XMLHttpRequest() }
        catch(e1) {
          try { request = new ActiveXObject("Msxml2.XMLHTTP") }
          catch(e2) {
            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
            catch(e3) {
request = false }} }
        return request
      }
</script>
    <div class='main'><h3>Please enter your details to sign up</h3>
_END;

  $error = $user = $pass = "";
  if (isset($_SESSION['user'])) destroySession();
  if (isset($_POST['user']))
  {
    connectToDb();


    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = "Not all fields were entered<br><br>";
    else {
      $result = queryMysql("SELECT * FROM users WHERE email='$user'");
      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else {
        queryMysql("INSERT INTO users VALUES('', '$user', '$pass', '')");
        die("<h4>Account created</h4>Please Log in.<br><br>");
      }
    }
  }
  echo <<<_END
    <div class='main container-fluid'>
      <div class='row'>
        <div class='col-xs-6 col-sm-4 col-sm-offset-4'>
          <div class='panel panel-success'>
            <div class="panel-heading">
              <h3 class="panel-title">Please enter your details to sign up</h3>
            </div>
            <div class="panel-body">
              <div class="u-padding-bottom">
                <form method='post' action='signup.php'>$error
                  <span class='fieldname col-xs-4'>Username </span><input class='col-xs-8' type='text'
                    maxlength='32' name='user' value='$user'>
                  <span class='fieldname col-xs-4'>Password </span><input class='col-xs-8'type='password'
                    maxlength='32' name='pass' value='$pass'>
                  <span class='fieldname'>&nbsp;</span>
                  <input class='center-block' type='submit' value='Sign up'>
                </form>
              </div>
              <a href='login.php'>Already have an account? Login!</a>
            </div>
          </div>
        </div>
      <div>
    </div>

_END;
?>
    </form></div><br>
  </body>
</html>