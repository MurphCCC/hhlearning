<?php
require "login/loginheader.php";

     $i = $_GET['course'];


  function printCourse($i) {

    include_once("include/config.php");
    include_once("include/functions.php");


    $fetch_student_info = $db_con->prepare("SELECT * from students where student_id = :student_id");
      $fetch_lock = $db_con->prepare("SELECT c1lock, c2lock, c3lock, c4lock, c5lock, c6lock, c7lock FROM students WHERE student_id = :student_id");
      $fetch_lock->execute(array(':student_id' => $_GET['student_id']));
      $locks = $fetch_lock->fetch(PDO::FETCH_ASSOC);
      $fetch_student_info->execute(array(':student_id' => $_GET['student_id']));
    $list = $fetch_student_info->fetch(PDO::FETCH_ASSOC);


    if ($list['c'.$i.'lock'] != 0 && $list['c'.$i.'_teacher'] != $_SESSION['username']) {
      ++$i;
    } else {
      echo '
      <div class="row">
        <div class="input-field col s4">
        <p">Class'.$i.' Course</p>
          <input type="text" value="'.$list["c".$i."_course"].'" name="c'.$i.'_course" required id="course" class="validate">
        </div>
      </div>

      <div class="row">
        <div class="input-field col s4">
          <p>Class'.$i.' grade<p>
          <input type="text" value="'.$list[c. $i ._grade].'" name="c'.$i.'_grade" required id="grade" class="validate">

        </div>
      </div>

      <div class="row">
        <div class="input-field col s10">
          <i class="material-icons prefix">mode_edit</i>
          <p>Feedback</p>
          <textarea rows="10" columns="10" value="'.$list[c.$i._feedback].'" name="c'.$i.'_feedback" id="c'.$i.'feedback" class="materialize-textarea">'.$list[c.$i._feedback].'</textarea>

        <h4><center>Last update: '.$time_stamp.'</center></h4>
        </div>
      </div>
      ';

        }
  }

  printCourse($i);
