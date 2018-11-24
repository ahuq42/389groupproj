<?php

include("Person.php");
$name = $_POST['name'];
$email = $_POST['email'];
$gpa = $_POST['gpa'];
$year = $_POST['year'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$hashed = password_hash($password, PASSWORD_DEFAULT);



$db_connection = new mysqli('localhost', 'dbuser', 'goodbyeWorld', 'applicationdb');
if ($db_connection->connect_error) {
  die($db_connection->connect_error);
}

/* Query */
$query = "update `applicants` set `name`='$name', `email` = '$email', `gpa` = '$gpa', `year` = '$year', `gender` = '$gender', `password` = '$hashed' where `email`='$email'";

$db_connection->query($query);

  $p = new Person($name, $email, $gpa, $year, $gender, $password);
  echo $p->__toString();


/* Closing connection */
$db_connection->close();



?>

<form action="main.html">
	<input type="submit" value="Return to main menu" >
</form>
