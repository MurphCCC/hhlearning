
<?php
	include_once("functions.php");
	require "../login/loginheader.php";
	require "config.php";
	$error  = array();
	$res    = array();
	$success = "";
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$student_id = $_REQUEST['student_id'];
	$_SESSION['first_name'] = $_POST['first_name'];
	if (isset($_GET['unlock'])) {
		$dblock->unlockClass($student_id, $_GET['course']);
	} else {};
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
		  $resp['msg']    = "Student added successfully";
		  $resp['status'] = true;
		   echo json_encode($resp);
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
			  $resp['msg']    = $first_name . $_SESSION['username'] . 'class Updated successfully';
			  $resp['status'] = true;	
			  echo json_encode($resp);
		   	  // $dblock->unlock($_POST['student_id']);
			  exit; 	
			}
			$i++;
		}
		  $sqlQuery = "UPDATE students SET first_name = :first_name, 
		  				last_name = :last_name, 
		  				c1_course  = :c1_course, 
		  				c1_teacher = :c1_teacher,
		  				c1_grade   = :c1_grade,
		  				c1_feedback = :c1_feedback
		  				 WHERE student_id = :student_id";
		  $run = $db_con->prepare($sqlQuery);
		  $run->bindParam(':first_name', $first_name, PDO::PARAM_STR);  
		  $run->bindParam(':last_name', $last_name, PDO::PARAM_STR); 
		  $run->bindParam(':c1_course', $_POST['c1_course'], PDO::PARAM_STR); 
		  $run->bindParam(':c1_teacher',$_POST['c1_teacher'], PDO::PARAM_STR); 
		  $run->bindParam(':c1_grade', $_POST['c1_grade'], PDO::PARAM_STR);
		  $run->bindParam(':c1_feedback', $_POST['c1_feedback'], PDO::PARAM_STR);		  
		  $run->bindParam(':student_id', $student_id, PDO::PARAM_STR);
		  $run->execute(); 
		  		   			if (!$run) {
					    echo "\nPDO::errorInfo():\n";
					    print_r($db_con->errorInfo());
					}	
		  $resp['msg']    = "Student" . gettype($_POST['student_id']) . "updated successfully";
		  $resp['status'] = true;	
		  echo json_encode($resp);
	   	  // $dblock->unlock($_POST['student_id']);
		  exit; 	
	}
	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "deleteStudent")
	{
		  $sqlQuery = "DELETE FROM students WHERE student_id =  :student_id";
	      $run = $db_con->prepare($sqlQuery);
	      $run->bindParam(':student_id', $student_id, PDO::PARAM_STR);   
	      $run->execute();
		  $resp['status'] = true;
		  $resp['msg'] = "Record deleted successfully";
		  echo json_encode($resp);
		  
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