// This is the script to manage the modal for deleting our student.  We want to pass in the student's name, and id from the table and present the teacher with an accept or cancel button.  The accept button, when clicked should send a post request to the process.php?action=deleteStudent&student_id=student id.  The cancel button should just close the modal. 

$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});

// Button to trigger our Add Student modal
$('a.addStudent').click(function(){
  $('#addStudentModal').modal('open');
  return false;

})

// Stuff inside our Add student modal

// Make sure our first letter of each input field is uppercase and the rest are lowercase.  Remove any whitespace.
$('#student_name_first').keyup(function() {
        this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1).toLowerCase();
    });

$('#student_name_last').keyup(function() {
        this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1).toLowerCase();
    });

$('a.add-button').click(function(){
  $('#modal1').modal('close');
    student = document.getElementById('modal_student_id');
    first = document.getElementById('student_name_first').value.trim();
    last = document.getElementById('student_name_last').value.trim();
    console.log(first + ' ' + last);
    $.post('include/process.php?action=addStudent','first_name=' + first + '&last_name=' + last);
    Materialize.toast('Student Added', 4000, 'rounded red lighten-2');
    location.reload();
})
 

// Button to trigger Delete Student modal
$('a.deleteButton').click(function(){
  var id = $(this).attr('student_id');
  var name = $(this).attr('student_name').split('+');
  fullname = name[0] + ' ' + name[1];
  console.log(fullname);
  $('#modal1').modal('open');
  document.getElementById('student_id_goes_here').innerHTML = fullname + ' ?';
  document.getElementById('student_id_goes_here').innerHTML += '<input id="modal_student_id" type="hidden" value="'+id+'">';
  return false;

})

// Cancel button inside delete student modal
$('a.cancel-button').click(function(){
  document.getElementById('student_id_goes_here').innerHTML = 'No changes have been made to student';
  $('#modal1').modal('close');
  Materialize.toast('No changes made', 4000, 'rounded blue lighten-2') 
})

// Agreee button inside Delete Student modal
$('a.agree-button').click(function(){
  $('#modal1').modal('close');
    student = document.getElementById('modal_student_id');
    id = $(student).val();
    var student_id = "student_id="+id;
   $.post('include/process.php?action=deleteStudent','student_id='+id);
   console.log('include/process.php?action=deleteStudent','student_id='+id);
  console.log(id);
  Materialize.toast('Student deleted', 4000, 'rounded red lighten-2');
  location.reload(); 
})  

// Search the table by student name
function searchStudents() {
  var input, filter, table, tr, td, i;
  x = 0;
  input = document.getElementById("search");
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