<?php

include("Review.php");
$name = $_POST['name'];
$course = $_POST['course'];
$rating = $_POST['rating'];
$comments = $_POST['comments'];
$user = $_POST['user'];
$password = $_POST['password'];



$review = new Review($name, $course, $rating, $comments, $user, $password);
echo $review->__toString();
echo $review->addToDatabase();
?>

<form action="main.html">
	<input type="submit" value="Return to main menu" >
</form>
