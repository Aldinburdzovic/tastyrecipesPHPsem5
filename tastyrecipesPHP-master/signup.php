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
                    <h2>Signup</h2>
                <form action="includes/signup.inc.php" method="POST">
                        <input type="text" name="first" placeholder="Firstname">
                        <input type="text" name="last" placeholder="Lastname">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="text" name="email" placeholder="E-mail">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="submit">Signup</button>
                    </form>
                    </section>
                <div id="login">
                    <h2>Login</h2>
                    <form action="includes/login.inc.php" method="POST">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="submit">Login</button>
                    </form>
                </div>
                <br/>
                </div>
		<div id="footer">
                    
		</div>
	</body>
</html>
