<?php
    session_start();
    date_default_timezone_set('Europe/Stockholm');
    
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName = "tastyrecipes";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
};  


function setComments($conn){
    if(isset($_POST['commentSubmit'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
    }
}

function getComments($conn){
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $id = $row['uid'];   
        $sql2 = "SELECT * FROM users WHERE user_id='$id'";
        $result2 = $conn->query($sql2);
        if($row2 = $result2->fetch_assoc()){
            echo"<div class='comment-box'><p><p class='user-date'>";
            echo $row2['user_uid']."<br></p>";
            echo $row['date']."<br>";
            echo nl2br($row['message']);
            echo "</p> "; 
            if(isset($_SESSION['u_id'])){ 
                if($_SESSION['u_id'] == $row2['user_id']){
                   echo "<form id='delete-form' method='POST' action='".deleteComments($conn)."'>
                    <input type='hidden' name='cid' value='".$row['cid']."'>
                    <button type='submit' name='commentDelete'>Delete</button>
                     </form>"; 
                }
            }
            
        echo "</div>";
        }
        
                
    }
    
}
function deleteComments($conn){
    if(isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: meatballs.php");
    }
}
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
                            <a href = "index.html"><img class="logo" alt="logo" src="https://s-media-cache-ak0.pinimg.com/originals/69/4d/8f/694d8fb5051bc6d44480e318de11f3b3.gif"/></a>
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
		<div id = "right">
			<h1>The Best Meatballs Recipe</h1>
			<img class="pic" alt="meatballs" src="https://media3.s-nbcnews.com/i/newscms/2016_37/1158018/meatballs-today-160914-tease-02_9473265cce330fbbe87dc3cad7ac7654.jpg"/>

			<h2>Ingredients</h2>
			<ul id = "recepie">

				<li><b>1</b> lb lean (at least 80%) ground beef</li>
				<li><b>1/2</b> cup Progresso Italian-style bread crumbs</li>
				<li><b>1/4</b> cup milk</li>
				<li><b>1/2</b> teaspoon salt</li>
				<li><b>1/2</b> teaspoon Worcestershire sauce</li>
				<li><b>1/4</b> teaspoon pepper</li>
				<li><b>1</b> small onion, finely chopped (1/4 cup)</li>
				<li><b>1</b> egg</li>
			</ul>
		</div>


			<h2>Steps</h2>
			<ol id = "steps">

				<li>Heat oven to 400F. Line 13x9-inch pan with foil; spray with cooking spray.</li>
				<li>In large bowl, mix all ingredients. Shape mixture into 20 to 24 (1 1/2-inch) meatballs. Place 1 inch apart in pan.</li>
				<li>Bake uncovered 18 to 22 minutes or until no longer pink in center.</li>
			</ol>

			<h2>Comments</h2>
			
                        <?php
                        if (isset($_SESSION['u_id'])) {
				echo "<form action='includes/comments.inc.php' method='POST'>
                            <input type='hidden' name='uid' value='".$_SESSION['u_id']."'>
                            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                            <textarea name='message'></textarea><br>
                            <button id='com-btn' type='submit' name='commentSubmit'>Comment</button>
                        </form>";
			}else{
                            echo '<div id="login-link"><form action="signup.php" method="POST">
				<button type="submit" name="submit">Login</button>
				</form>Log in to write a comment</div>';
                        }
                       
                        
                        getComments($conn)
                        ?>
                        
                        
		</div>
		<div id="footer">

		</div>
	</body>
</html>
