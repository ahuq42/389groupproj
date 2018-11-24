<?php

include("Review.php");
$name = $_POST['name'];

$course = $_POST['course'];


require_once "dbLogin.php";

$db_connection = new mysqli('localhost', 'randomUser', 'thisisadatabase', 'RYPdb');
if ($db_connection->connect_error) {
  die($db_connection->connect_error);
}

/* Query */
$query = "select * from `reviews` where name='$name'";

/* Executing query */
$result = $db_connection->query($query);
if (!$result) {
  die("Retrieval failed: ". $db_connection->error);
} else {
  /* Number of rows found */
  $num_rows = $result->num_rows;
  if ($num_rows === 0 ) {
    echo "We could not find a match<br>";
  } else {
    for ($row_index = 0; $row_index < $num_rows; $row_index++) {
      $result->data_seek($row_index);
      $row = $result->fetch_array(MYSQLI_ASSOC);

      //echo "Name: {$row['name']}, Id: {$row['id']} <br>";
      // if (!password_verify($password, $row['password'])) {
      //   echo "No entry exists in the database for the specified email and password<br>";
      // }
      // else {
        $name=$row['name'];
        $course=$row['course'];
        $rating=$row['rating'];
        $comments=$row['comments'];

        $r = new Review($name, $course, $rating, $comments);
        echo $r->__toString();
      //}
    }
  }
}

/* Freeing memory */
$result->close();

/* Closing connection */
$db_connection->close();



?>

<form action="main.html">
	<input type="submit" value="Return to main menu" >
</form>
