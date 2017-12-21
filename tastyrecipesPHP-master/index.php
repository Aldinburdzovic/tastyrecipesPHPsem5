<?php

session_start();

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tasty Recepies</title>
                <link rel="stylesheet" type="text/css" href="tastycss.css">
		
	</head>
	<body>
		<div id="header">
			<section id = "it">
                            <a href="index.html"><img class="logo" alt="logo" src="https://s-media-cache-ak0.pinimg.com/originals/69/4d/8f/694d8fb5051bc6d44480e318de11f3b3.gif"/></a>
			<nav class="main-nav">
				<ul id = "navbar">
					<li><a href="index.php" class="nav">Home</a></li>
					<li><a href="meatballs.php" class="nav">Meatballs</a></li>
					<li><a href="pancakes.php" class="nav">Pancakes</a></li>
					<li><a href="calendar.php" class="nav">Calendar</a></li>
				</ul>
			</nav>
			</section>
		</div>
		<div id="main">
                    
                <h1>Welcome to Tasty Recipes</h1>
                <section class="main-left">
                <p class="intro-text">Here you can find delicious recipes that are quick and easy to do. We have events regularly so be sure to <a href="calendar.html">check out our awesome calendar here</a> as well. So far, we have 2 recipes in store for you to try out and please do write a comment also to let us know what you think.</p>
                    </section>
                <div id="login">
                    <?php
					if (isset($_SESSION['u_id'])) {
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
						</form>';
					} else {
						echo '<form action="includes/login.inc.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" name="submit">Login</button>
						</form>
						<a href="signup.php">Sign up</a>';
					}
                                        if (isset($_SESSION['u_id'])) {
				echo "You are logged in!";
			}
				?>
                    
                </div>
                <br/>
                </div>
		<div id="footer">
                    
		</div>
	</body>
</html>
