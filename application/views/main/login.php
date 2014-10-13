<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login page</title>
  <?=css('connect.css')?>
  <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
</head>
<body>
  <div>
     <a href="../../../index.php"><img src="../../../assets/img/logo-echo-blanc.png"></a>
  </div>
  <ul>
    <li><?php echo anchor('main/signup', 'Inscription'); ?></li>
  </ul>
  <div class="connect">
    <h1>Connecte-toi !</h1>
    <img src="../../../assets/img/fleche-test.png">
  </div>

  <div class="formulaire">
    <?php
      echo form_open('main/login_validation');
      echo $this->session->flashdata('feedback'); //Display the flashdata set in main/signup_validation
      echo validation_errors();
      echo "<p></br></br>Email</br>";
      echo form_input('email');
      echo "</p>";
      echo "<p></br>Mot de passe</br>";
      echo form_password('password');
      echo "</p>";
      echo "<p>";
      echo form_submit('login_submit', 'Se connecter');
      echo "</p>";
      echo form_close();
     ?>
    </div>
</body>
</html>
