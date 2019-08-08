@extends('navbar')

        <div class="register">
          <h2>Login</h2>

          <form method="post" action="/api/login">
            {{ csrf_field() }}
          <div class="register-form">
            <div class="form-group">
              <label>User Name</label>
              <input type="text" class="form-control" id="LoginUsername" name="user_name"></input>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="LoginPassword" name="password"></input>
            </div>


          <div class="but-form">
            <!-- <a href="{{ route('register') }}"> -->
            <!-- <button type="button" class="btn btn-primary" id="loginPageBtn">Register</button></a> -->
            <a><button type="submit" class="btn btn-primary" id="loginBtnSubmit">Submit</button></a>
          </div>
        </div>

      </form>
    </div>
