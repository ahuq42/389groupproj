<?php
	//declare(strict_types=1);


	class Review {
		private $name;
		private $course;
		private $rating;
		private $comments;
		private $user;
		private $password;



		public function __construct(string $name, string $course, float $rating,
			string $comments, string $user, string $password) {
			$this->name = $name;
			$this->course = $course;
			$this->rating = $rating;
			$this->comments = $comments;
			$this->user = $user;
			$this->password = $password;
		}

		public function __toString() {
			return "<b>Teacher Name:</b> ".$this->name."<br><b>Course:</b> ".$this->course.
			"<br><b>Rating:</b> ".$this->rating."<br><b>Comments:</b> ".$this->comments.
			"<br>".$this->user."<br";
		}

		public function getName() : string {
			return $this->name;
		}

		public function getCourse() : string {
			return $this->course;
		}

		public function getRating() : float {
			return $this->rating;
		}

		public function getComments() : string {
			return $this->comments;
		}

		public function getUser() : string {
			return $this->user;
		}

		// public function setName(string $name){
		// 	$this->name = $name;
		// }



		public function addToDatabase(){
			require_once "dbLogin.php";
			//$table = "applicants";
			$db_connection = new mysqli('localhost', 'randomUser', 'thisisadatabase', 'RYPdb');
			if ($db_connection->connect_error) {
				die($db_connection->connect_error);
			}

			/* Query */

			$query = "insert into `userReviews` values ('$this->name','$this->course','$this->rating','$this->comments','$this->user','$this->password')";
			//$query = "insert into applicants (name, email, gpa, year, gender, password) values($this->name, $this->email, $this->gpa, $this->year, $this->gender, $this->password)";

			/* Executing query */
			$result = $db_connection->query($query);
			if (!$result) {
				die("Insertion failed: " . $db_connection->error);
			}

			/* Closing connection */
			$db_connection->close();

		}
	}
?>
