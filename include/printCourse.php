<?php
$i = $_GET['course'];
$student_id = $_GET['student_id'];
function printNextCourse($i) {
  global $i;
  global $user;
  global $courses;
  global $teacher;
  global $list;
  global $db_con;	// Our database connection, created in config.php
  global $student_id;

  while ($i <= 14) {
    if ($list[$i.lock] != NULL) {
      echo $i . ' Class is taken, skipping to the next';
      $i++;
    } else {
      echo '
      <div class="row">
        <div class="input-field col s4">
        <p">Class'.$i.' Course</p>
          <input type="text" value="'.$list[$i."_course"].'" name="'.$i.'_course" required id="course" class="validate">
        </div>
      </div>

      <div class="row">
        <div class="input-field col s4">
          <p>Class'.$i.' grade<p>
          <input type="text" value="'.$list[$i."_grade"].'" name="'.$i.'_grade" required id="grade" class="validate">

        </div>
      </div>

      <div class="row">
        <div class="input-field col s10">
          <i class="material-icons prefix">mode_edit</i>
          <p>Feedback</p>
          <textarea rows="10" columns="10" value="'.$list[$i."_feedback"].'" name="'.$i.'_feedback" id="'.$i.'feedback" class="materialize-textarea">'.$list[$i."_feedback"].'</textarea>

        <h4><center>Last update: '.$time_stamp.'</center></h4>
        </div>
      </div>
      ';
      echo 'please help me!!!';
      break;
    }
    $i++;
  }

}
printNextCourse($i);

?>
