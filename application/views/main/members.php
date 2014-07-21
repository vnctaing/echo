<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Member section</title>
</head>
<body>
  <h1>Member Page</h1>

  <?php
    echo form_open('echos/create');
    echo form_input('echo', 'Echo');
    echo form_submit('echos_confirmation', 'Ok');
    echo form_close();
   ?>

  <a href='<?php echo base_url()."main/logout";?>'>Logout</a>
</body>
</html>