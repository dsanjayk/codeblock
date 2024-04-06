<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login Form</h2>
    
    <a href="<?php echo base_url('register');?>" class="btn btn-info" style="float:right">Register</a><br><br><br>
    <form id="login-form">
        <input type="email" class="form-control" name="email" placeholder="Email"><br><br>
        <input type="password" class="form-control" name="password" placeholder="Password"><br><br>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div id="login-error"></div>

</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url('authlogin'); ?>',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                res = JSON.parse(response);
                if(res.message == 'Unauthorized'){
                    alert('Unauthorized Login');
                }
                if(res.token != '' && res.message != 'Unauthorized'){
                    alert('Successfully Logged In');
                }
               
                console.log(response);
                window.location.reload();
            },
            error: function(xhr, status, error) {
                $('#login-error').html(xhr.responseText);
            }
        });
    });

});

</script>