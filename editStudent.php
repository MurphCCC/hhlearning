<?php 
	  include_once("header.php");
	  include_once("include/config.php");
	  include_once("include/functions.php");
	   $fetch_student_info = $db_con->prepare("SELECT * from students where student_id = :student_id");
       $fetch_lock = $db_con->prepare("SELECT c1lock, c2lock, c3lock, c4lock, c5lock, c6lock, c7lock FROM students WHERE student_id = :student_id");
       $fetch_lock->execute(array(':student_id' => $_GET['student_id']));
       $locks = $fetch_lock->fetch(PDO::FETCH_ASSOC);
       $fetch_student_info->execute(array(':student_id' => $_GET['student_id']));
	   $list = $fetch_student_info->fetch(PDO::FETCH_ASSOC);

	   $i = 1;

?>


	<div class="container" style="margin-top:50px">
		<div class="row">
		  					<?php

  							if ($list['lock'] === '1' && $list['c1editor'] != $_SESSION['username']) {
  								echo '<div class="jumbotron">';
  								echo '<h1> Sorry this student is currently being edited.</h1>';
  								echo '</div>';
  								
  							} else {

  							?>
			<div class="widget ">
				<div id="formcontrols" class="tab-pane active">
					<div class="form-actions" id="form-actions">
						<button class="btn btn-primary" type="button" id="editStudent">Save</button> 
						<button class="btn btn-danger" type="button" id="cancel" onclick="cancel()">Cancel</button>
						<a href="print-beta.php?student_id=<?php echo $list['student_id']?>" target="_blank"><button class="btn btn-info" type="button" id="print">Print full report</button></a>
					</div> <!-- /form-actions -->

  
  							<div class="alert" id="error-msg">

 							</div>
 
  							<div class="alert alert-success" id="success-msg">

  							</div>
								<form class="form-horizontal" id="edit-student-form" method="post">
	

 									<fieldset>
										<input type="hidden" name="student_id" value="<?php echo $list['student_id']; ?>">
										
										<div class="control-group">											
											<label for="firstname" class="control-label">First Name</label>
											<div class="controls">
												<input type="text" value="<?php echo $list['first_name']; ?>"  placeholder="First Name" name="first_name"  required id="first_name" class="span6">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="lastname" class="control-label">Last Name</label>
											<div class="controls">
												<input type="text" value="<?php echo $list['last_name']; ?>" name="last_name" placeholder="Last Name" required id="last_name" class="span6">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										

										<!--  -->
										 <br>
										 <div name="classx" id="classx">
										
<?php

	while ($i <= 7) {
		$user = $_SESSION['username'];
		if ($list['c'.$i.'lock'] != 0 && $list['c'.$i.'_teacher'] != $_SESSION['username']) {
			echo 'Course '.$i.' is currently being edited by <strong>' . $list['c'.$i . '_teacher'] . '</strong><br>';
		} else {
			echo '<div class="control-group">';
			echo '<label for="course" class="control-label">Class'.$i.' Course</label>';
			echo '<div class="controls">';
			echo '<input type="text" value="'.$list[c.$i._course].'" name="c'.$i.'_course" required id="c'.$i.'course" class="span6">';
			echo '</div></div>';

			// echo '<div class="control-group">';
			// echo '<label for="course" class="control-label">Class'.$i.' Teacher</label>';
			// echo '<div class="controls">';
			// echo '<input type="text" value="'.$list[c.$i._teacher].'" name="c'.$i.'_teacher" required id="c'.$i.'teacher" class="span6">';
			// echo '</div></div>';

			echo '<div class="control-group">';
			echo '<label for="course" class="control-label">Class'.$i.' grade</label>';
			echo '<div class="controls">';
			echo '<input type="text" value="'.$list[c.$i._grade].'" name="c'.$i.'_grade" required id="c'.$i.'grade" class="span6">';
			echo '</div></div>';

			echo '<div class="control-group">';
			echo '<label for="feedback" class="control-label">Feedback</label>';
			echo '<div class="controls">';
			echo '<textarea rows="10" columns="10" value="'.$list[c.$i._feedback].'" name="c'.$i.'_feedback" id="c'.$i.'_feedback"class="span6">'.$list[c.$i._feedback].'</textarea>';		
			echo '</div></div>';

			break;
		}

		$i++;
	}
?>



										</div>
										<div id="classButtons">
										</div>										
									</fieldset>
								</form>
								<?php }?>
								</div>
          </div>
          </div>
          </div>
          <script>
          function myfun(){
     		console.log('Hello \nThere');
     		

     		$.get("include/process.php?unlock&student_id=" + id);
		}
			$(window).bind('beforeunload', function(){
	  		myfun();
	  		return 'You are currently editing a student.  If you leave now, your changes will be lost.  Leave?';
	  		
	});

			function cancel() {
				var id = '<?php echo $_GET["student_id"]?>';
				var course = '<?php echo $i ?>';
				$.get("include/process.php?unlock&student_id=" + id + "&course=" + course);
				window.location = 'index.php';
			}
</script>
          <script>
          	for (i = 1; i <= 7; i++) {
          	document.getElementById("c" + i + "course").addEventListener("keyup", function(event) {
    			event.preventDefault();
    				if (event.keyCode == 13) {
        			document.getElementById("editStudent").click();
    				}	
			});
          };

			</script>

			<script>
			          	for (i = 1; i <= 7; i++) {
          	document.getElementById("c" + i + "grade").addEventListener("keyup", function(event) {
    			event.preventDefault();
    				if (event.keyCode == 91 && 82) {
        			document.getElementById("editStudent").click();
    				}	
			});
          }
			</script>

         
          <?php 

          	include_once("footer.php");
          	$dblock->lockClass($i);

          ?>
