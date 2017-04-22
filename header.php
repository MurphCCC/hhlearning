<?php

    require "login/loginheader.php";
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
<BASE href="http://hhlearning.com/teacher/">
    <meta charset="utf-8">
    <title>Hilger Higher Learning Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
          <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="css/materialize.min.css">
    
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/student.js"></script>



  <!-- Compiled and minified JavaScript -->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

          


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
    <style>
        #error-msg{ display:none }
        #success-msg{ display:none }

        form.blue.lighten-2.student {
        position: relative !important;
        width: 25% !important;
        height: 63px !important;
        left: 21vw !important;  
}
    </style>

<body>

  <nav>
    <div class="nav-wrapper blue lighten-1">
      <a href="/teacher" class="brand-logo">Hilger Higher Learning</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-light btn red rounded lighten-1" href="login/logout.php">Logout</a></li>
        <li><a class="btn green lighten-2" href="printAll.php" target="_blank">Print All Reports<i class="material-icons left">print</i></a></li>
      </ul>
      <div class="col sm-1">
      <?php 
        if($nav === 'hide') {

        } else { 
          echo '
            <form class="blue lighten-2 student">
                    <div class="input-field">

                      <input onkeyup="searchStudents()" id="search" type="search" required>
                      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                      <i class="material-icons">close</i>
                    </div>
                  </form>


      ';
      } ?>
      
      </div>
    </div>
  </nav>
    



    
<!-- /subnavbar -->
