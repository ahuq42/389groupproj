<html>
<h1> Account created! </h1>

<form action="login.html">
	<input type="submit" value="Return to Login Page" >
</form>
</html>
<?php

include("Review.php");

$user = $_POST['user'];
$password = $_POST['password'];
$hashed = password_hash($password, PASSWORD_DEFAULT);



// var_dump($_POST);
$review = new Review("NULL", "NULL", -1, "NULL", $user, $hashed);
$review->addToDatabase();

?>

<!-- <form id="hiddenForm">
	<input type="hidden" id="user" name="user" value=<?php $user ?>>
	<input type="hidden" id="password" name="password" value=<?php $password ?>>
</form> -->

<!-- <script>
	document.forms["hiddenForm"].submit();
</script> -->
