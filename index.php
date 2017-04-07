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

     //Show currently locked students
     $count = $db_con->prepare("SELECT first_name, last_name from students WHERE `lock` = '1'") or die('didnt work');
     $count->execute();
     $locked = $count->fetchAll(PDO::FETCH_ASSOC);


      //Show number of students in the database
      $stmt = $db_con->prepare("SELECT student_id FROM students");
      $stmt->execute();
      $student_count = $stmt->rowCount();

      $dbLock = new dbLocker;
      $dbLock->all();

?>



<div class="container" style="margin-top:50px">
<div class="row">
   <div class="alert" id="error-msg"></div>
 
  <div class="alert alert-success" id="success-msg"></div>
<a href="include/functions.php?unlock" onclick="unlock()" class="deletebtn">Delete</a>

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
            <div class="widget-content">

              <table class="table table-striped table-bordered tablesorter" id="keywords">
                <thead>
                  <tr>
                    <th class="header">First Name</th>
                    <th class="header">Last Name</th>
                    <th class="header">Class 1 Course</th>
                    <th class="header">Class 1 Teacher</th>
<!--                     <th>Class 1 Grade</th>
                    <th> Class 1 Feedback</th> -->
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                
                <?php
				foreach($list as $col)
				{
				  ?>
                  <tr id="row_num_<?php echo $col['student_id'];   ?>">
                    <td> <?php echo $col['first_name'];  ?> </td>
                    <td> <?php 
                    echo $col['last_name']; 
                    ?> </td>
                    <td> <?php echo $col['c1_course'];  ?> </td>
                    <td> <?php echo $col['c1_teacher'];  ?> </td>
<!--                         <td> <?php echo $col['c1_grade'];  ?> </td>  
                       <td> <?php echo substr($col['c1_feedback'], 0, 50) . '...'; ?> </td>  -->                 
                    <td class="td-actions">
                      <?php
                      if ($col['lock'] == 1) {
                        echo 'Student is currently being edited';
                      } else {
                        echo '
                          <a class="btn btn-small btn-success" href="editStudent.php?student_id='.$col[student_id].'">
                            <i class="icon-large icon-edit"> </i>
                          </a>

                        ';
                      }
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
function sortFirstName() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

function sortLastName() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>
<script src="js/jquery.tablesorter.js"></script>
<script src="js/index.js"></script>
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
