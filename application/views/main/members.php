<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../../assets/img/o-violet-icon.png" />
  <title>Nouveau membre</title>
  <?=css('member.css')?>
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
      <td>Contenu</td>
      <td>Lien</td>
      <td>Expire le</td>
      <td> </td>
    </tr>
    <?php  
    for ($i=0; $i < sizeof($echos); $i++) { 
      echo '<tr>';
        echo "<td>" . $echos[$i]->content . "</td>";
        echo "<td>" . anchor(base_url($echos[$i]->gkey), '/'. $echos[$i]->gkey) . "</td>";
        echo "<td>" . $echos[$i]->expires_at . "</td>";
        echo "<td>" . anchor(base_url('echos/delete/'.$echos[$i]->gkey), '<button>Supprimer</button>' );
      echo "</tr>";
    }
    ?>
  </table>
  <div id="delAccount">
    <button>Supprimer son compte</button>
  </div>


  <pre>  
    <?php echo print_r($this->session->all_userdata()); 
    print_r($echos);?>
  </pre>

    <script>
    var delAccount = document.getElementById('delAccount');
    delAccount.addEventListener('click', function(){
      confirm('Vous êtes sûr ?');
      window.location = "http://localhost/main/delete";
      /* delAccount.innerHTML = '<form action="http://localhost/main/delete/" method="post" accept-charset="utf-8">' +
         '<input type="password" placeholder="Entrez votre mot de passe" name="<?php echo $this->security->csrf_token_name?>">' +
         '<input type="submit" value="Confirmer">' +
       '</form>';*/
    });
  </script>
</body>
</html>
