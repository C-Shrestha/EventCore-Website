<!DOCTYPE html>
<?php require_once('php/functions.php'); ?>
<html lang="en"></html> 
  <head>
    <link rel="stylesheet" href="css/student.css"/>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  </head> 
  <body> 
    <div id="background-box"></div>
    <header class = "site-header">
      <div id="site-header-name"><a href="studentlogin.php">Event Core</a></div>
      <a href="studentlogin.php"><img id="logo" src="images/ECLogo.png"></a>
    </header>
    <div class="btn-container">
        <div class = "each-btn"><button onclick="location.href = 'studentlogin.php#events';" class ="btn">Events</button></div>
        <div class = "each-btn"><button onclick="location.href = 'student.php#rso';" class ="btn">RSOs</button></div>
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
            <br><br>
            <input type="submit" value="join" name="join1" style=" border-radius: 17px; font-family: 'Open Sans'; text-transform: 
              uppercase; outline: 0; background: #44A3EB; width: 100%; border: 0; padding: 15px; color: #FFFFFF; font-size: 14px;">
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
            <br><br>
            <input type="submit" value="join" name="join2" style=" border-radius: 17px; font-family: 'Open Sans'; text-transform: 
              uppercase; outline: 0; background: #44A3EB; width: 100%; border: 0; padding: 15px; color: #FFFFFF; font-size: 14px;">
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
            <br><br>
            <input type="submit" value="join" name="join3" style=" border-radius: 17px; font-family: 'Open Sans'; text-transform: 
              uppercase; outline: 0; background: #44A3EB; width: 100%; border: 0; padding: 15px; color: #FFFFFF; font-size: 14px;">
          </div> 
        </div>
      </form>
    </div>
    <div id="cerso">Create RSO</div>
      <div class="form">
        <form class="event-form" action="PHP/createRSO.php" method="POST">
          <input type="text" placeholder="name" name="name"/>
          <input type="text" placeholder="description" name="description"/>
          <input type="text" placeholder="university" name="university"/>
          <input type="number" placeholder="number of students" name="num_students"/>
          <input type="text" placeholder="administrator student name" name="administrator"/>  
          <input type="submit" value="submit" name="create" style=" border-radius: 17px; font-family: 'Open Sans'; text-transform: 
              uppercase; outline: 0; background: #44A3EB; width: 100%; border: 0; padding: 15px; color: #FFFFFF; font-size: 14px;">
        </form>
      </div>
  </body>
</html>