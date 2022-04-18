

<!DOCTYPE html>
<?php 

require_once('PHP/functions.php');

?>

<?php
// connect to database 
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "eventcore";


    $conn = connectToDatabase($host=$host, $dbUsername=$dbUsername, $dbPassword=$dbPassword, $dbName=$dbName);

?>

<html lang="en"></html> 
  <head>
    <link rel="stylesheet" href="css/superAdmin.css"/>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  </head> 
  <body> 
    <div id="background-box"></div>
    <header class = "site-header">
      <div id="site-header-name"><a href="salogin.html">Event Core</a></div>
      <a href="salogin.html"><img id="logo" src="images/ECLogo.png"></a>
    </header>
    <div class="btn-container">
        <div class = "each-btn"><button onclick="location.href = 'salogin.html#events';" class ="btn">Events</button></div>
        <div class = "each-btn"><button onclick="location.href = 'superAdmin.html#uni';" class ="btn">University</button></div>
        <div class = "each-btn"><button onclick="location.href = 'logout.html';" class ="btn">Logout</button></div>
      </div>

    <div id="heading"><a id="uni">UNIVERSITY PROFILE</a></div> 
    <div class="container">
      <div class="item">
      
        <div class="profile">Your Universities<br>
        <?php
            
			$sql = "SELECT * FROM university";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
			   
		?>
		<div id="user"><h4><?php echo $row['name']; ?></h4></div>
		

		<?php } } ?>
        </div>

        
      </div>
      <div class="item">
        <div class="form">
          <form class="uni-form" action = "PHP/university.php" method="POST">
            <input type="text" placeholder="name" name = "name"/>
            <input type="text" placeholder="location" name = "address"/>
            <input type="text" placeholder="description" name = "description"/>
            <input type="text" placeholder="number of students" name = "number"/>
            <input type="submit" name="submit" value="Create"/>
          </form>
        </div> 
      </div>
    </div>  
  </body>
</html>