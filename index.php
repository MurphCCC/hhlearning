<?php include_once("header.php"); 
	  include_once("include/config.php");
    if (!$_GET['limit']) {
      $limit = 50;
    } else {
      $limit = $_GET['limit'];
    }

    if (!$_GET['sort']) {
      $sort = first_name;
    } else {
      $sort = $_GET['sort'];
    }

	   $statement = $db_con->prepare("SELECT * from students WHERE student_id > :student_id ORDER BY ".$sort." LIMIT ".$limit."");
     $statement->execute(array(':student_id' => 0));

	   $list = $statement->fetchAll(PDO::FETCH_ASSOC);

      $stmt = $db_con->prepare("SELECT student_id FROM students");
      $stmt->execute();
      $student_count = $stmt->rowCount();
?>

<div class="container" style="margin-top:50px">
<div class="row">
   <div class="alert" id="error-msg">

 </div>
 
  <div class="alert alert-success" id="success-msg">

  </div>
  <br>
  <br>
  <form method="get" action="">
 <a class="btn btn-success" href="?limit=<?php echo $student_count?>" style="float:right">Display All Students</a>
&nbsp&nbsp

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
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> <a href="?sort=first_name">First Name </a></th>
                    <th> <a href="?sort=last_name">Last Name</th>
                    <th> <a href="?sort=c1_course">Course 1 Class</th>
                    <th> <a href="?sort=c1_teacher">Course 1 Teacher</th>
                    <th> <a href="?sort=c1_grade">Course 1 Grade</th>
                    <th> Course 1 Feedback</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                
                <?php
				foreach($list as $col)
				{
				  ?>
                  <tr id="row_num_<?php echo $col['student_id'];   ?>">
                    <td contenteditable="true"> <?php echo $col['first_name'];  ?> </td>
                    <td> <?php echo $col['last_name'];  ?> </td>
                     <td> <?php echo $col['c1_course'];  ?> </td>
                      <td> <?php echo $col['c1_teacher'];  ?> </td>
                        <td> <?php echo $col['c1_grade'];  ?> </td>  
                       <td> <?php echo substr($col['c1_feedback'], 0, 50) . '...'; ?> </td>                      
                    <td class="td-actions"><a class="btn btn-small btn-success" href="editStudent.php?student_id=<?php echo $col['student_id'];   ?>"><i class="icon-large icon-edit"> </i></a><a class="btn btn-danger btn-small" onClick="getStudentId(<?php echo $col['student_id'];   ?>)"   href="javascript:void(0)"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
             
                  
                  <?php } ?>
                   
                
                </tbody>
              </table>
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
