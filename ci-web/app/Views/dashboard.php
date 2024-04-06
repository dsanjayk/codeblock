<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Dashboard</h2>
   <?php if(!empty($email) && !empty($token) && $logged_in == true ){ echo "<h4>Welcome! ".$email."</h4>"; } ?>
   <a href="<?php echo base_url('logout');?>" class="btn btn-danger">Logout</a>  

</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

