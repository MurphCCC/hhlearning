<?php
include_once("config.php");	// Our DB connection resides here



	/*
	*
	*	A class to hold our functions to lock and unlock a row in the database for editing.  When a teacher begins editing a student
	*	we set a field called lock = 1.  When the teacher saves the entry, we set the flag back to zero.  Before a teacher begins
	*	editing, we want to check this flag and see if it is set or not.
	*
	*/
	class dbLocker

	{

		public function lock() {
			global $db_con;	// Our database connection, created in config.php

			$b= $db_con->prepare("UPDATE students SET `lock`= '1' WHERE student_id = :student_id");
			$b->bindParam(":student_id",$_GET['student_id'], PDO::PARAM_STR);
			$b->execute();
			$b = null;
		}


		public function lockClass($class) {
			$lock = 1;
			$clock = $class . 'lock';
			$cteacher = $class . '_teacher';
			global $db_con;	// Our database connection, created in config.php

			$b= $db_con->prepare("UPDATE students SET `$clock`= $lock, `$cteacher` = :teacher WHERE student_id = :student_id");
			$b->bindParam(":student_id",$_GET['student_id'], PDO::PARAM_STR);
			$b->bindParam(":teacher",$_SESSION['username'], PDO::PARAM_STR);
			$b->execute();
			$b = null;
		}

		public function unlockClass($id, $course) {
			$lock = 0;
			global $db_con;	// Our database connection, created in config.php

			$b= $db_con->prepare("UPDATE students SET `$course.'lock'`= $lock WHERE student_id = :student_id");
			$b->bindParam(":student_id",$id, PDO::PARAM_STR);
			$b->execute();
			$b = null;
		}

		// public function unlock() {
		// 	global $db_con;	// Our database connection, created in config.php

		// 	$b= $db_con->prepare("UPDATE students SET `lock`= '0' WHERE student_id = :student_id");
		// 	$b->bindParam(":student_id",$_POST['student_id'], PDO::PARAM_STR);
	 //    	$b->execute();
		// }

		//Function to unlock a single student when a student id is passed in.
		public function unlock($course, $id) {
			global $db_con;	// Our database connection, created in config.php

			$b= $db_con->prepare("UPDATE students SET `$course.'lock'`= '0' WHERE student_id = :student_id");
			$b->bindParam(":student_id",$id, PDO::PARAM_STR);
	    	$b->execute();
		}

		public function all() {
			global $db_con;	// Our database connection, created in config.php

			$b= $db_con->prepare("UPDATE students SET `lock`= '0'");
	    	$b->execute();
		}

	}



	$dblock = new dbLocker;



?>
