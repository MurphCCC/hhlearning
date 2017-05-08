
<?php
	include_once("functions.php");
	require "../login/loginheader.php";
	require "config.php";
	$error  = array();
	$res    = array();
	$success = "";
	$first_name = ucwords($_REQUEST['first_name']);
	$last_name = ucwords($_REQUEST['last_name']);
	$student_id = $_REQUEST['student_id'];
	$_SESSION['first_name'] = $_POST['first_name'];

	if (isset($_GET['unlock'])) {
		$dblock->unlockClass($student_id, $_GET['course']);
	} else {};


		/*												ADD STUDENT
		*		Code to add a student to our database.  This information is passed in from a form
		*		on our main page, the form is currently embedded into the header of each page but
		*		I haven't tested whether or not it will work on all pages just yet
		*/

	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "addStudent")
	{
		if(empty($first_name))
		{
			$error[] = "First Name field is required";
		}
		if(empty($last_name))
		{
			$error[] = "Last Name field is required";
		}

		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;
			echo json_encode($resp);
			exit;
		}
		  $sqlQuery = "INSERT INTO students(first_name,last_name)
		  VALUES(:first_name,:last_name)";
		  $run = $db_con->prepare($sqlQuery);
		  $run->bindParam(':first_name', $first_name, PDO::PARAM_STR);
		  $run->bindParam(':last_name', $last_name, PDO::PARAM_STR);
		  $run->execute();

			echo $first_name ." ". $last_name ." added successfully!";
			exit;
			if (!$run) {
			    echo "\nPDO::errorInfo():\n";
			    print_r($db_con->errorInfo());
			}
	}

	// Check if our action parameter is set and if it is set to editStudent.  This gets appended to the url in include/student.js
	// for the onclick action.  The save button click is handled by include/student.js
	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "editStudent")
	{
		$teacher = $_SESSION['username'];
		//	Check which class we are working with and update it accordingly.
		$i = 1;
		while ($i <= 7) {
			if (isset($_REQUEST['c'.$i.'_course'])) {
				$sqlQuery = "UPDATE students SET first_name = :first_name,
							last_name = :last_name,
							c".$i."_course  = :c".$i."_course,
			  				c".$i."_grade   = :c".$i."_grade,
			  				c".$i."_feedback = :c".$i."_feedback,
			  				c".$i."_updated = now()
			  				 WHERE student_id = :student_id";
			  $run = $db_con->prepare($sqlQuery);
			  $run->bindParam(':student_id', $student_id, PDO::PARAM_STR);
			  $run->bindParam(':first_name', $first_name, PDO::PARAM_STR);
			  $run->bindParam(':last_name', $last_name, PDO::PARAM_STR);
			  $run->bindParam(':c'.$i.'_course', $_REQUEST['c'.$i.'_course'], PDO::PARAM_STR);
			  $run->bindParam(':c'.$i.'_grade', urlencode($_REQUEST['c'.$i.'_grade']), PDO::PARAM_STR);
			  $run->bindParam(':c'.$i.'_feedback', $_REQUEST['c'.$i.'_feedback'], PDO::PARAM_STR);
			  $run->execute();

			  		   			if (!$run) {
						    echo "\nPDO::errorInfo():\n";
						    print_r($db_con->errorInfo());
						}
						echo $first_name . ' ' . $last_name . ' ' . ' has been Updated Successfully';

			  exit;
			}
			$i++;
		}
	}


	/* 														DELETE STUDENT
	*	 Our code to delete a student from the database.  We look to make sure that deleteStudent is
	*	 passed in the query string and if so we take the student id and pass it into the database.
	*/
	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "deleteStudent")
	{
		  $sqlQuery = "DELETE FROM students WHERE student_id =  :student_id";
	      $run = $db_con->prepare($sqlQuery);
	      $run->bindParam(':student_id', $student_id, PDO::PARAM_STR);
	      $run->execute();
				echo $first_name ." ". $last_name ." deleted successfully!";	// Our success message when a student is deleted.  Currently the name fields are blank cause we arent actually doing any SELECT statements in the database, we are simply using the ID to delete the student.  If we want to return a success message with the students name, we would need to grab that information either from the database by doing a lookup, or by storing it in a session.
		  exit;

	}

	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "listStudent")
	{
	    $statement = $db_con->prepare("SELECT * froms student where student_id > :student_id");
        $statement->execute(array(':student_id' => 0));
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
		echo "<pre>";
		print_r($row);
		echo "</pre>";
	}
?>
