<div id="navbar">
  <?php echo anchor(base_url(), '<img src="../../assets/img/echo.png">'); ?>
  <ul class="hidden">
    <?php  
      if($this->session->userdata('is_logged_in')){
        //echo "<li>" . anchor(base_url('main/logout'), 'Déconnexion') . "</li>";
        $name = $this->session->userdata('user');
        echo "<li>" . anchor(base_url('main/members'), $name) . "</li>";
        echo "<li>" . anchor(base_url(), 'Accueil') . "</li>";
      }
      else{ 
        echo "<li>" . anchor('main/signup', 'Inscription') . "</li>";
        echo "<li>" . anchor('main/login', 'Connexion') . "</li>";
    }?>
  </ul>
</div>