<html>
<head>
  <title>Accueil</title>
  <meta charset="UTF-8">
</head>
<body>
  <div id="navbar">
    <a href="#"></a>
    <div class="container">
      <h1>Les paroles s'envolent, les écrits aussi.</h1>
      <hr>
      <h2>Echo est un service qui vous permet de créer un contenu éphémère, et de le partager avec vos amis.</h2>
    </div>
    <ul>
      <li><?php echo anchor('main/login', 'Connexion'); ?></li>
      <li><?php echo anchor('main/signup', 'Inscription'); ?></li>
    </ul>
  </div>

  <div class="champecho">
    <?php
      echo form_open('echos/create'); // Crée un formulaire qui appelle la méthode create du controlleur echos
      echo $this->session->flashdata('add_success');
      $attributes = array(
        'placeholder' => 'Exprime-toi :)',
        'name' => 'content'
        );
      echo form_textarea($attributes);
    ?>
  </div>
  <div class="droite">
    <?php
      
      echo 'Choisis la durée de vie :</br></br>';
      $options = array(
        5 => '5 min',
        10 => '10 min',
        15 =>  '15 min',
        30 =>  '30 min',
        45 =>  '45 min',
        60 =>  '1h',
        90 =>  '1h30',
        120 =>  '2h'
        );
      //Options passé
      echo form_dropdown('expired_at', $options, '1');
      echo 'Option Chiffrement: ';
      echo form_checkbox('encrypt', 1);
      echo 'Entrez une clef secrete :';
      echo form_input('secretkey');
    ?>
  
    <?php echo form_submit('mysubmit', 'OK');
    ?>
   </div>
    <?php echo form_close();?>



</body>
</html>