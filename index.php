<?php 
    include_once("header.php"); 
	  include_once("include/config.php");
    include_once("include/functions.php");
    require "login/loginheader.php";
    if (!$_GET['limit']) {
      $limit = 500;
    } else {
      $limit = $_GET['limit'];
    }
     //Select all students from DB
	   $statement = $db_con->prepare("SELECT * from students WHERE student_id > :student_id LIMIT 500");
     $statement->execute(array(':student_id' => 0));
     $list = $statement->fetchAll(PDO::FETCH_ASSOC);

      //Show number of students in the database
      $stmt = $db_con->prepare("SELECT student_id FROM students");
      $stmt->execute();
      $student_count = $stmt->rowCount();

?>


 <!-- Delete Student Modal -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Are you sure you want to delete: </h4>
      <h4 id="student_id_goes_here"></h4>

    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat agree-button">Delete</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat cancel-button">Cancel</a>
    </div>
  </div>

   <!-- Add Student Modal -->
  <div id="addStudentModal" class="modal">
    <div class="modal-content">
      <h4>Add Student</h4>
      <h4>First name:</h4><input type="text" name="first_name" id="student_name_first"></input>
      <h4/>Last name:<input type="text" name="last_name" id="student_name_last"></input>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat add-button">Add Student</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat cancel-button">Cancel</a>
    </div>
  </div>



  <div class="container" style="margin-top:50px" id="main-content">
  <a href="" class="waves-effect waves-light red btn modal-1 addStudent rounded">Add Student</a>
     <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="keywords" class="table striped white ligthen-2">
                <thead>
                  <tr>
                    <th><h4 />Name</th>
                  </tr>
                </thead>
                <tbody>
                
                 <?php
				foreach($list as $col)
				{
				  ?>
                  <tr id="row_num_<?= $col['student_id'];   ?>">
                    <td data-title="Name" id="students_name"><h5 /> <?= $col['first_name'] . ' ' . $col['last_name'] ?> </td>            
                      <td data-title="Actions">

                      <?php
                      $i = 1;
                        echo '
                          <a class="btn green lighten-2" href="editStudent.php?student_id='.$col[student_id].'">Edit Student<i class="material-icons left">edit</i></a>';
                      ?>
                    &nbsp&nbsp <a href="#modal1" class="waves-effect waves-light red btn modal-1 deleteButton" student_id=<?= $col['student_id'];?> student_name=<?= $col['first_name'] .'+'. $col['last_name'];?> id="deleteButton">Delete Student<i class="material-icons left">delete_forever</i></a>
                     &nbsp&nbsp<a class="btn blue lighten-2 "href="print-beta.php?student_id=<?= $col['student_id']?>" target="_blank">Print full report<i class="material-icons left">print</i></a>
                    </td>
                  </tr>
             
      
                  <?php } ?>
                   
                
                </tbody>
              </table>
<script>

</script>

</div>


											
											
          <?php include_once("footer.php");  ?>
