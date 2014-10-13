<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Signup</title>
  <?=css('signup.css')?>
<link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
</head>
<body>
  <div>
     <a href="../../../index.php"><img src="../../../assets/img/logo-echo-blanc.png"></a>
  </div>
      <ul>
        <li><?php echo anchor('main/login', 'Connexion'); ?></li>
      </ul>
    <div class="join">
    <h1>Rejoins-nous !</h1>
    <img src="../../../assets/img/fleche-test.png">
   </div>
  <div class="formulaire">
    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
    </fb:login-button>
    <?php
    echo form_open('main/signup_validation');
    echo $this->session->flashdata('feedback');
    echo validation_errors();
    echo "<p>Nom d'utilisateur </br>";
    echo form_input('name');
    echo '</p>';
    echo '<p>Adresse e-mail </br> ';
    echo form_input('email', $this->input->post('email'));
    echo '</p>';
    echo '<p>Mot de passe </br> ';
    echo form_password('password');
    echo '</p>';
    echo '<p>Confirmez le mot de passe </br> ';
    echo form_password('cpassword');
    echo '</p>';
    echo '<p>';
    echo form_submit('signup_submit', 'OK');
    echo '</p>';

    echo form_close();
    ?>
 </div>
</body>
</html>
