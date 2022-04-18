<!DOCTYPE html>
<?php require_once('php/functions.php'); ?>
<html lang="en"></html> 
  <head>
    <link rel="stylesheet" href="css/admin.css"/>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  </head> 
  <body> 
    <div id="background-box"></div>
    <header class = "site-header">
      <div id="site-header-name"><a href="adminlogin.php">Event Core</a></div>
      <a href="adminlogin.php"><img id="logo" src="images/ECLogo.png"></a>
    </header>
    <div class="btn-container">
      <div class = "each-btn"><button onclick="location.href = 'adminlogin.php#events';" class ="btn">Events</button></div>
      <div class = "each-btn"><button onclick="location.href = 'admin.php#ce';" class ="btn">Create&nbsp;Event</button></div>
      <div class = "each-btn"><button onclick="location.href = 'admin.php#rso';" class ="btn">RSOs</button></div>
      <div class = "each-btn"><button onclick="location.href = 'logout.html';" class ="btn">Logout</button></div>
    </div>
    <div id="sub-heading">University Name Here</div> 
    <div id="rso"><a id="rso">Registered Student Organizations</a></div>
    <form action="php/joinRSO.php" method="POST">
      <div class="container">
        <div class="item">
          <div class="rsos">
            <?php
            $RSO1_info = getRSO(1);
            echo $RSO1_info["rsoname"];
            ?>
            <br><br>
            <?php
            echo $RSO1_info["description"];
            ?>
          </div>
        </div>
        <div class="item">
          <div class="rsos">
            <?php
            $RSO2_info = getRSO(2);
            echo $RSO2_info["rsoname"];
            ?>
            <br><br>
            <?php
            echo $RSO2_info["description"];
            ?>
          </div> 
        </div>
        <div class="item">
          <div class="rsos">
            <?php
            $RSO3_info = getRSO(3);
            echo $RSO3_info["rsoname"];
            ?>
            <br><br>
            <?php
            echo $RSO3_info["description"];
            ?>
          </div> 
        </div>
      </form>
    </div>
    <br><br><br><br>
    <div id="ce">Create Event</div>
      <div class="form">
        <form class="event-form" action="PHP/createEvents.php" method="POST">
          <input type="text" placeholder="ename" name="ename"/>
          <input type="text" placeholder="etype" name="etype"/>
          <input type="text" placeholder="username" name="username"/>
          <input type="text" placeholder="description" name="description"/>
          <input type="text" placeholder="address" name="address"/>
          <input type="text" placeholder="time" name="time"/>
          <input type="text" placeholder="date" name="date"/>
          <input type="text" placeholder="phone" name="phone"/>
          <input type="text" placeholder="email" name="email"/>
          <input type="submit" value="SUBMIT" name="create" style=" border-radius: 17px; 
          font-family: 'Open Sans'; text-transform: uppercase; outline: 0; background: #44A3EB; 
          width: 100%; border: 0; padding: 15px; color: #FFFFFF; font-size: 14px; ">
        </form>
      </div>
  </body>
</html>