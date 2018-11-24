<h1> Rate Your Teacher </h1>


		<form action="submitted.php" method="post">
			<strong>Teacher Name: </strong><input type="text" name="name" required="required" class="form-control"/><br>
			<strong>Course: </strong><input type="text" name="course" required="required" class="form-control"/><br>
			<strong>Rating: </strong><input type="float" name="rating" required="required" class="form-control"/><br>
			<textarea name="comments" id="comments" rows=5 cols=60> </textarea>
      <input type="hidden" id="user" value=<?php $_POST['user']?>>
			<input type="hidden" id="password" value=<?php $_POST['password']?>>
			<input type="submit" name="submitInfoButton" /><br>
		</form>

    <form action="main.html">
      <input type="submit" value="Return to main menu" >
    </form>
