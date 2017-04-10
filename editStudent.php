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
	   echo json_encode($locks['c2lock']);
	   echo $list['c2_course'];

?>


	<div class="container" style="margin-top:50px">
		<div class="row">
		  					<?php

  							if ($list['lock'] === '1') {
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
					</div> <!-- /form-actions -->
						<script>
							for (var i = 2; i <= 7; i++) {
								var button = '';
									button += '<button type="button" id="class'+ i  +'" class="btn btn-default" >Class '+ i +'</button>';
									document.getElementById("form-actions").innerHTML += button;
								};

								$("button#class2").one("click", function() {
									showClass(2);
								});

								$("button#class3").one("click", function() {
									showClass(3);
								});
								
								$("button#class4").one("click", function() {
									showClass(4);
								});							
								
								$("button#class5").one("click", function() {
									showClass(5);
								});	
								
								$("button#class6").one("click", function() {
									showClass(6);
								});												
								
								$("button#class7").one("click", function() {
									showClass(7);
								});												
						</script>
  
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
										 <!-- <?php
											$i = 1;
											$course = $list['c .$i. course'];
											echo $course;
											echo 'hello';
												while ($i <= 7) {
													if ($list['c'.$i.'lock'] != 0) {
														echo '<center>Sorry course '.$i.' is currently being edited by another teacher.</center>';
													} else {
														echo '<div class="control-group">';
														echo '<label for="course" class="control-label">Class'.$i.' Course</label>';
														echo '<div class="controls">';
		echo '<input type="text" value="'.$list[c.$i._course].'" name="c'.$i.'course" required id="c'.$i.'course" class="span6">';
														echo '</div></div>';

														break;
													}
													$i++;
												}

											?> -->
<?php
	while ($i <= 7) {
		if ($list['c'.$i.'lock'] != 0) {
			echo '<center>Sorry course '.$i.' is currently being edited by another teacher.</center>';
		} else {
			echo '<div class="control-group">';
			echo '<label for="course" class="control-label">Class'.$i.' Course</label>';
			echo '<div class="controls">';
			echo '<input type="text" value="'.$list[c.$i._course].'" name="c'.$i.'course" required id="c'.$i.'course" class="span6">';
			echo '</div></div>';

			echo '<div class="control-group">';
			echo '<label for="course" class="control-label">Class'.$i.' Teacher</label>';
			echo '<div class="controls">';
			echo '<input type="text" value="'.$list[c.$i._teacher].'" name="c'.$i.'teacher" required id="c'.$i.'teacher" class="span6">';
			echo '</div></div>';

			echo '<div class="control-group">';
			echo '<label for="course" class="control-label">Class'.$i.' grade</label>';
			echo '<div class="controls">';
			echo '<input type="text" value="'.$list[c.$i._grade].'" name="c'.$i.'grade" required id="c'.$i.'grade" class="span6">';
			echo '</div></div>';		
			break;
		}

		$i++;
	}
?>
<!-- 										 <script>

										 function showClass(num) {
										 	var course = '<?php echo $i; ?>';
										 	var html = '';
										 	console.log(num);
										 	html += '<div class="control-group">';
										    html += '<label for="class" class="control-label">Class '+ num + ' Course</label>';
										    html += '<div class="controls">';
										    html += '<input type="text" value="<?php echo '.$list[c.$i._course].';?>" name="c'+ num +'_course"   required id="c'+ num +'_course" class="span6">';
										    html += '</div>';
										    html += '</div>';

										 	html += '<div class="control-group">';
										    html += '<label for="class" class="control-label">Class '+ num + ' Teacher</label>';
										    html += '<div class="controls">';
										    html += '<input type="text" value="<?php echo $list['c'+ num +'_teacher']; ?>" placeholder="Teacher' + num +'"name="c'+ num +'_teacher"   required id="c'+ num +'_teacher" class="span6">';
										    html += '</div>';
										    html += '</div>';	

										 	html += '<div class="control-group">';
										    html += '<label for="class" class="control-label">Class '+ num + ' Grade</label>';
										    html += '<div class="controls">';
										    html += '<input type="number" value="<?php echo $list['c'+ num +'_grade']; ?>" placeholder="Grade' + num +'"name="c'+ num +'_grade"   required id="c'+ num +'_grade" class="span3">';
										    html += '</div>';
										    html += '</div>';	

										    html += '<div class="control-group">';
										    html += '<label for="class" class="control-label">Class '+ num + ' Feedback</label>';
										    html += '<div class="controls">';
										    html += '<textarea rows="10" value="" name="c'+ num +'_feedback" required id="c'+ num +'_feedback" class="span6"><?php echo $list['c'+ num +'_feedback']; ?></textarea>';
										    html += '</div>';
										    html += '</div>';										    									    
										 	document.getElementById('classx').innerHTML += html;
										 }

										</script>
										<script>
										showClass(3)
										</script> -->


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
          
         
          <?php 

          	include_once("footer.php");
          	$dblock->lockClass($i);

          ?>
