<?php
        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "root";
        $dbName = "tastyrecipes";

        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
        setComments($conn);

function setComments($conn){
    if(isset($_POST['commentSubmit'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
        
        header("Location: ../pancakes.php?comment=success");
	exit();
    }
    else{
        header("Location: ../pancakes.php?comment=error");
	exit();
    }
}
