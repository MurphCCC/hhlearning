<?php

include_once("header.php");
include_once("include/config.php");
include_once("include/functions.php");
	   $fetch_student_info = $db_con->prepare("SELECT * from students where student_id = '490'");
     $fetch_student_info->execute(array(':student_id' => $_GET['student_id']));
	   $list = $fetch_student_info->fetch(PDO::FETCH_ASSOC);
		 $user = $_SESSION['username'];
		 $student = $list['first_name'] . ' ' . $list['last_name'];

		$courses = [];
		$teacher = [];
		$locks = [];
		  while ($i <= 14) {
		    array_push($courses, $list[$i.'_course']);
		    array_push($teacher, $list[$i.'_teacher']);
		    array_push($locks, $list[$i.'lock']);
		    $i++;
		  }

		 /*
		 *	Loop through our array of locked classes and look for the first one that is unlocked, then assign it to the current teacher.
		 */
		 function searchOpenClasses($i) {
			 global $locks;
			 global $list;
			 while ($i <= 14) {
				 if ($locks[$i] === NULL && $list[$i.'lock'] != 1) {
					 echo $i;
					 break 1;
				 } else {
					 $i++;
				 }
			 }
		 }

		 /*
		 *	Search through our array of teachers assigned to this student defined as an array $teacher.  If this teacher does have a class with this student,
		 *	this function will return position of the first match in the array.  We use this variable as the course number.  If their is no match then we will get
		 */
		 function searchTeachers($student) {
			 global $user;
			 global $courses;
			 global $teacher;
			 global $list;
			 $course_num = array_search($student, $teacher);
			 $classes = array_keys($teacher, $student);
			 if ($course_num != NULL) {
				 echo 'Teacher found at position: ' . (array_search($student, $teacher)) . '<br />';
				 echo 'The first course assigned to this teacher/student is: ' . $courses[$course_num] . '<br /> Now checking to see how many classes are assigned to this teacher <br />';
				 if (count(array_keys($teacher, $user)) > 1) {
					 echo 'This teacher has the following courses: <br />';
					//  $classes = array_keys($teacher, 'Mike Conrad');
					 $c = count($classes);
					 foreach ($classes as $class) {
						 echo $class . ' : ' . $courses[$class] . '<br>';
						 echo '
			       <div class="row">
			         <div class="input-field col s4">
			         <p">Class'.$i.' Course</p>
			           <input type="text" value="'.$list[$class."_course"].'" name="'.$class.'_course" required id="course" class="validate">
			         </div>
			       </div>

			       <div class="row">
			         <div class="input-field col s4">
			           <p>Class'.$class.' grade<p>
			           <input type="text" value="'.$list[$class."_grade"].'" name="'.$class.'_grade" required id="grade" class="validate">

			         </div>
			       </div>

			       <div class="row">
			         <div class="input-field col s10">
			           <i class="material-icons prefix">mode_edit</i>
			           <p>Feedback</p>
			           <textarea rows="10" columns="10" value="'.$list[$class."_feedback"].'" name="'.$class.'_feedback" id="'.$class.'feedback" class="materialize-textarea">'.$list[$class."_feedback"].'</textarea>

			         <h4><center>Last update: '.$time_stamp.'</center></h4>
			         </div>
			       </div>
			       ';
					 }
				 }
				 return $i = $classes[--$c];
			 } else {
				 echo 'Teacher is not currently assigned to any classes for this student.  Let\'s find an open class <br />';
				 searchOpenClasses(0);
			 }
		 }
?>

<div class="row">
<div class="container white" style="margin-top:50px">

	<form class="col s10 white" action="#" method="post">
		<div class="row">
			<div class="input-field col s5">
				<input placeholder="Placeholder" id="first_name" name="first_name" type="text" class="validate" value="<?= $list['first_name'] ?>">
				<label for="first_name">First Name</label>
			</div>
			<div class="input-field col s5">
				<input id="last_name" type="text" name="last_name" class="validate" value="<?= $list['last_name'] ?>">
				<label for="last_name">Last Name</label>
			</div>
		</div>

		<?php 
		 $x = searchTeachers($student);

		 searchOpenClasses($x);
?>


<div id="demo"></div>
				<div id="formcontrols" class="tab-pane active">
					<div class="form-actions" id="form-actions">
						<button class="btn orange lighten-2" type="button" onclick="nextClass()">Show my next class</button>

						<button class="btn btn-primary" type="submit" id="editStudent">Save</button>
						<button class="btn red lighten-2" type="button" id="cancel" onclick="window.location='index.php'">Cancel</button>
						<a href="print/<?php echo $list['student_id']?>" target="_blank"><button class="btn btn-info" type="button" id="print">Print full report</button></a>
					</div>
					<script>






						function nextClass() {

							x = '490';
							i = '<?php searchOpenClasses($x); ?>';
							var courses = [1, + i];
							if (i >= 14) {
								console.log('you have reached the limit');
							return;
							} else {
								if (courses.includes(i)) {
								courses.push(++i);
								console.log('i++ pushed by if statement');
								console.log(courses);
								// document.getElementById("classes").innerHTML = 'The next available class is ' + courses[courses.length - 1];
							} else {
								courses.push(i);
								console.log('i pushed by else statement');
							}
							}
							$.get('include/printCourse.php?course=' + i + '&student_id=' + x).done(function(res) {
							  // Ajax success
								document.getElementById("demo").innerHTML += res;
							});
							$.get('include/process.php?action=lock&course=' + i + 'lock&teacher=' + i + '_teacher&student_id=' + x).done(function(res) {
							  // Ajax success
								document.getElementById("demo").innerHTML += res;
							});

							 courses.push(++i);
							 console.log('I pushed at end of script');
						}

					 </script>
