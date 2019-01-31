<?php
  include "inf.php";
  include "bdd.php";
  $bddc = mysqli_connect($bdd, $ubdd, $pbdd, $dbname) or die("database ログイン エラー");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="apple-mobile-web-app-capable" content="no">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <link rel="icon" href="ic.png" type="image/png"/>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>placeholder</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body style="background: #000000; color: white;">

  <div class="">
  <nav style="box-shadow: none!important;" class="grey darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="." class="brand-logo red-text"><img src="ic.png" height="32px" width="32px">TwipleH</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="viewall">Vue éclatée</a></li>
        <li><a href="#!">Catégories</a></li>
        <li><a href=".">Acceuil</a></li>
      </ul>

      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav></div>
  <ul id="nav-mobile" class="sidenav">
    <li><a href="viewall">Vue éclatée</a></li>
    <li><a href="#!">Catégories</a></li>
    <li><a href=".">Acceuil</a></li>
  </ul>

<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <br>
    <div class="section">
      <div class="row">
        <div class="col s12 m6">
          <div class="card grey darken-4">
                <?php
                if ($_GET["v"] == null) {
                  echo "<h3 class=\"blue-text center\">OOPS : Tu t'es gourré</h3>";
                  echo "<h5 class=\"themed-t center\">Tu est nul(le) ? ben tu t'est un peu trompé(e) de page en fait.<br><br>- NightmareBot</h5><br><br>";
                } else {
                  $video = $_GET["v"];
                  $in1 = "metadata/$video.php";
                  include $in1;
                  echo "<script>document.title = \"$title épisode $episode - TwipleH Vidéo\";</script>";
                  echo "<div class=\"card-image\">";
                  if ($link != null) {
                  echo "<video class=\"responsive-video\" width=\"100%\" controls>";
                  echo  "<source src=\"$link\" type=\"video/mp4\">";
                  echo  "Votre navigateur ne supporte pas ce serveur de stream.";
                  echo "</video>";} else {
                  if ($player == "Stream.moe") echo "<div class=\"video-container\"><iframe src=\"https://stream.moe/embed2/$smoe/\" frameborder=\"0\" scrolling=\"no\" style=\"overflow: hidden;\" webkitAllowFullScreen=\"true\" mozallowfullscreen=\"true\" allowFullScreen=\"true\"></iframe></div>";
                  if ($player == "Dailymotion") echo "<div class=\"video-container\"><iframe frameborder=\"0\" src=\"https://www.dailymotion.com/embed/video/$daily\" allowfullscreen allow=\"autoplay\"></iframe></div>";
                  }
                  echo "</div>";
                  echo "<div class=\"card-content\">";
                  echo "<span class=\"card-title\" style=\"color: #d50000;\">$title</span>";
                  echo "<p>$info</p><br>";
                  echo "<div class=\"divider\"></div>";
                  echo "<h5>Plus d'infos :</h5>";
                  echo "<p>Episode $episode sur $episodes</p>";
                  echo "<p>Serveur de stream : $player</p>";
                  echo "<p>Type : $tags</p>";
                  echo "</div>";
                  echo "<div class=\"card-action\">";
                  if ($downl != null) {echo "<a href=\"$link\">Télécharger</a>";} if ($mal != null) {echo "<a href=\"$mal\">MyAnimeList</a>";} if ($mal == null and $downl == null) {echo "<a class=\"white-text\">Aucun lien disponible</a>";}
                  echo "</div>";


                }?>
            </div>
          </div>
          <?php
          echo "<div class=\"col s12 m6\">
            <div class=\"card grey darken-4\">
              <div class=\"card-content\">
                  <span class=\"card-title\">Coming soon...</span>
                  <p>Cette case viendra dans les temps à venir.</p>
              </div>
            </div>";
          if ($VideoID != null) {
            if ($_POST["action"] == "comment") {
              mysqli_select_db($bddc,"$dbname") or die("database エラー );");
              $com = $_POST["comm"];
              $query = "INSERT INTO $VideoID(comment) VALUES('$com')";
              mysqli_query($bddc,$query);
            }
          echo "<div class=\"card grey darken-4\">
              <div class=\"card-content\">
                  <span class=\"card-title\">Commentaires</span>
                  <p>SVP, ne pas soumettre de nouveau commentaires.</p>
                  <p>Please don't submit new comments.</p>
                  <p>Por favor, no se permite recivir nuevos comentos.</p>
              </div>
              <div class=\"card-action\">
                <form action=\"watch.php?v=$video\" method=\"POST\">
                  <div class=\"input-field col s12\">
                    <input name=\"comm\" id=\"comm\" type=\"text\" class=\"validate\">
                    <label for=\"comm\">Message</label>
                  </div><button class=\"btn waves-effect waves-light red\" type=\"submit\" name=\"action\" value=\"comment\">Commenter<i class=\"material-icons right\">send</i></button>
                </form>
              </div>
            </div>
          </div>
          </div>";
        } else {
            echo "<div class=\"card grey darken-4\">
                <div class=\"card-content\">
                    <span class=\"card-title\">Commentaires</span>
                    <p>Case non disponible.</p>
                </div>
              </div>
            </div>
          </div>";
          }

          ?>
        </div>
    </div>
  </div>
</div>





  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="http://cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
  </body>
</html>
