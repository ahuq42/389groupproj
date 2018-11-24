

<?php
	require_once("support.php");

	$topPart = <<<EOBODY
		<form action="{$_SERVER['PHP_SELF']}" method="post">
			<strong>Loginid: </strong><input type="text" name="id" required="required" class="form-control"/><br><br>
			<strong>Password: </strong><input type="password" name="pw" required="required" class="form-control"/><br>

			<input type="submit" name="Login" /><br>
		</form>
EOBODY;

	$bottomPart = "";
	if (isset($_POST["Login"])) {
		$idValue = trim($_POST["id"]);
		$passwordValue = trim($_POST["pw"]);

		if ($idValue === "")
			$bottomPart .= "<strong>Loginid Missing</strong><br />";
		if ($passwordValue === "" || ($passwordValue !== "terps") || ($idValue!== "main"))
			$bottomPart .= "<strong>Error: Invalid Login Information</strong><br />";
		if ($bottomPart === "") {
			header("Location:adminPage.php");
		}
	}

	$body = $topPart.$bottomPart;
	$page = generatePage($body);
	echo $page;
?>

<form action="main.html">
	<input type="submit" value="Cancel" >
</form>
