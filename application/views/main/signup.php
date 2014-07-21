<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Signup</title>
</head>
<body>
  <h1>Inscription</h1>

  <?php
  echo form_open('main/signup_validation');
  echo $this->session->flashdata('feedback');
  echo validation_errors();
  echo "<p>Nom d'utilisateur : ";
  echo form_input('name');
  echo '</p>';
  echo '<p>Adresse e-mail : ';
  echo form_input('email', $this->input->post('email'));
  echo '</p>';
  echo '<p>Mot de passe : ';
  echo form_password('password');
  echo '</p>';
  echo '<p>Confirmez le mot de passe : ';
  echo form_password('cpassword');
  echo '</p>';
  echo '<p>';
  echo form_submit('signup_submit', 'Sign Up');
  echo '</p>';


  echo form_close();


   ?>
</body>
</html>