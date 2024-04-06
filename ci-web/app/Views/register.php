<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Registration Form</h2>
  <a href="<?php echo base_url('/');?>" class="btn btn-info" style="float:right">Login</a><br><br>
  <br>
    <form id="register-form">
        <input type="text" class="form-control" name="name" placeholder="Name">
        <br><br>
        <input type="email" class="form-control" name="email" placeholder="Email">
        <br><br>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <br>
        <br>
        <button type="submit" class="btn btn-primary" >Register</button>
    </form>
    <div id="register-error"></div>

</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    $('#register-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url('authregister'); ?>',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                res = JSON.parse(response);
                alert(res.message);
                console.log(response);
                window.location.reload();
            },
            error: function(xhr, status, error) {
                $('#register-error').html(xhr.responseText);
            }
        });
    });
});

</script>