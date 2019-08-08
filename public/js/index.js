$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Hide modal for registration
// $('#RegModal').modal('hide');


// Login form Ajax post
$('#loginBtnSubmit').click(function(e){
    e.preventDefault();

    console.log("login button wokrs");
    var un = $('#LoginUsername').val();
    console.log(un);
    var pw = $('#LoginPassword').val();
    console.log(pw);

    $.ajax({
        url: 'http://homestead.test/api/login',
        type: 'post',
        dataType: 'JSON',
        data: {'user_name':un, 'password':pw},
        success: function(data) {
              console.log("Should be redirecting");
              window.location = 'http://homestead.test/dashboard';
              var res = JSON.stringify(data);
              console.log(res);
              console.log("Login works lah");
              alert(JSON.stringify(data));

        },

        error: function(e) {
              console.log("Login ajax doesnt work");
        }
    });

});


// Register form Ajax post
$('#registerSubmit').click(function(e){
    e.preventDefault();

    var fn = $('#firstname').val();
    console.log(fn);
    var ln = $('#lastname').val();
    console.log(ln);
    var un = $('#username').val();
    console.log(un);
    var pw = $('#password').val();
    console.log(pw);

    $.ajax({
        url: 'http://homestead.test/api/register',
        type: 'post',
        dataType: 'JSON',
        data: {'first_name':fn, 'last_name':ln, 'user_name':un, 'password':pw},
        success: function(data) {
              var res = JSON.stringify(data);
              console.log(res);
              var ft = JSON.parse(res);
              console.log(ft);
              if (ft.success == "Username was taken") {
                console.log("this is oops");
                // $('#reg-war').show();
                $("#reg-ok").css("display", "none");
                $("#reg-no").css("display", "none");

                $("#reg-war").css("display", "block");

              }else {
                // $('#reg-ok').show();
                $("#reg-no").css("display", "none");
                $("#reg-war").css("display", "none");

                $("#reg-ok").css("display", "block");

              }
              console.log("This is register");
        },

        error: function(e) {
              // ​$('#reg-no').show();​​​​​​
              $("#reg-ok").css("display", "none");
              $("#reg-war").css("display", "none");

              $("#reg-no").css("display", "block");

              console.log("ajax doesnt work");
        }
    });

});
