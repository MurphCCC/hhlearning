<?php include_once("header.php");  ?>
<div class="container" style="margin-top:50px">
<div class="row">
<div class="widget ">
 <div id="formcontrols" class="tab-pane active">
 
 <div class="alert" id="error-msg">

 </div>
 
  <div class="alert alert-success" id="success-msg">

  </div>
                                                
                                                
                                            
                                            
								<form class="form-horizontal" id="add-student-form" method="get">

 									<fieldset>
										
										
										
										<div class="control-group">											
											<label for="firstname" class="control-label">First Name</label>
											<div class="controls">
												<input type="text" placeholder="First Name" name="first_name"  required id="first_name" class="span2">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="lastname" class="control-label">Last Name</label>
											<div class="controls">
												<input type="text" name="last_name" placeholder="Last Name" id="last_name" class="span2">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label for="c1course" class="control-label">C1 Course</label>
											<div class="controls">
												<input type="text" name="c1_course" placeholder="Course" id="c1_course" class="span3">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->									

										<div class="control-group">											
											<label for="c1teacher" class="control-label">Course 1 Teacher</label>
											<div class="controls">
												<input type="text" name="c1_teacher" placeholder="Teacher" id="c1_teacher" class="span3">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label for="c1grade" class="control-label">Course 1 Grade</label>
											<div class="controls">
												<input type="number" name="c1_grade" placeholder="Grade" id="c1_grade" class="span1">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->		

										<div class="control-group">											
											<label for="c1feedback" class="control-label">Course 1 Feedback</label>
											<div class="controls">
												<textarea name="c1_feedback" rows="10" placeholder="Feedback" id="c1_feedback" class="span3"></textarea> 
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->																			
										
										<br><br>
										

										
										
<!-- 										<div class="control-group">											
											<label for="password2" class="control-label">Confirm</label>
											<div class="controls">
												<input type="password" name="cpassword"  id="cpassword" class="span4">
											</div> <!-- /controls -->				
										</div> <!-- /control-group --> 
	
										 <br>
										
											
										<div class="form-actions">
											<button class="btn btn-primary" type="button" id="addStudent">Save</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
          </div>
          </div>
          </div>
          
         
          <?php include_once("footer.php");  ?>
