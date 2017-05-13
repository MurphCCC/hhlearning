<?php

  class StudentList {
    public $student_id, $first_name, $last_name,
    $link, $count, $c1lock;

    public function __construct() {
      $this->name = "{$this->first_name} {$this->last_name}";
      $this->edit = "<a class='btn green lighten-2' href='edit/{$this->student_id}'> Edit Student <i class='material-icons left'>edit</i></a>";
    }
  }

  class CourseList {
    public $c1_teacher, $c1_course, $c1_grade, $c1_feedback, $c2_teacher, $c2_course, $c2_grade, $c2_feedback, $c3_teacher, $c3_course, $c3_grade, $c3_feedback,
    $c4_teacher, $c4_course, $c4_grade, $c4_feedback, $c5_teacher, $c5_course, $c5_grade, $c5_feedback, $c6_teacher, $c6_course, $c6_grade, $c6_feedback;
  }

?>
