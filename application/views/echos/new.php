<!DOCTYPE html>
<html lag="en">
<head>
  <meta charset="UTF-8">
  <title> Echo </title>
  <?=css('bootstrap.css')?>
</head>
<body>
  <h1>Créer un écho</h1>
  <?php
    echo form_open('echos/create'); // Crée un formulaire qui appelle la méthode create du controlleur echos
    echo $this->session->flashdata('add_success');
    echo '<br>';
    $attributes = array(
      'placeholder' => 'Exprimez-vous :)',
      'name' => 'content'
      );
    echo form_textarea($attributes);
    echo '<br>';

    echo 'duree de vie';
    $options = array(
      1 => '1',
      5 => '5',
      10 => '10',
      20 =>  '20',
      30 =>  '30'
      );
    //Options passé
    echo form_dropdown('expired_at', $options, '1');

    $attributes = array('class' => 'btn btn-success');
    echo form_submit($attributes, 'Créer un Echo');
    echo form_close();
   ?>
</body>
</html>