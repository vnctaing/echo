<html>
<head>
  <title>Accueil</title>
  <?=css('new.css')?>
  <meta charset="UTF-8">
</head>
<body>
  <div id="navbar">
    <?= img('echo-o-violet.png')?>
    <div>
      <h1>Les paroles s'envolent, les écrits aussi.</h1>
      <hr>
      <h2>Echo est un service qui vous permet de créer un contenu éphémère, et de le partager avec vos amis.</h2>
    </div>
    <ul>
      <li><a href="#">Connexion</a></li>
      <li><a href="#">Inscription</a></li>
    </ul>
  </div>

  <div id="content">
    <div class="container">
        <?php
          echo form_open('echos/create'); // Crée un formulaire qui appelle la méthode create du controlleur echos
          echo $this->session->flashdata('add_success');
          $attributes = array(
            'placeholder' => 'Exprimez-vous :)',
            'name' => 'content'
            );
          echo form_textarea($attributes);
          echo 'duree de vie';
          $options = array(
            5 => '5',
            10 => '10',
            15 =>  '15',
            30 =>  '30'
            );
          //Options passé
          echo form_dropdown('expired_at', $options, '1');
        ?>
        <div class="droite">
          <?php echo form_submit('mysubmit', 'OK');?>
        </div>
        <?php echo form_close();?>
    </div>
  </div>
<?php echo phpinfo(); ?>
</body>
</html>