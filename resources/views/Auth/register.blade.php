@extends('navbar')

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- <title>Jobs Status System</title> -->

        <!--CSS-->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet"/>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


        <!-- JS files -->
        <!-- <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    <body>

        <div class="register">

        <div class="message" id="reg">
          <div class="alert alert-success" id="reg-ok" style="display:none">
            <strong>Success!</strong> Your account is sucessfully created!
          </div>


          <div class="alert alert-warning" id="reg-war" style="display:none" role="alert">
            <strong>Warning!</strong> Your username was already taken.
          </div>


          <div class="alert alert-danger" id="reg-no" style="display:none">
            <strong>Ooops!</strong> Your username/password is not valid.
          </div>
        </div>

          <h2>Register</h2>

        <form method="post" action="/api/register">
          {{ csrf_field() }}
          <div class="register-form">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" id="firstname" name="first_name"></input>
            </div>

            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" id="lastname" name="last_name"></input>
            </div>

            <div class="form-group">
              <label>User Name</label>
              <input type="text" class="form-control" id="username" name="user_name"></input>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password"></input>
            </div>

            <button type="submit" class="btn btn-primary" id="registerSubmit">Submit</button>
        </div>
      </form>
   </div>






        <!-- External JS file -->

  </body>

  <!-- Modal content-->
<!-- <div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Sucessful!</h4>
    </div>
    <div class="modal-body">
      <p>You are sucessfully registered. Now we will redirect you to the login page after you click 'close'.</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div> -->

</html>
