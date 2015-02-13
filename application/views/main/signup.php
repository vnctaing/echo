<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../../assets/img/o-violet-icon.png" />
  <title>Inscription</title>
  
  <meta name="viewport" content="width=320">
  <?=css('signup.css')?>
  <?=css('navbar.css')?>
  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58489011-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
  <div id="cadre">
    <h1>Rejoignez-nous !</h1>
    <hr>
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
      echo '<p>E-mail </br> ';
      echo form_input('email', $this->input->post('email'));
      echo '</p>';
      echo '<p>Mot de passe </br> ';
      echo form_password('password');
      echo '</p>';
      echo '<p>Confirmation du mot de passe </br> ';
      echo form_password('cpassword');
      echo '</p>';
      echo '<p>';
      echo form_submit('signup_submit', 'OK');
      echo '</p>';

      echo form_close();
      ?>
    </div>
  </div>
</body>
</html>
