<?php

$user = $_SESSION['user'];
 connectToDb();
 $result = queryMySQL("SELECT email, firstn, lastn, dob, displayn, avatar, phone FROM accountPre
        WHERE email='$user'");
  // print_r($result);
  $row = mysqli_fetch_row($result);
  // echo "<br>$result->num_rows<br>";
  // print_r($row);
  //echo "username = $row[0]"
?>
<div class='main container-fluid '>
      <div class='row'>
        <div class='col-xs-8 col-sm-offset-2'>
          <div class="well">
            <div class='h3'>
              <div class='col-md-6'><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Account Settings</div>
              </div>

<br>


              <hr>



              <!--Show account Settings-->
              <dl class="dl-horizontal">
                <dt>Display Name</dt>
                <dd><?php echo "@$row[4]"; ?></dd>
                <dt>First Name</dt>
                <dd><?php echo "$row[1]"; ?></dd>
                <dt>Last Name</dt>
                <dd><?php echo "$row[2]"; ?></dd>
                <dt>Date of Birth</dt>
                <dd><?php echo "$row[3]"; ?></dd>
                <dt>Email Address</dt>
                <dd><?php echo "$row[0]"; ?></dd>
                <dt>Phone Number</dt>
                <dd><?php echo "$row[6]"; ?></dd>
                <dt>Avatar</dt>
                <dd><span class="glyphicon glyphicon-user" aria-hidden="true" style= "color:<?php echo "$row[5]" ?>"></span></dd>



              </dl>
                  <!-- Button trigger modal -->

                  <!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Account Settings</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">

<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Account Setting
</button>

<!-- Modal -->
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Account Settings</h4>
      </div>
      <div class="modal-body">
        

        <!-- Inside Medal form Starts- To update the settings--> 



                    <div class="form-group">
              <label for="example-text-input"  class="col-2 col-form-label">Text</label>
              <div class="col-10">
                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input" >
              </div>
            </div>
            <div class="form-group">
              <label for="example-search-input" class="col-2 col-form-label">Search</label>
              <div class="col-10">
                <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-email-input" class="col-2 col-form-label">Email</label>
              <div class="col-10">
                <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-url-input" class="col-2 col-form-label">URL</label>
              <div class="col-10">
                <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
              <div class="col-10">
                <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-password-input" class="col-2 col-form-label">Password</label>
              <div class="col-10">
                <input class="form-control" type="password" value="hunter2" id="example-password-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-number-input" class="col-2 col-form-label">Number</label>
              <div class="col-10">
                <input class="form-control" type="number" value="42" id="example-number-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
              <div class="col-10">
                <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-date-input" class="col-2 col-form-label">Date</label>
              <div class="col-10">
                <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-month-input" class="col-2 col-form-label">Month</label>
              <div class="col-10">
                <input class="form-control" type="month" value="2011-08" id="example-month-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-week-input" class="col-2 col-form-label">Week</label>
              <div class="col-10">
                <input class="form-control" type="week" value="2011-W33" id="example-week-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-time-input" class="col-2 col-form-label">Time</label>
              <div class="col-10">
                <input class="form-control" type="time" value="13:45:00" id="example-time-input">
              </div>
            </div>
            <div class="form-group">
              <label for="example-color-input" class="col-2 col-form-label">Color</label>
              <div class="col-10">
                <input class="form-control" type="color" value="#563d7c" id="example-color-input">
              </div>
            </div>


        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>      

    </div>
  </div>
</div>
        
  </div>


          








<!--               <form method='post' action='../../user-settings.php'> <?php $error ?>

                <span class='fieldname'>User</span><input type='text'
                  maxlength='32' name='user'><br>
                <span class='fieldname'>Pass</span><input type='text'
                  maxlength='32' name='password'>
                <span class='fieldname'>&nbsp;</span>
                <input type='submit' value='Test'>
              </form> -->
            </div>
          </div>
        </div>
      <div>
    </div>
  </body>
</html>