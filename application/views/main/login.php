<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login page</title>
</head>
<body>
  <div id="container">
    <h1>Connexion</h1>
    <?php
      echo form_open('main/login_validation');
      echo $this->session->flashdata('feedback'); //Display the flashdata set in main/signup_validation
      echo validation_errors();
      echo "<p>Email:";
      echo form_input('email');
      echo "</p>";
      echo "<p>Mot de passe:";
      echo form_password('password');
      echo "</p>";
      echo "<p>";
      echo form_submit('login_submit', 'Se connecter');
      echo "</p>";
      echo form_close();
     ?>

     <a href="<?php echo base_url().'main/signup';?>">S'inscrire</a>
  </div>
</body>
</html>