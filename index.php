<?php 
include_once("header.php"); 
include("inc/StudentList.inc.php");

  
  try {
    $query = $db_con->query("SELECT * from students");
    $query->setFetchMode(PDO::FETCH_CLASS, "StudentList");
    echo "Prepare statment" . memory_get_usage() . "\n";
  } catch(PDOException $e) {
    echo $e->getMessage();
  }

  $colcount = $query->rowCount();

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
  <script src="js/student.js"></script>


  <div class="container" style="margin-top:50px" id="main-content">
  <div class="table-responsive-vertical shadow-z-1">
    <table id="keywords" class="table striped white ligthen-2" style="display: block; height: 80vh; overflow-y: auto;">
      <thead>
          <tr>
            <th><h4 />Name</th>
            <th><h4 />Showing: <?= $colcount ?> Students.</th>
          </tr>
      </thead>
        <tbody>
                
        <!--  Start our While loop  -->
        <?php while ($s = $query->fetch()) {?> 

          <td data-title='Name' id='students_name'><h5><?= $s->name; ?></h5></td>
          <td data-title="Actions">
          <?= $s->edit; ?>
            <a href="#modal1" class="waves-effect waves-light red btn modal-1 deleteButton" student_id=<?= $s->student_id;?> student_name=<?php $s->name ;?> id="deleteButtonModal">Delete Student<i class="material-icons left">delete_forever</i></a>
            <a class="btn blue lighten-2 "href="print/<?= $s->student_id?>" target="_blank">Print full report<i class="material-icons left">print</i></a>
          </td>
          </tr>
             
                  <!--  End our While loop -->
                  <?php } echo memory_get_usage() . "\n";?> 
                   
                
        </tbody>
      </table>
      
      <script type="text/javascript">// Button to trigger Delete Student modal

      $('a.deleteButton').click(function(event){
        event.preventDefault();
        console.log('is this thing on?');
        var id = $(this).attr('student_id');
        var name = $(this).attr('student_name').split('+');
        fullname = name[0] + ' ' + name[1];
        console.log(fullname);
        console.log('delete button clicked');
        // $('#modal1').modal('open');
        document.getElementById('student_id_goes_here').innerHTML = fullname + ' ?';
        document.getElementById('student_id_goes_here').innerHTML += '<input id="modal_student_id" type="hidden" value="'+id+'">';

      })
      </script>
 </div>


											
											
  <?php include_once("footer.php");  ?>
