<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Echo </title>
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
    echo form_submit('submit', 'Créer un Echo');
    echo form_close();
   ?>
</body>
</html>