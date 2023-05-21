
<?php

include('srms.php');

$object = new srms();

if($object->is_login())
{
    header("location:".$object->base_url."admin/dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>MyResult</title>

<!-- Custom fonts for this template-->
<link href="../vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link rel="stylesheet" type="text/css" href="../vendor/parsley/parsley.css"/>

<style>
  .border-top { border-top: 1px solid #e5e5e5; }
  .border-bottom { border-bottom: 1px solid #e5e5e5; }
  .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
</style>

</head>

<body>

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal text-white">MyResult</h5>
    <br>
      <a href="./../index.php"><h5 class="my-0 mr-md-auto font-weight-normal text-white">Back to Search Result Page</h5></a>    
  </div>

  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Welcome to MyResult </h1><br>
  <h4>An Online Student Result Management System.</h4>
  </div>
  <br />
  <br />
  <div class="container mb-5">
    <main class="form-signin">
        <form method="post" id="login_form">
            <div class="card-header">
                <h1 class="h3 mt-2 mb-2 fw-normal text-center">Staff Login Screen</h1>
            </div>
            <span id="error"></span>
            <div class="card-body">
              <div class="form-group">
                  <label><b>Email</b><span class="text-danger">*</span></label>
                  <input type="text" name="user_email" id="user_email" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" placeholder="Email" />
              </div>
              <div class="form-group">
                <label><b>Password</b><span class="text-danger">*</span></label>
                  <input type="password" name="user_password" id="user_password" class="form-control" required  data-parsley-trigger="keyup" placeholder="Password" />
              </div>
            </div>
            <div class="card-footer text-right">
              <div class="form-group">
                  <button type="submit" name="login_button" id="login_button" class="btn btn-primary">Login</button>
              </div>
            </div>
        </form>
    </main>

    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <script type="text/javascript" src="../vendor/parsley/dist/parsley.min.js"></script>

</body>

</html>

<script>

$(document).ready(function(){

  $('#login_form').parsley();

  $('#login_form').on('submit', function(event){
      event.preventDefault();
      if($('#login_form').parsley().isValid())
      {       
          $.ajax({
              url:"login_action.php",
              method:"POST",
              data:$(this).serialize(),
              dataType:'json',
              beforeSend:function()
              {
                  $('#login_button').attr('disabled', 'disabled');
                  $('#login_button').val('wait...');
              },
              success:function(data)
              {
                  $('#login_button').attr('disabled', false);
                  if(data.error != '')
                  {
                      $('#error').html(data.error);
                      $('#login_button').val('Login');
                  }
                  else
                  {
                      window.location.href = data.url;
                  }
              }
          })
      }
  });

});

</script>