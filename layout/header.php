<?php
  $url = "../settings/";
  if(explode("/", $_SERVER['PHP_SELF'])[2] == "index.php")
  {
    $url = "settings/";
  }
  require($url."settings.php");
  require($url."DAO.php");
  $dao = new DAO();
  
?>
<header id="header" class="hoc clear">
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
        <img src="<?= $Env['link'] ?>images/logo-m-white.png" style="width: 90px">
    </div>
    <nav id="mainav" class="fl_right">
        <ul class="clear">
            <li class="active"><a href="index.php">Accueil</a></li>
            <li><a class="active" href="#">à-propos</a></li>
            <li><a class="drop" href="#">Evenements</a>
                <ul>
                    <li><a href="pages/art.php">Art</a></li>
                    <li><a href="pages/sport.php">Sport</a></li>
                    <li><a href="pages/musique.php">Musique</a></li>
                    <li><a href="pages/festivals.php"> Festivals </a></li>
                    <li><a href="pages/basic-grid.php">+ Plus </a></li>
                </ul>
            </li>
            <li><a class="active" href="pages/contacter nous/index.php">Contacter nous</a></li>
            <!--   <li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Link Text</a></li> -->
        </ul>
    </nav>
</header> 