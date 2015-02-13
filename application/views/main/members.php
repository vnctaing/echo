<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../../assets/img/o-violet-icon.png" />
  <title>Espace membre</title>
  
  <meta name="viewport" content="width=320">
  <?=css('member.css')?>
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
  <h1>Bienvenue, <?php echo $this->session->userdata('user') ?>.</h1>
  
  <table>
    <tr>
      <td>CONTENU</td>
      <td>LIEN</td>
      <td>EXPIRATION</td>
    </tr>
    <?php  
    for ($i=0; $i < sizeof($echos); $i++) { 
      echo '<tr>';
        echo "<td>" . $echos[$i]->content . "</td>";
        echo "<td>" . anchor(base_url($echos[$i]->gkey), '/'. $echos[$i]->gkey) . "</td>";
        echo "<td>" . $echos[$i]->expires_at . "</td>";
      echo "</tr>";
    }
    echo '</table>';
    echo '<div id="profil">';
    echo anchor(base_url('main/logout'), 'Déconnexion');
    echo anchor(base_url('main/delete/'. $this->session->userdata('user')), 'Supprimer son compte');
    echo '</div>';
    ?>
  
   <pre>  
  <?php echo print_r($this->session->all_userdata()); 
  print_r($echos);
  ?>
  </pre>
  <footer>
    <ul>
      <li><p>En utilisant ce service, vous acceptez <?php echo anchor('welcome/cgu', 'les Conditions Générales d\'Utilisation'); ?></p></li>
      <li><a href="https://www.facebook.com/pages/Echo/662945737093488" target="blank"><img src="../../assets/img/fb.png"></a></li>
      <li><a href="https://twitter.com/LeProjetEcho" target="blank"><img src="../../assets/img/twitter.png" ></a></li>
    </ul>
  </footer>
</body>
</html>
