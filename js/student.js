// This is the script to manage the modal for deleting our student.  We want to pass in the student's name, and id from the table and present the teacher with an accept or cancel button.  The accept button, when clicked should send a post request to the process.php?action=deleteStudent&student_id=student id.  The cancel button should just close the modal.

$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});

// Button to trigger our Add Student modal
$('a.addStudent').click(function(event){
  event.preventDefault();
  event.stopPropagation();
  $('#addStudentModal').modal('open');
  console.log('is this thing on add student?');
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

$('a.add-button').click(function(event){
  event.preventDefault();
  student = document.getElementById('modal_student_id');
  first = document.getElementById('student_name_first').value.trim();
  last = document.getElementById('student_name_last').value.trim();
  // if (first.value != '' || first.value != first.defaultValue) {
  //   alert('Please fill out First Name');
  //   return false;
  // }
  //     $('#addStudentModal').modal('close');

    $.post('/teacher/include/process.php?action=addStudent',
    {
      first_name: first,
      last_name: last
    },
    function(data,status){
      console.log(data);
      Materialize.toast(data, 4000, 'rounded red lighten-2');
      setTimeout(location.reload.bind(location), 2500);
    })
    return false;

});




// Cancel button inside delete student modal
$('a.cancel-button').click(function(event){
  event.preventDefault();
  document.getElementById('student_id_goes_here').innerHTML = 'No changes have been made to student';
  Materialize.toast('No changes made', 4000, 'rounded blue lighten-2')
})

// Agreee button inside Delete Student modal
$('a.agree-button').click(function(){
  $('#modal1').modal('close');
    student = document.getElementById('modal_student_id');
    id = $(student).val();
    var student_id = "student_id="+id;
    $.post('/teacher/include/process.php?action=deleteStudent','student_id='+id);
    console.log(id);
    Materialize.toast(response, 'rounded red lighten-2');
    setTimeout(location.reload.bind(location), 2500);
})
