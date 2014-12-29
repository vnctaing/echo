<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <?=css('connect.css')?>
  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" media="screen and (max-width: 830px)" href="../../assets/css/connect-mobile.css">
</head>
<body>

 <div id="navbar">
    <a href="../../../index.php"><img src="../../assets/img/echo.png"></a>
    <ul class="hidden">
      <li><?php echo anchor('main/signup', 'Inscription'); ?></li>
      <li><?php echo anchor('/', 'Accueil'); ?></li>
    </ul>
  </div>
  <div id="cadre">
    <h1>Connectez-vous</h1>
    <hr>

  <div class="formulaire">
    <?php
      echo form_open('main/login_validation');
      echo $this->session->flashdata('feedback'); //Display the flashdata set in main/signup_validation
      echo validation_errors();
      echo "<p></br></br>E-mail</br>";
      echo form_input('email');
      echo "</p>";
      echo "<p></br>Mot de passe</br>";
      echo form_password('password');
      echo "</p>";
      echo "<p>";
      echo form_submit('login_submit', 'OK');
      echo "</p>";
      echo form_close();
     ?>
    </div>
</body>
</html>
