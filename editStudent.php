<?php include_once("header.php");
	  include_once("include/config.php");
	   $fetch_student_info = $db_con->prepare("SELECT * from students where student_id = :student_id");
       $fetch_student_info->execute(array(':student_id' => $_GET['student_id']));
	   $list = $fetch_student_info->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container" style="margin-top:50px">
<div class="row">
<div class="widget ">
 <div id="formcontrols" class="tab-pane active">
 
  <div class="alert" id="error-msg">

 </div>
 
  <div class="alert alert-success" id="success-msg">

  </div>
  
								<form class="form-horizontal" id="edit-student-form" method="post">
									<fieldset>
										<input type="hidden" name="student_id" value="<?php echo $list[0]['student_id']; ?>">
										
										<div class="control-group">											
											<label for="firstname" class="control-label">First Name</label>
											<div class="controls">
												<input type="text" value="<?php echo $list[0]['first_name']; ?>"  placeholder="First Name" name="first_name"  required id="first_name" class="span6">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="lastname" class="control-label">Last Name</label>
											<div class="controls">
												<input type="text" value="<?php echo $list[0]['last_name']; ?>" name="last_name" placeholder="Last Name" required id="last_name" class="span6">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->										

										<div class="control-group">											
											<label for="username" class="control-label">Course 1 Class</label>
											<div class="controls">
												<input type="text" value="<?php echo $list[0]['c1_course']; ?>" placeholder="Course 1" name="c1_course"   required id="c1_course" class="span6">
<!-- 												<p class="help-block">Your username is for logging in and cannot be changed.</p>
 -->											</div> <!-- /controls -->				
										</div> <!-- /control-group -->	

										<div class="control-group">											
											<label for="username" class="control-label">Course 1 Teacher</label>
											<div class="controls">
												<input type="text" value="<?php echo $list[0]['c1_teacher']; ?>" placeholder="Course 1 Teacher" name="c1_teacher"   required id="c1_teacher" class="span6">
<!-- 												<p class="help-block">Your username is for logging in and cannot be changed.</p>
 -->											</div> <!-- /controls -->				
										</div> <!-- /control-group -->		

										<div class="control-group">											
											<label for="username" class="control-label">Course 1 Grade</label>
											<div class="controls">
												<input type="text" value="<?php echo $list[0]['c1_grade']; ?>" placeholder="Course 1 Grade" name="c1_grade" id="c1_grade" class="span6">
<!-- 												<p class="help-block">Your username is for logging in and cannot be changed.</p>
 -->											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
														
	
										<div class="control-group">											
											<label for="username" class="control-label">Course 1 Feedback</label>
											<div class="controls">
												<textarea rows="10" value="" placeholder="Course 1 Feedback" name="c1_feedback" id="c1_feedback" class="span6"><?php echo $list[0]['c1_feedback']?>
												</textarea>
<!-- 												<p class="help-block">Your username is for logging in and cannot be changed.</p>
 -->											</div> <!-- /controls -->				
										</div> <!-- /control-group -->	
										 <br>
										
											
										<div class="form-actions">
											<button class="btn btn-primary" type="button" id="editStudent">Save</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
          </div>
          </div>
          </div>
          
         
          <?php include_once("footer.php");  ?>
