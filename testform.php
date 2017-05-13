<?php
require "login/loginheader.php";

     $i = $_GET['course'];


  function printCourse($i) {

    include_once("include/config.php");
    include_once("include/functions.php");


    $fetch_student_info = $db_con->prepare("SELECT * from students where student_id = :student_id");

      $fetch_student_info->execute(array(':student_id' => $_GET['student_id']));
    $list = $fetch_student_info->fetch(PDO::FETCH_ASSOC);


    if ($list[$i.'lock'] != 0 && $list[$i.'_teacher'] != $_SESSION['username']) {
      echo 'try again';

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
          <input type="text" value="'.$list[$i._grade].'" name="'.$i.'_grade" required id="grade" class="validate">

        </div>
      </div>

      <div class="row">
        <div class="input-field col s10">
          <i class="material-icons prefix">mode_edit</i>
          <p>Feedback</p>
          <textarea rows="10" columns="10" value="'.$list[$i._feedback].'" name="'.$i.'_feedback" id="'.$i.'feedback" class="materialize-textarea">'.$list[$i._feedback].'</textarea>

        <h4><center>Last update: '.$time_stamp.'</center></h4>
        </div>
      </div>
      ';
      $b= $db_con->prepare("UPDATE students SET `".$i."lock`= '1', `".$i."_teacher` = :teacher WHERE student_id = :student_id");
			$b->bindParam(":student_id",$_GET['student_id'], PDO::PARAM_STR);
			$b->bindParam(":teacher",$_SESSION['username'], PDO::PARAM_STR);
			$b->execute();
			$b = null;
      }
  }

  printCourse($i);
