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

<!-- 	<div class="container" style="margin-top:50px">
		<div class="row"> -->
		  	<?php

  				if ($list['lock'] === '1' && $list['c1editor'] != $_SESSION['username']) {
 					echo '<div class="jumbotron">';
					echo '<h1> Sorry this student is currently being edited.</h1>';
					echo '</div>';

					
  
  				} else {

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

	while ($i <= 7) {
		$user = $_SESSION['username'];
		if ($list['c'.$i.'lock'] != 0 && $list['c'.$i.'_teacher'] != $_SESSION['username']) {

		} else {
			echo '
					<input type="hidden" value="'.$_GET["student_id"].'" name="student_id"></input>
					<div class="row">
						<div class="input-field col s4">
							<input type="text" value="'.$list[c.$i._course].'" name="c'.$i.'_course" required id="c'.$i.'course" class="validate">
							<label for="course">Class'.$i.' Course</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s4">
							<input type="text" value="'.$list[c.$i._grade].'" name="c'.$i.'_grade" required id="c'.$i.'grade" class="validate">
							<label for="course">Class'.$i.' grade</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s10">
							<i class="material-icons prefix">mode_edit</i>
							<textarea rows="10" columns="10" value="'.$list[c.$i._feedback].'" name="c'.$i.'_feedback" id="c'.$i.'feedback" class="materialize-textarea">'.$list[c.$i._feedback].'</textarea>
							<label for="feedback">Feedback</label>
	
						</div>
					</div>';
					break;
		}			$i++;
	}
?>

				<div id="formcontrols" class="tab-pane active">
					<div class="form-actions" id="form-actions">
						<button class="btn btn-primary" type="submit" id="editStudent">Save</button> 
						<button class="btn btn-danger" type="button" id="cancel" onclick="cancel()">Cancel</button>
						<a href="printStudent.php?student_id=<?php echo $list['student_id']?>" target="_blank"><button class="btn btn-info" type="button" id="print">Print full report</button></a>
					</div>

					</div>			
									
								</form>
								<?php }?>


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

			function cancel() {
				var id = '<?php echo $_GET["student_id"]?>';
				var course = '<?php echo $i ?>';
				$.get("include/process.php?unlock&student_id=" + id + "&course=" + course);
				window.location = 'index.php';
			}
</script>
          <script>
          	
          	var i = <?php echo $i; ?>;
          	
          	document.getElementById("c" +i+ "course").addEventListener("keyup", function(event) {
    			event.preventDefault();
    				if (event.keyCode == 13) {
        			document.getElementById("editStudent").click();
    				}	
			});

          	document.getElementById("c" +i+ "grade").addEventListener("keyup", function(event) {
    			event.preventDefault();
    				if (event.keyCode == 13) {
        			document.getElementById("editStudent").click();
    				}	
			});

			</script>


	<script>
	//Submit button for making changes to student
		$( "#editStudent" ).click(function() {
			event.preventDefault();
			console.log( $( "form" ).serialize() );
			 $.post("include/process.php?action=editStudent&", $("form").serialize());
			 // location.reload();
			Materialize.toast('Student updated successfully',2200);
		})

		$('#first_name').keyup(function() {
        	this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1).toLowerCase();
    	});
		$('#last_name').keyup(function() {
        	this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1).toLowerCase();
    	});
	</script>

         
          <?php 

          	include_once("footer.php");
          	$dblock->lockClass($i);

          ?>
