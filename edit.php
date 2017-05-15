<?php
	  include_once("header.php");
	  include_once("include/config.php");
	  include_once("include/functions.php");
	   $fetch_student_info = $db_con->prepare("SELECT * from students where student_id = :student_id");
		 $fetch_student_info->execute(array(':student_id' => $_GET['student_id']));
	   $list = $fetch_student_info->fetch(PDO::FETCH_ASSOC);
	   $i = 1;
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
			<input type="hidden" value="<?php echo $_GET["student_id"]; ?>" name="student_id"></input>

<?php


		for ($i = 1; $i <= 7; $i++) {
				while ($i <= 7) {
					if ($list[$i.'lock'] != 0 && $list[$i.'_teacher'] != $_SESSION['username']) { //If lock field is set and the teacher associated with that lock is not the authenticated user, do nothing and move on to the next class.
							$i++;
							continue;
					}  else {
									$time_stamp = $list[$i._updated];

									echo '

											<div class="row">
												<div class="input-field col s4">
													<input type="text" value="'.$list[$i._course].'" name="'.$i.'_course" required id="course" class="validate">
													<label for="course">Class'.$i.' Course</label>
												</div>
											</div>

											<div class="row">
												<div class="input-field col s4">
													<input type="text" value="'.$list[$i._grade].'" name="'.$i.'_grade" required id="grade" class="validate">
													<label for="course">Class'.$i.' grade</label>
												</div>
											</div>

											<div class="row">
												<div class="input-field col s10">
													<i class="material-icons prefix">mode_edit</i>
													<textarea rows="10" columns="10" value="'.$list[$i._feedback].'" name="'.$i.'_feedback" id="'.$i.'feedback" class="materialize-textarea">'.$list[$i._feedback].'</textarea>
													<label for="feedback">Feedback</label>
												<h4><center>Last update: '.$time_stamp.'</center></h4>
												</div>
											</div>';
											$dblock->lockClass($i);

											if ($list[$i.'lock'] != 1) {
												break 2;
											}
							}
							// This block of code will display the next numerical available class.  Before I added this last block, the code would skip a number so I could never get the next available class, I would get the next one after the next available.  So for example if I had a lock on class 7 but their was no lock on class 8, I would get class 9 as my only option.
							if ($list[$i.'_teacher'] != $_SESSION['username']) {
								continue;
							} else {
								break 1;
							}
							$i++;

				}

	}


?>
<p id="classes"><?php echo $i;?></p>
<div id="demo"></div>
				<div id="formcontrols" class="tab-pane active">
					<div class="form-actions" id="form-actions">
						<button class="btn pink darken-2 rounded" type="button" id="loadNextClass" onclick="nextClass()">Edit next available class</button>
						<button class="btn green lighten-2 rounded" type="submit" id="editStudent">Save</button>
						<button class="btn red darken-2 rounded" type="button" id="cancel" onclick="window.location='index.php'">Cancel</button>
						<a href="print/<?php echo $list['student_id']?>" target="_blank"><button class="btn btn-info" type="button" id="print">Print full report</button></a>
					</div>
					<script>


						i = '<?php echo $i ?>';
						var courses = [1, + i];

						console.log(course);
					  c = courses[courses.length - 1];
						x = '<?php echo $_GET['student_id'] ?>';

					    function nextClass() {
					      if (i >= 14) {
									console.log('you have reached the limit');
					      return;
					      } else {
					        if (courses.includes(i)) {
					        courses.push(++i)
					        console.log(courses);
					        document.getElementById("classes").innerHTML = 'The next available class is ' + courses[courses.length - 1];
								} else {
									courses.push(i);
								}
					    	}
								 var xhttp = new XMLHttpRequest();
							   xhttp.onreadystatechange = function() {
							  	 if (this.readyState == 4 && this.status == 200) {
												document.getElementById("demo").innerHTML += this.responseText;
							  	 }
							   };
							   xhttp.open("GET", "testform.php?course=" + courses[courses.length - 1] + "&student_id=" + x, true);
							   xhttp.send();
					    }

					 </script>

					</div>

								</form>
								</div>
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
		</script>
          <script>

          	var i = <?php echo $i; ?>;


          	document.getElementById(i + "_course").addEventListener("keyup", function(event) {
    			event.preventDefault();
    				if (event.keyCode == 13) {
        			document.getElementById("editStudent").click();
    				}
			});

          	document.getElementById(i + "_grade").addEventListener("keyup", function(event) {
    			event.preventDefault();
    				if (event.keyCode == 13) {
        			document.getElementById("editStudent").click();
    				}
			});

			</script>


	<script>
	//Submit button for making changes to student
	$( "#editStudent" ).click(function(event) {
		event.preventDefault();
		student = $("form").serialize(); // Serialize our form entry into a variable

		 $.post("include/process.php?action=editStudent& " + student, // Include our serialized form data in our post request
				function(d, s){ // Return a response from our process.php script to the user
					console.log(student);
					Materialize.toast(d, 2200); // Display a toast with the database response
					// setTimeout(location.reload.bind(location), 2500); // Reload our page

	 });


	})
		// Make sure that entries in our form start with uppercase letters regardless of what the user types.
		$('#first_name, #last_name, #course').keyup(function() {
        	this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1);
    	});


	</script>


          <?php

          	include_once("footer.php");

          ?>
