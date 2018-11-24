<?php

include("Review.php");
$username = $_POST['username'];

$password = $_POST['pw'];

require_once "dbLogin.php";

$db_connection = new mysqli('localhost', 'randomUser', 'thisisadatabase', 'RYPdb');
if ($db_connection->connect_error) {
  die($db_connection->connect_error);
}

/* Query */
$query = "select * from `userReviews` where user='$username'";

/* Executing query */
$result = $db_connection->query($query);
if (!$result) {
  die("Retrieval failed: ". $db_connection->error);
} else {
  /* Number of rows found */
  $num_rows = $result->num_rows;
  if ($num_rows === 0 ) {
    header("loginError.php");//loginError.php
  } else {
    for ($row_index = 0; $row_index < $num_rows; $row_index++) {
      $result->data_seek($row_index);
      $row = $result->fetch_array(MYSQLI_ASSOC);

      //echo "Name: {$row['name']}, Id: {$row['id']} <br>";
      if (!password_verify($password, $row['password'])) {
        header("Location:loginError.php");
      }
      else {
        $name=$row['name'];
        $course=$row['course'];
        $rating=$row['rating'];
        $comments=$row['comments'];
        $user=$row['user'];
        $password=$row['password'];

        $r = new Review($name, $course, $rating, $comments, $user, $password);
        //echo $r->__toString();
      }
    }
  }
}

/* Freeing memory */
$result->close();

/* Closing connection */
$db_connection->close();

?>



<h1> Edit Professor Rating </h1>
    <form action="updated2.php" method="post">
			<strong>Name: </strong><input type="text" name="name" value=<?php echo $name ?> required="required" class="form-control"/><br>
			<strong>Course: </strong><input type="text" name="course" value=<?php echo $course ?> required="required" class="form-control"/><br>
      <strong>Rating: </strong><input type="float" name="rating" value=<?php echo $rating ?> required="required" class="form-control"/><br><br>
      <strong>Comments: </strong><input type="textarea" name="comments" rows=5 cols=60 value=<?php echo $comments?>><br>

			<input type="submit" name="submitInfoButton" /><br>
		</form>

    <form action="login.html">
      <input type="submit" value="Log out" >
    </form>
