<?php 
    include_once("header.php"); 
	  include_once("include/config.php");
    include_once("include/functions.php");
    if (!$_GET['limit']) {
      $limit = 50;
    } else {
      $limit = $_GET['limit'];
    }
     //Select all students from DB
	   $statement = $db_con->prepare("SELECT * from students WHERE student_id > :student_id LIMIT ".$limit."");
     $statement->execute(array(':student_id' => 0));
     $list = $statement->fetchAll(PDO::FETCH_ASSOC);

      //Show number of students in the database
      $stmt = $db_con->prepare("SELECT student_id FROM students");
      $stmt->execute();
      $student_count = $stmt->rowCount();

?>



<div class="container" style="margin-top:50px">
<div class="row">
   <div class="alert" id="error-msg"></div>
 
  <div class="alert alert-success" id="success-msg"></div>

  <form method="get" action="">
 <a class="btn btn-success" href="?limit=<?php echo $student_count?>" style="float:right">Display All Students</a>

 <a class="btn btn-success" href="?limit=100" name="limit" style="float:right">100</a>

 <a class="btn btn-success" href="?limit=50" name="limit" style="float:right">50</a> 
<!--  <a class="btn btn-success" href="?limit=" style="float:right">More</a>
 --> 
 <a class="btn btn-primary" href="addStudent.php" style="float:right">Add Student</a>

</form>

<div class="widget widget-table action-table">


            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Students</h3>
              <h3 style="float: right;">
                Displaying 1 - <?php echo $limit ?> of <?php print_r($student_count) ?></h3>
              <?php
              ?>
             
            </div>
            <!-- /widget-header -->
            <div class="widget-content" id="students_list">
            <input type="text" id="searchbar" onkeyup="searchStudents()" placeholder="Search for names.." title="Type in a name">

              <table class="table table-striped table-bordered tablesorter" id="keywords">
                <thead>
                  <tr>
                    <th class="header">Students Name</th>
                    <th class="header">Classes</th>
<!--                     <th class="header">Class 1 Teacher</th>
                    <th>Class 1 Grade</th> -->
<!--                     <th> Class 1 Feedback</th> -->
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                
                <?php
				foreach($list as $col)
				{
				  ?>
                  <tr id="row_num_<?php echo $col['student_id'];   ?>">
                    <td> <?php echo $col['first_name'] . ' ' . $col['last_name']; ?> </td>                 
                    <td class="td-actions">
                      <?php
                      $i = 1;
                        echo '
                          <a class="btn btn-small btn-success" href="editStudent.php?student_id='.$col[student_id].'">Edit Student</a>';
                      ?>
                     <a class="btn btn-danger btn-small" onClick="getStudentId(<?php echo $col['student_id'];   ?>)"   href="javascript:void(0)">
                      <i class="btn-icon-only icon-remove"></i>
                     </a>
                    </td>
                  </tr>
             
                  
                  <?php } ?>
                   
                
                </tbody>
              </table>

<script>
<!--  Search the table by student name -->
function searchStudents() {
  var input, filter, table, tr, td, i;
  x = 0;
  input = document.getElementById("searchbar");
  filter = input.value.toUpperCase();
  table = document.getElementById("keywords");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script src="js/student.js"></script>

</div>
<script src="js/jquery.tablesorter.js"></script>
          </div>
            <!-- /widget-content --> 
          </div>
          </div>
          </div>

          
         
      
												
											
													 <!-- Button to trigger modal -->
                                                   
                                                     
                                                    <!-- Modal -->
                                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h3 id="myModalLabel">Alert</h3>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>Are you sure you want to delete record</p>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                        <button class="btn btn-primary" onClick="deleteStudent()">Delete</button>
                                                      </div>
                                                    </div>
											
											
          <?php include_once("footer.php");  ?>
