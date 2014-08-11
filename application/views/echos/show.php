<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Echo</title>
  <?=css('bootstrap.css')?>
</head>
<body>
  <h2>Contenu</h2>
  <br>
  <br>
  <p><?php echo $echo[0]->content;?></p>
  <br>
  <br>
  <?php
    echo anchor(base_url('echos/index'), '<< Créer un écho');
    echo anchor(base_url("echos/update/".$echo[0]->gkey), 'Faire résonner');
  ?>

</body>
</html>


