




<!DOCTYPE html>
<?php 
require_once('PHP/functions.php');
$conn = connectToDatabase();
?>
<html lang="en"></html>
<head>
  <link rel="stylesheet" href="css/index.css"/>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open Sans' >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="./index.js"></script>
</head> 
  <body> 
    <div id="background-box"></div>
    <header class ="site-header">
        <div id="site-header-name"><a href="adminlogin.php">Event Core</a></div>
        <a href="adminlogin.php"><img id="logo" src="images/ECLogo.png"></a>
    </header>
    <div class="btn-container">
      <div class = "each-btn"><button onclick="location.href = 'adminlogin.php#events';" class ="btn">Events</button></div>
      <div class = "each-btn"><button onclick="location.href = 'admin.php#rso';" class ="btn">RSOs</button></div>
      <div class = "each-btn"><button onclick="location.href = 'logout.html';" class ="btn">Logout</button></div>
    </div>
    <div id="subtitle">an informative university event website</div>
    <div class="pic-container">
      <div class="pic-item"><img src="images/pic1.jpg"></div>
      <div class="pic-item"><img src="images/pic2.jpg"></div>
      <div class="pic-item"><img src="images/pic3.jpg"></div>
   </div>
   <div id="sub-heading"><a id="events">Upcoming Events</a></div>
   <div class="btn-cont" style=" display: grid;
  grid-gap: 20px;
  padding: 10px;
  margin-left: 50px;
  margin-right: 50px;
  margin-top: 200px;
  grid-template-columns: 33% 33% 33%;">
    <div class="btn-item"  style="position: relative;
  width: auto;
  height: auto;">
   <form class="form" method="POST">
    <input type="submit" value="Show Public Events" name="public_events"  style=" border-radius: 17px; 
    font-family: 'Open Sans'; text-transform: uppercase; outline: 0; background: #44A3EB; 
    width: 100%; border: 0; padding: 15px; color: #FFFFFF; font-size: 14px; ">
  </form><br></div>
  <div class="btn-item" style="position: relative;
  width: auto;
  height: auto; ">
  <form class="form" method="POST">
    <input type="submit" value="Show Private Events" name="private_events"  style=" border-radius: 17px; 
    font-family: 'Open Sans'; text-transform: uppercase; outline: 0; background: #44A3EB; 
    width: 100%; border: 0; padding: 15px; color: #FFFFFF; font-size: 14px; ">
  </form><br></div>
  <div class="btn-item" style="position: relative;
  width: auto;
  height: auto; ">
  <form class="form" method="POST">
    <input type="submit" value="Show RSO Events" name="rso_events"  style=" border-radius: 17px; 
    font-family: 'Open Sans'; text-transform: uppercase; outline: 0; background: #44A3EB; 
    width: 100%; border: 0; padding: 15px; color: #FFFFFF; font-size: 14px; ">
  </form><br></div> 
</div>
<?php
    if (isset($_POST['public_events'])) {
      ?><h1><div align='center'><?php echo "Showing Public Events You're Attending"; ?></div></h1> 
      <br><br>
      <?php
      showAllEvents($public=true, $private=false, $rso=false);
    } elseif (isset($_POST['private_events'])) {
      ?><h1><div align='center'><?php echo "Showing Private Events You're Attending"; ?></div></h1>
      <br><br>
      <?php
      showAllEvents($public=false, $private=true, $rso=false);
    } elseif (isset($_POST['rso_events'])) {
      ?><h1><div align='center'><?php echo "Showing RSO Events You're Attending"; ?></div></h1>
      <br><br>
      <?php
      showAllEvents($public=false, $private=false, $rso=true);
    }
    ?>
   <div class="container">
    <div class="item">
      <div class="events">
        <?php
          $event1_info = getEvent(1);
          echo $event1_info["ename"]; // Name
        ?>
        <br>
        <?php
          echo "Type: {$event1_info["etype"]}"; // Type
        ?>
        <br><br>
        <?php
          echo $event1_info["description"]; // Description
        ?>
        <br><br>
        <?php
          echo "{$event1_info["time"]} @ {$event1_info["date"]}"; // Date and Time
        ?>
        <br>
        <?php
          echo $event1_info["address"]; // Address
        ?>
        <br><br>
        <?php
          echo "Organizer:";  
        ?>
        <br>
        <?php
          echo $event1_info["username"]; // Organizer
        ?>
        <br>
        <?php
          echo $event1_info["phone"]; // Phone Number
        ?>
        <br>
        <?php
          echo $event1_info["email"]; // Email
        ?>
        <br><br>Location<br><br>
        <div id="map_canvas"></div>
        <br><form action = "PHP/join.php" method="POST"><input type="submit" name="submit" value="Join"/></form>
        <br><br>Rating<br>
          <div class= "star-grid">
            <fieldset class="rating">
            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
        </fieldset></div>
        <br><br>Share to<br><a href="https://www.facebook.com/" class="fa fa-facebook"></a>
        <a href="https://twitter.com/" class="fa fa-twitter"></a>
        <a href="https://www.google.com/" class="fa fa-google"></a>
      <br><br><br>
      <form action = "PHP/comments.php" method="POST">Comments<br>
        <textarea name="message" cols="30" rows="10" class="message" placeholder="Comment here...."></textarea><br>
        <input type="submit" name="submit" value="post"/>
      </form>

      <form action = "PHP/comments.php" method="POST"><br> 

          <textarea name="emessage" cols="30" rows="10" class="emessage" placeholder="Edit here...."></textarea><br>
          <input type="submit" name="esubmit" value="Edit"/>
          
        </form>
      <?php
            
			$sql = "SELECT * FROM comments";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
			   
		?>
		<div id="user"><h4><?php echo $row['username']; ?></h4></div>
		<p><?php echo $row['message']; ?></p>

		<?php } } ?>
      </div>
    </div>
    <div class="item">
      <div class="events">
      <?php
          $event1_info = getEvent(2);
          echo $event1_info["ename"]; // Name
        ?>
        <br>
        <?php
          echo "Type: {$event1_info["etype"]}"; // Type
        ?>
        <br><br>
        <?php
          echo $event1_info["description"]; // Description
        ?>
        <br><br>
        <?php
          echo "{$event1_info["time"]} @ {$event1_info["date"]}"; // Date and Time
        ?>
        <br>
        <?php
          echo $event1_info["address"]; // Address
        ?>
        <br><br>
        <?php
          echo "Organizer:";  
        ?>
        <br>
        <?php
          echo $event1_info["username"]; // Organizer
        ?>
        <br>
        <?php
          echo $event1_info["phone"]; // Phone Number
        ?>
        <br>
        <?php
          echo $event1_info["email"]; // Email
        ?>
      <br><br><br>Location<br><br>
        <div id="map_canvas2"></div>
        <br><form action = "PHP/join2.php" method="POST"><input type="submit" name="submit" value="Join"/></form>
        <br><br>Rating<br>
          <div class= "star-grid">
            <fieldset class="rating">
            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
        </fieldset></div>
        <br><br>Share to<br><a href="https://www.facebook.com/" class="fa fa-facebook"></a>
        <a href="https://twitter.com/" class="fa fa-twitter"></a>
        <a href="https://www.google.com/" class="fa fa-google"></a>
        <br><br><br>
        <form action = "PHP/comments2.php" method="POST">Comments<br>
          <textarea name="message" cols="30" rows="10" class="message" placeholder="Comment here...."></textarea><br>
          <input type="submit" name="submit" value="Post"/>
        </form> 
          
        <form action = "PHP/comments2.php" method="POST"><br> 

          <textarea name="emessage" cols="30" rows="10" class="emessage" placeholder="Edit here...."></textarea><br>
          <input type="submit" name="esubmit" value="Edit"/>
          
        </form>
        <?php
            
            $sql = "SELECT * FROM comments2";
            $result = $conn->query($sql);
      
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
               
          ?>
        
        

		<div id="user"><h4><?php echo $row['username']; ?></h4></div>
		<p><?php echo $row['message']; ?></p>

		<?php } } ?>

      </div>
    </div>

</div>

    
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd_tb7xB0nNjXLyiLIIzdWRF31l0ZKznQ&callback=initMap&v=weekly"
  async
></script> 
  </body>
</html>