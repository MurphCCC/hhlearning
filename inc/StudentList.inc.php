<?php

  class StudentList {
    public $student_id, $first_name, $last_name,
    $link, $count;

    public function __construct() {
      $this->name = "{$this->first_name} {$this->last_name}";
      $this->edit = "<a class='btn green lighten-2' href='edit/{$this->student_id}'> Edit Student <i class='material-icons left'>edit</i></a>";
    }
  }
?>
