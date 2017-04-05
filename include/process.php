<?php
	$db_con = new PDO('mysql:host=localhost;dbname=updater', 'root', 'N0bigdeal');
	$error  = array();
	$res    = array();
	$success = "";
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "addStudent")
	{
		if(empty($_POST['first_name']))
		{
			$error[] = "First Name field is required";	
		}
		if(empty($_POST['last_name']))
		{
			$error[] = "Last Name field is required";	
		}
		if(empty($_POST['c1_course']))
		{
			$error[] = "Email field is required";	
		}
		if(empty($_POST['c1_teacher']))
		{
			$error[] = "User Name field is required";	
		}
		 
		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;	
			echo json_encode($resp);
			exit;
		}
		$pass = md5($_POST['password']);

		  $sqlQuery = "INSERT INTO students(first_name,last_name,c1_course,c1_teacher)
		  VALUES(:first_name,:last_name,:c1_course,:c1_teacher)";		   
		  $run = $db_con->prepare($sqlQuery);
		  $run->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);  
		  $run->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR); 
		  $run->bindParam(':c1_course', $_POST['c1_course'], PDO::PARAM_STR); 
		  $run->bindParam(':c1_teacher',$_POST['c1_teacher'], PDO::PARAM_STR); 
		  $run->bindParam(':c1_grade',$_POST['c1_grade'], PDO::PARAM_STR);
		  $run->bindParam(':c1_feedback',$_POST['c1_feedback'], PDO::PARAM_STR);
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
	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "editStudent")
	{
		
		if(empty($_POST['first_name']))
		{
			$error[] = "edit Student error1";	
		}
		if(empty($_POST['last_name']))
		{
			$error[] = "edit Student error2";	
		}
		if(empty($_POST['c1_course']))
		{
			$error[] = "edit Student error3";	
		}
		if(empty($_POST['c1_teacher']))
		{
			$error[] = "edit Student error4";	
		}
	


		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;	
			echo json_encode($resp);
			exit;
		}
		
		  $sqlQuery = "UPDATE students SET first_name = :first_name, 
		  				last_name = :last_name, 
		  				c1_course  = :c1_course, 
		  				c1_teacher = :c1_teacher,
		  				c1_grade   = :c1_grade,
		  				c1_feedback = :c1_feedback,
		  				c2_teacher = :c2_teacher,
		  				c2_grade   = :c2_grade,
		  				c2_feedback = :c2_feedback		  				
		  				 WHERE student_id = :student_id";
		  $run = $db_con->prepare($sqlQuery);
		  $run->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);  
		  $run->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR); 
		  $run->bindParam(':c1_course', $_POST['c1_course'], PDO::PARAM_STR); 
		  $run->bindParam(':c1_teacher',$_POST['c1_teacher'], PDO::PARAM_STR); 
		  $run->bindParam(':c1_grade', $_POST['c1_grade'], PDO::PARAM_STR);
		  $run->bindParam(':c1_feedback', $_POST['c1_feedback'], PDO::PARAM_STR);
		  $run->bindParam(':c2_course', $_POST['c2_course'], PDO::PARAM_STR); 
		  $run->bindParam(':c2_teacher',$_POST['c2_teacher'], PDO::PARAM_STR); 
		  $run->bindParam(':c2_grade', $_POST['c2_grade'], PDO::PARAM_STR);
		  $run->bindParam(':c2_feedback', $_POST['c2_feedback'], PDO::PARAM_STR);		  
		  $run->bindParam(':student_id', $_POST['student_id'], PDO::PARAM_STR);
		  $run->execute(); 
		  		   			if (!$run) {
					    echo "\nPDO::errorInfo():\n";
					    print_r($db_con->errorInfo());
					}	
		  $resp['msg']    = "Student" . gettype($_POST['student_id']) . "updated successfully";
		  $resp['status'] = true;	
		  echo json_encode($resp);
	  
		   exit; 	

	}
	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "deleteStudent")
	{
		  $sqlQuery = "DELETE FROM students WHERE student_id =  :student_id";
	      $run = $db_con->prepare($sqlQuery);
	      $run->bindParam(':student_id', $_POST['student_id'], PDO::PARAM_STR);   
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
