<html>
  <head>
    <title>Mon Test Php</title>
  </head>
  <body>
      Test : la version du serveur est :
      <?php
        // phpinfo();
        $mysqli = new mysqli("172.31.45.77", "root", "RootMysql2021!",
"contacts");
        echo $mysqli->server_info; 
      ?>
  </body>
</html>
