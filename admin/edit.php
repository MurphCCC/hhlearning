<?PHP

$dbh=mysql_connect ("localhost", "updater", "Eddy1010") or die ('I cannot connect to the database because: ' . mysql_error());

mysql_select_db ("updater2");

If ($_REQUEST["accepted"]) :

$id = mysql_real_escape_string($_REQUEST["id"]);

$c1teacher  = stripslashes($_REQUEST["c1teacher"]);
$c1course   = stripslashes($_REQUEST["c1course"]);
$c1grade    = stripslashes($_REQUEST["c1grade"]);
$c1feedback = stripslashes($_REQUEST["c1feedback"]);

$c2teacher  = stripslashes($_REQUEST["c2teacher"]);
$c2course   = stripslashes($_REQUEST["c2course"]);
$c2grade    = stripslashes($_REQUEST["c2grade"]);
$c2feedback = stripslashes($_REQUEST["c2feedback"]);

$c3teacher  = stripslashes($_REQUEST["c3teacher"]);
$c3course   = stripslashes($_REQUEST["c3course"]);
$c3grade    = stripslashes($_REQUEST["c3grade"]);
$c3feedback = stripslashes($_REQUEST["c3feedback"]);

$c4teacher  = stripslashes($_REQUEST["c4teacher"]);
$c4course   = stripslashes($_REQUEST["c4course"]);
$c4grade    = stripslashes($_REQUEST["c4grade"]);
$c4feedback = stripslashes($_REQUEST["c4feedback"]);

$c5teacher  = stripslashes($_REQUEST["c5teacher"]);
$c5course   = stripslashes($_REQUEST["c5course"]);
$c5grade    = stripslashes($_REQUEST["c5grade"]);
$c5feedback = stripslashes($_REQUEST["c5feedback"]);

$c6teacher  = stripslashes($_REQUEST["c6teacher"]);
$c6course   = stripslashes($_REQUEST["c6course"]);
$c6grade    = stripslashes($_REQUEST["c6grade"]);
$c6feedback = stripslashes($_REQUEST["c6feedback"]);

$c7teacher  = stripslashes($_REQUEST["c7teacher"]);
$c7course   = stripslashes($_REQUEST["c7course"]);
$c7grade    = stripslashes($_REQUEST["c7grade"]);
$c7feedback = stripslashes($_REQUEST["c7feedback"]);

$c1teacher  = mysql_real_escape_string($c1teacher);
$c1course   = mysql_real_escape_string($c1course);
$c1grade    = mysql_real_escape_string($c1grade);
$c1feedback = mysql_real_escape_string($c1feedback);

$c2teacher  = mysql_real_escape_string($c2teacher);
$c2course   = mysql_real_escape_string($c2course);
$c2grade    = mysql_real_escape_string($c2grade);
$c2feedback = mysql_real_escape_string($c2feedback);

$c3teacher  = mysql_real_escape_string($c3teacher);
$c3course   = mysql_real_escape_string($c3course);
$c3grade    = mysql_real_escape_string($c3grade);
$c3feedback = mysql_real_escape_string($c3feedback);

$c4teacher  = mysql_real_escape_string($c4teacher);
$c4course   = mysql_real_escape_string($c4course);
$c4grade    = mysql_real_escape_string($c4grade);
$c4feedback = mysql_real_escape_string($c4feedback);

$c5teacher  = mysql_real_escape_string($c5teacher);
$c5course   = mysql_real_escape_string($c5course);
$c5grade    = mysql_real_escape_string($c5grade);
$c5feedback = mysql_real_escape_string($c5feedback);

$c6teacher  = mysql_real_escape_string($c6teacher);
$c6course   = mysql_real_escape_string($c6course);
$c6grade    = mysql_real_escape_string($c6grade);
$c6feedback = mysql_real_escape_string($c6feedback);

$c7teacher  = mysql_real_escape_string($c7teacher);
$c7course   = mysql_real_escape_string($c7course);
$c7grade    = mysql_real_escape_string($c7grade);
$c7feedback = mysql_real_escape_string($c7feedback);



 $result = mysql_query("UPDATE `students` SET `C1TEACHER` = \"$c1teacher\", `C1COURSE` = \"$c1course\", `C1GRADE` = \"$c1grade\", `C1FEEDBACK` = \"$c1feedback\" WHERE `ID` = '". $id . "'") 

      or die("Couldn't update student's Class 1 Record.");



 $result = mysql_query("SELECT * FROM `students` WHERE ID = '" . $id . "'")

      or die("Couldn't execute query");

    $line = mysql_fetch_array($result);



if ($line['C2COURSE'] != NUll) :

 $result = mysql_query("UPDATE `students` SET `C2TEACHER` = \"$c2teacher\", `C2COURSE` = \"$c2course\", `C2GRADE` = \"$c2grade\", `C2FEEDBACK` = \"$c2feedback\" WHERE `ID` = '" . $id . "'") 

      or die("Couldn't update student's Class 2 Record.");

endif;



if ($line['C3COURSE'] != NUll) :

 $result = mysql_query("UPDATE `students` SET `C3TEACHER` = \"$c3teacher\", `C3COURSE` = \"$c3course\", `C3GRADE` = \"$c3grade\", `C3FEEDBACK` = \"$c3feedback\" WHERE `ID` = '" . $id . "'") 

      or die("Couldn't update student's Class 3 Record.");

endif;



if ($line['C4COURSE'] != NUll) :

 $result = mysql_query("UPDATE `students` SET `C4TEACHER` = \"$c4teacher\", `C4COURSE` = \"$c4course\", `C4GRADE` = \"$c4grade\", `C4FEEDBACK` = \"$c4feedback\" WHERE `ID` = '" . $id . "'") 

      or die("Couldn't update student's Class 4 Record.");

endif;



if ($line['C5COURSE'] != NUll) :

 $result = mysql_query("UPDATE `students` SET `C5TEACHER` = \"$c5teacher\", `C5COURSE` = \"$c5course\", `C5GRADE` = \"$c5grade\", `C5FEEDBACK` = \"$c5feedback\" WHERE `ID` = '" . $id . "'") 

      or die("Couldn't update student's Class 5 Record.");

endif;



if ($line['C6COURSE'] != NUll) :

 $result = mysql_query("UPDATE `students` SET `C6TEACHER` = \"$c6teacher\", `C6COURSE` = \"$c6course\", `C6GRADE` = \"$c6grade\", `C6FEEDBACK` = \"$c6feedback\" WHERE `ID` = '" . $id . "'") 

      or die("Couldn't update student's Class 6 Record.");

endif;



if ($line['C7COURSE'] != NUll) :

 $result = mysql_query("UPDATE `students` SET `C7TEACHER` = \"$c7teacher\", `C7COURSE` = \"$c7course\", `C7GRADE` = \"$c7grade\", `C7FEEDBACK` = \"$c7feedback\" WHERE `ID` = '" . $id . "'") 

      or die("Couldn't update student's Class 7 Record.");

endif;

?>



<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<META HTTP-EQUIV="Refresh"

      CONTENT="5; URL=index.php">

<title>Hilger Higher Learning</title>

</head>



<body topmargin="0" leftmargin="0" bg color="#FFFFFF" marginwidth="0" marginheight="0" link="#000080" vlink="#000080" alink="#000080">



<table border="0" width="700" cellspacing="0" cellpadding="0">

  <tr> 

    <td width="100%"><div align="center"><font size="5" face="Garamond"></font></div></td>

  </tr>

  <tr> 

    <td width="100%" bgcolor="#FFFF00"> 

      <p align="right"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong><strong> 

        </strong></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFFFF"><div align="center"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"><font size="5" face="Garamond"><strong>Online 

        Grade Card</strong></font></strong></div></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFF00"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="15"></strong></td>

  </tr>

</table>



<table border="0" width="700" cellspacing="0" cellpadding="5">

  <tr>

    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td bgcolor="#FFFFFF"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"></strong></td>

          <td><font size="4" face="Garamond"><strong> Administrator: <em>Success</em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><p><br>

              You have successfully Edited the Grade Sheet.<br>

              You will be redirected to the Administrator page in 5 seconds.</p>

            </td>

        </tr>

        <tr>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td>

<p>&nbsp;</p>

            </td>

        </tr>

      </table>

      <p><strong><br>

        <br>

        </strong><font face="Garamond"><br>

        <strong><br>

        </strong></font></p>

      </td>

  </tr>

</table>



<table border="0" width="100%" cellspacing="3" cellpadding="3">

  <tr>

    <td width="100%"><font face="arial, helvetica" color="#000000"><small><small><small>&copy;

      2006</small></small></small> <small><small><small><a href="http://www.studio13web.com" target="new">Studio13</a></small></small></small></font></td>

  </tr>

</table>

</body>

</html>


<?PHP elseIf ($_REQUEST["confirm"]) :

$id = $_REQUEST["id"];

 $result = mysql_query("SELECT * FROM `students` WHERE ID = '" . $id . "'")

      or die("Couldn't execute query");

    $line = mysql_fetch_array($result);

$c1teacher  = stripslashes($_REQUEST["c1teacher"]);
$c1course   = stripslashes($_REQUEST["c1course"]);
$c1grade    = stripslashes($_REQUEST["c1grade"]);
$c1feedback = stripslashes($_REQUEST["c1feedback"]);

$c2teacher  = stripslashes($_REQUEST["c2teacher"]);
$c2course   = stripslashes($_REQUEST["c2course"]);
$c2grade    = stripslashes($_REQUEST["c2grade"]);
$c2feedback = stripslashes($_REQUEST["c2feedback"]);

$c3teacher  = stripslashes($_REQUEST["c3teacher"]);
$c3course   = stripslashes($_REQUEST["c3course"]);
$c3grade    = stripslashes($_REQUEST["c3grade"]);
$c3feedback = stripslashes($_REQUEST["c3feedback"]);

$c4teacher  = stripslashes($_REQUEST["c4teacher"]);
$c4course   = stripslashes($_REQUEST["c4course"]);
$c4grade    = stripslashes($_REQUEST["c4grade"]);
$c4feedback = stripslashes($_REQUEST["c4feedback"]);

$c5teacher  = stripslashes($_REQUEST["c5teacher"]);
$c5course   = stripslashes($_REQUEST["c5course"]);
$c5grade    = stripslashes($_REQUEST["c5grade"]);
$c5feedback = stripslashes($_REQUEST["c5feedback"]);

$c6teacher  = stripslashes($_REQUEST["c6teacher"]);
$c6course   = stripslashes($_REQUEST["c6course"]);
$c6grade    = stripslashes($_REQUEST["c6grade"]);
$c6feedback = stripslashes($_REQUEST["c6feedback"]);

$c7teacher  = stripslashes($_REQUEST["c7teacher"]);
$c7course   = stripslashes($_REQUEST["c7course"]);
$c7grade    = stripslashes($_REQUEST["c7grade"]);
$c7feedback = stripslashes($_REQUEST["c7feedback"]);
    
    
$c1teacher  = htmlspecialchars($c1teacher, ENT_QUOTES);
$c1course   = htmlspecialchars($c1course, ENT_QUOTES);
$c1grade    = htmlspecialchars($c1grade, ENT_QUOTES);
$c1feedback = htmlspecialchars($c1feedback, ENT_QUOTES);

$c2teacher  = htmlspecialchars($c2teacher, ENT_QUOTES);
$c2course   = htmlspecialchars($c2course, ENT_QUOTES);
$c2grade    = htmlspecialchars($c2grade, ENT_QUOTES);
$c2feedback = htmlspecialchars($c2feedback, ENT_QUOTES);

$c3teacher  = htmlspecialchars($c3teacher, ENT_QUOTES);
$c3course   = htmlspecialchars($c3course, ENT_QUOTES);
$c3grade    = htmlspecialchars($c3grade, ENT_QUOTES);
$c3feedback = htmlspecialchars($c3feedback, ENT_QUOTES);

$c4teacher  = htmlspecialchars($c4teacher, ENT_QUOTES);
$c4course   = htmlspecialchars($c4course, ENT_QUOTES);
$c4grade    = htmlspecialchars($c4grade, ENT_QUOTES);
$c4feedback = htmlspecialchars($c4feedback, ENT_QUOTES);

$c5teacher  = htmlspecialchars($c5teacher, ENT_QUOTES);
$c5course   = htmlspecialchars($c5course, ENT_QUOTES);
$c5grade    = htmlspecialchars($c5grade, ENT_QUOTES);
$c5feedback = htmlspecialchars($c5feedback, ENT_QUOTES);

$c6teacher  = htmlspecialchars($c6teacher, ENT_QUOTES);
$c6course   = htmlspecialchars($c6course, ENT_QUOTES);
$c6grade    = htmlspecialchars($c6grade, ENT_QUOTES);
$c6feedback = htmlspecialchars($c6feedback, ENT_QUOTES);

$c7teacher  = htmlspecialchars($c7teacher, ENT_QUOTES);
$c7course   = htmlspecialchars($c7course, ENT_QUOTES);
$c7grade    = htmlspecialchars($c7grade, ENT_QUOTES);
$c7feedback = htmlspecialchars($c7feedback, ENT_QUOTES);

?>

<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Hilger Higher Learning</title>

</head>



<body topmargin="0" leftmargin="0" bgcolor="#FFFFFF" marginwidth="0" marginheight="0" link="#000080" vlink="#000080" alink="#000080">



<table border="0" width="700" cellspacing="0" cellpadding="0">

  <tr> 

    <td width="100%"><div align="center"><font size="5" face="Garamond"></font></div></td>

  </tr>

  <tr> 

    <td width="100%" bgcolor="#FFFF00"> <p align="right"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong><strong> 

        </strong></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFFFF"><div align="center"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"><font size="5" face="Garamond"><strong>Online 

        Grade Card</strong></font></strong></div></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFF00"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="15"></strong></td>

  </tr>

</table>



<table border="0" width="700" cellspacing="0" cellpadding="5">

  <tr>

    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td bgcolor="#FFFFFF"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"></strong></td>

          <td colspan=3><font size="4" face="Garamond"><strong> Administrator: <em>Confirm 

            your edited Grade Sheet</em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><b><font size="3" face="Garamond">

           <?PHP print $line['LASTNAME'] . ", " . $line['FIRSTNAME'];?>

            </font><br><br></td>

        </tr>


		 <tr><td></td><td valign="top"><b>Class 1</b></td></tr>
          <tr><td></td><td>Course:</td><td><?PHP print $c1course;?></td></tr>

<tr><td></td><td>Teacher:</td><td><?PHP print $c1teacher ;?></td></tr>

<tr><td></td><td>Grade:</td><td><?PHP print $c1grade ;?><br>

<tr><td></td><td valign="top">Feedback:</td><td><?PHP print $c1feedback ;?><br><br><hr><br></tr>



<?PHP 

if ($line['C2COURSE'] != NUll) :

?>
		<tr><td></td><td valign="top"><b>Class 2</b></td></tr>
          <tr><td></td><td>Course:</td><td><?PHP print $c2course ;?></td></tr>

<tr><td></td><td>Teacher:</td><td><?PHP print $c2teacher ;?></td></tr>

<tr><td></td><td>Grade:</td><td><?PHP print $c2grade ;?><br>

<tr><td></td><td valign="top">Feedback:</td><td><?PHP print $c2feedback ;?><br><br><hr><br></tr>

<?PHP 

endif;

if ($line['C3COURSE'] != NUll) :

?>


		<tr><td></td><td valign="top"><b>Class 3</b></td></tr>
          <tr><td></td><td>Course:</td><td><?PHP print $c3course ;?></td></tr>

<tr><td></td><td>Teacher:</td><td><?PHP print $c3teacher ;?></td></tr>

<tr><td></td><td>Grade:</td><td><?PHP print $c3grade ;?><br>

<tr><td></td><td valign="top">Feedback:</td><td><?PHP print $c3feedback ;?><br><br><hr><br></tr>

<?PHP 

endif;

if ($line['C4COURSE'] != NUll) :

?>


		<tr><td></td><td valign="top"><b>Class 4</b></td></tr>
          <tr><td></td><td>Course:</td><td><?PHP print $c4course ;?></td></tr>

<tr><td></td><td>Teacher:</td><td><?PHP print $c4teacher ;?></td></tr>

<tr><td></td><td>Grade:</td><td><?PHP print $c4grade ;?><br>

<tr><td></td><td valign="top">Feedback:</td><td><?PHP print $c4feedback ;?><br><br><hr><br></tr>

<?PHP 

endif;

if ($line['C5COURSE'] != NUll) :

?>
		<tr><td></td><td valign="top"><b>Class 5</b></td></tr>
          <tr><td></td><td>Course:</td><td><?PHP print $c5course ;?></td></tr>

<tr><td></td><td>Teacher:</td><td><?PHP print $c5teacher ;?></td></tr>

<tr><td></td><td>Grade:</td><td><?PHP print $c5grade ;?><br>

<tr><td></td><td valign="top">Feedback:</td><td><?PHP print $c5feedback ;?><br><br><hr><br></tr>

<?PHP 

endif;

if ($line['C6COURSE'] != NUll) :

?>
		<tr><td></td><td valign="top"><b>Class 6</b></td></tr>
          <tr><td></td><td>Course:</td><td><?PHP print $c61course;?></td></tr>

<tr><td></td><td>Teacher:</td><td><?PHP print $c6teacher;?></td></tr>

<tr><td></td><td>Grade:</td><td><?PHP print $c6grade;?><br>

<tr><td></td><td valign="top">Feedback:</td><td><?PHP print $c6feedback;?><br><br><hr><br></tr>

<?PHP 

endif;

if ($line['C7COURSE'] != NUll) :

?>
		<tr><td></td><td valign="top"><b>Class 7</b></td></tr>
          <tr><td></td><td>Course:</td><td><?PHP print $c7course;?></td></tr>

<tr><td></td><td>Teacher:</td><td><?PHP print $c7teacher;?></td></tr>

<tr><td></td><td>Grade:</td><td><?PHP print $c7grade;?><br>

<tr><td></td><td valign="top">Feedback:</td><td><?PHP print $c7feedback;?><br><br><hr><br></tr>

<?PHP endif; ?>

      





            </td>

        </tr></table><table>

        <tr><td width=150></td>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="170">

               <form name="form1" method="post" action="<?PHP print $PHP_SELF;?>" />

		<input type="hidden" name="c1teacher" value="<?PHP print $c1teacher;?>" />

		<input type="hidden" name="c1course" value="<?PHP print $c1course;?>" />

		<input type="hidden" name="c1grade" value="<?PHP print $c1grade;?>" />

		<input type="hidden" name="c1feedback" value="<?PHP print $c1feedback;?>" />



		<input type="hidden" name="c2teacher" value="<?PHP print $c2teacher;?>" />

		<input type="hidden" name="c2course" value="<?PHP print $c2course;?>" />

		<input type="hidden" name="c2grade" value="<?PHP print $c2grade;?>" />

		<input type="hidden" name="c2feedback" value="<?PHP print $c2feedback;?>" />



		<input type="hidden" name="c3teacher" value="<?PHP print $c3teacher;?>" />

		<input type="hidden" name="c3course" value="<?PHP print $c3course;?>" />

		<input type="hidden" name="c3grade" value="<?PHP print $c3grade;?>" />

		<input type="hidden" name="c3feedback" value="<?PHP print $c3feedback;?>" />



		<input type="hidden" name="c4teacher" value="<?PHP print $c4teacher;?>" />

		<input type="hidden" name="c4course" value="<?PHP print $c4course;?>" />

		<input type="hidden" name="c4grade" value="<?PHP print $c4grade;?>" />

		<input type="hidden" name="c4feedback" value="<?PHP print $c4feedback;?>" />



		<input type="hidden" name="c5teacher" value="<?PHP print $c5teacher;?>" />

		<input type="hidden" name="c5course" value="<?PHP print $c5course;?>" />

		<input type="hidden" name="c5grade" value="<?PHP print $c5grade;?>" />

		<input type="hidden" name="c5feedback" value="<?PHP print $c5feedback;?>" />



		<input type="hidden" name="c6teacher" value="<?PHP print $c6teacher;?>" />

		<input type="hidden" name="c6course" value="<?PHP print $c6course;?>" />

		<input type="hidden" name="c6grade" value="<?PHP print $c6grade;?>" />

		<input type="hidden" name="c6feedback" value="<?PHP print $c6feedback;?>" />



		<input type="hidden" name="c7teacher" value="<?PHP print $c7teacher;?>" />

		<input type="hidden" name="c7course" value="<?PHP print $c7course;?>" />

		<input type="hidden" name="c7grade" value="<?PHP print $c7grade;?>" />

		<input type="hidden" name="c7feedback" value="<?PHP print $c7feedback;?>" />

		<input type="hidden" name="id" value="<?PHP print $id ;?>" />

                    <input type="submit" name="accepted" value="ACCEPT" />

               </form></td>

                <td>

                    <form><input type="button" value="REJECT" onClick="history.back()"></form>

                  </td>

              </tr>

            </table></td>

        </tr>

      </table>

      <p><strong><br>

        <br>

        </strong><font face="Garamond"><br>

        <strong><br>

        </strong></font></p>

      </td>

  </tr>

</table>



<table border="0" width="100%" cellspacing="3" cellpadding="3">

  <tr>

    <td width="100%"><font face="arial, helvetica" color="#000000"><small><small><small>&copy;

      2006</small></small></small> <small><small><small><a href="http://www.studio13web.com" target="new">Studio13</a></small></small></small></font></td>

  </tr>

</table>

</body>

</html>







<?PHP elseIf ($_REQUEST["edit"]) : 
$id = mysql_real_escape_string($_REQUEST["id"]);

 $result = mysql_query("SELECT * FROM `students` WHERE ID = '" . $id . "'")

      or die("Couldn't execute query");

    $line = mysql_fetch_array($result);?>



<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Hilger Higher Learning</title>

</head>



<body topmargin="0" leftmargin="0" bgcolor="#FFFFFF" marginwidth="0" marginheight="0" link="#000080" vlink="#000080" alink="#000080">



<table border="0" width="700" cellspacing="0" cellpadding="0">

  <tr> 

    <td width="100%"><div align="center"><font size="5" face="Garamond"></font></div></td>

  </tr>

  <tr> 

    <td width="100%" bgcolor="#FFFF00"> <p align="right"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong><strong> 

        </strong></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFFFF"><div align="center"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"><font size="5" face="Garamond"><strong>Online 

        Grade Card</strong></font></strong></div></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFF00"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="15"></strong></td>

  </tr>

</table>



<table border="0" width="700" cellspacing="0" cellpadding="5">

  <tr>

    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td bgcolor="#FFFFFF"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"></strong></td>

          <td colspan=3><font size="4" face="Garamond"><strong> Administrator: <em>Edit 

            a Grade Sheet</em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><br><b><font size="3" face="Garamond">

	<?PHP print $line['LASTNAME']  . ", " . $line['FIRSTNAME'];?>

            </font><br><br></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td></tr>

          <td valign="top"> <form name="form1" method="post" action="<?PHP print $PHP_SELF ;?>">



<tr><td valign="top"><b>Class 1</b></td><td>Course:</td><td><input type="text" name="c1course" value="<?PHP print htmlspecialchars($line['C1COURSE'], ENT_QUOTES) ;?>"</td></tr>

<tr><td></td><td>Teacher:</td><td> <input type="text" name="c1teacher" value="<?PHP print htmlspecialchars($line['C1TEACHER'], ENT_QUOTES) ;?>"</td></tr>

<tr><td></td><td>Grade:</td><td><input type="text" name="c1grade" value="<?PHP print htmlspecialchars($line['C1GRADE'], ENT_QUOTES) ;?>"<br>

<tr><td></td><td valign="top">Feedback:</td><td><textarea name="c1feedback" cols=50 rows=4><?PHP print htmlspecialchars($line['C1FEEDBACK'], ENT_QUOTES) ;?></textarea><br><br><hr><br></tr>



<?PHP 

if ($line[C2COURSE] != NUll) :

?>

<tr><td valign="top"><b>Class 2</b></td><td>Course:</td><td><input type="text" name="c2course" value="<?PHP print htmlspecialchars($line['C2COURSE'], ENT_QUOTES) ;?>"</tr>

<tr><td></td><td>Teacher:</td><td><input type="text" name="c2teacher" value="<?PHP print htmlspecialchars($line['C2TEACHER'], ENT_QUOTES) ;?>"</tr>

<tr><td></td><td>Grade:</td><td><input type="text" name="c2grade" value="<?PHP print htmlspecialchars($line['C2GRADE'], ENT_QUOTES) ;?>"</tr>

<tr><td></td><td valign="top">Feedback:</td><td><textarea name="c2feedback" cols=50 rows=4><?PHP print htmlspecialchars($line['C2FEEDBACK'], ENT_QUOTES) ;?></textarea><br><br><hr><br></tr>

<?PHP 

endif;

if ($line[C3COURSE] != NUll) :

?>



<tr><td valign="top"><b>Class 3</b></td><td>Course:</td><td><input type="text" name="c3course" value="<?PHP print htmlspecialchars($line['C3COURSE'], ENT_QUOTES) ;?>"</td></tr>

<tr><td></td><td>Teacher:</td><td> <input type="text" name="c3teacher" value="<?PHP print htmlspecialchars($line['C3TEACHER'], ENT_QUOTES) ;?>"</td></tr>

<tr><td></td><td>Grade:</td><td><input type="text" name="c3grade" value="<?PHP print htmlspecialchars($line['C3GRADE'], ENT_QUOTES) ;?>"<br>

<tr><td></td><td valign="top">Feedback:</td><td><textarea name="c3feedback" cols=50 rows=4><?PHP print htmlspecialchars($line['C3FEEDBACK'], ENT_QUOTES) ;?></textarea><br><br><hr><br></tr>

<?PHP 

endif;

if ($line[C4COURSE] != NUll) :

?>



<tr><td valign="top"><b>Class 4</b></td><td>Course:</td><td><input type="text" name="c4course" value="<?PHP print htmlspecialchars($line['C4COURSE'], ENT_QUOTES);?>"</td></tr>

<tr><td></td><td>Teacher:</td><td> <input type="text" name="c4teacher" value="<?PHP print htmlspecialchars($line['C4TEACHER'], ENT_QUOTES);?>"</td></tr>

<tr><td></td><td>Grade:</td><td><input type="text" name="c4grade" value="<?PHP print htmlspecialchars($line['C4GRADE'], ENT_QUOTES) ;?>"<br>

<tr><td></td><td valign="top">Feedback:</td><td><textarea name="c4feedback" cols=50 rows=4><?PHP print htmlspecialchars($line['C4FEEDBACK'], ENT_QUOTES) ;?></textarea><br><br><hr><br></tr>

<?PHP 

endif;

if ($line[C5COURSE] != NUll) :

?>

<tr><td valign="top"><b>Class 5</b></td><td>Course:</td><td><input type="text" name="c5course" value="<?PHP print htmlspecialchars($line['C5COURSE'], ENT_QUOTES) ;?>"</td></tr>

<tr><td></td><td>Teacher:</td><td> <input type="text" name="c5teacher" value="<?PHP print htmlspecialchars($line['C5TEACHER'], ENT_QUOTES);?>"</td></tr>

<tr><td></td><td>Grade:</td><td><input type="text" name="c5grade" value="<?PHP print htmlspecialchars($line['C5GRADE'], ENT_QUOTES);?>"<br>

<tr><td></td><td valign="top">Feedback:</td><td><textarea name="c5feedback" cols=50 rows=4><?PHP print htmlspecialchars($line['C5FEEDBACK'], ENT_QUOTES);?></textarea><br><br><hr><br></tr>

<?PHP 

endif;

if ($line[C6COURSE] != NUll) :

?>

<tr><td valign="top"><b>Class 6</b></td><td>Course:</td><td><input type="text" name="c6course" value="<?PHP print htmlspecialchars($line['C6COURSE'], ENT_QUOTES);?>"</td></tr>

<tr><td></td><td>Teacher:</td><td> <input type="text" name="c6teacher" value="<?PHP print htmlspecialchars($line['C6TEACHER'], ENT_QUOTES);?>"</td></tr>

<tr><td></td><td>Grade:</td><td><input type="text" name="c6grade" value="<?PHP print htmlspecialchars($line['C6GRADE'], ENT_QUOTES);?>"<br>

<tr><td></td><td valign="top">Feedback:</td><td><textarea name="c6feedback" cols=50 rows=4><?PHP print htmlspecialchars($line['C6FEEDBACK'], ENT_QUOTES);?></textarea><br><br><hr><br></tr>

<?PHP 

endif;

if ($line[C7COURSE] != NUll) :

?>

<tr><td valign="top"><b>Class 7</b></td><td>Course:</td><td><input type="text" name="c7course" value="<?PHP print htmlspecialchars($line['C7COURSE'], ENT_QUOTES) ;?>"</td></tr>

<tr><td></td><td>Teacher:</td><td> <input type="text" name="c7teacher" value="<?PHP print htmlspecialchars($line['C7TEACHER'], ENT_QUOTES) ;?>"</td></tr>

<tr><td></td><td>Grade:</td><td><input type="text" name="c7grade" value="<?PHP print htmlspecialchars($line['C7GRADE'], ENT_QUOTES) ;?>"<br>

<tr><td></td><td valign="top">Feedback:</td><td><textarea name="c7feedback" cols=50 rows=4><?PHP print htmlspecialchars($line['C7FEEDBACK'], ENT_QUOTES) ;?></textarea><br><br><hr><br></tr>

<?PHP endif; ?>

           

        <tr>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td>

	      

             <input type="hidden" name="id" value="<?PHP print $line['ID'] ;?>">

              <input type="submit" name="confirm" value="Submit">

            </form></td>

        </tr>

      </table>

      <p><strong><br>

        <br>

        </strong><font face="Garamond"><br>

        <strong><br>

        </strong></font></p>

      </td>

  </tr>

</table>



<table border="0" width="100%" cellspacing="3" cellpadding="3">

  <tr>

    <td width="100%"><font face="arial, helvetica" color="#000000"><small><small><small>&copy;

      2006</small></small></small> <small><small><small><a href="http://www.studio13web.com" target="new">Studio13</a></small></small></small></font></td>

  </tr>

</table>

</body>

</html>









<?PHP else : ?>

<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Hilger Higher Learning</title>

<script language="JavaScript" type="text/JavaScript">

<!--

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

//-->

</script>

</head>



<body topmargin="0" leftmargin="0" bgcolor="#FFFFFF" marginwidth="0" marginheight="0" link="#000080" vlink="#000080" alink="#000080">



<table border="0" width="700" cellspacing="0" cellpadding="0">

  <tr> 

    <td width="100%"><div align="center"><font size="5" face="Garamond"></font></div></td>

  </tr>

  <tr> 

    <td width="100%" bgcolor="#FFFF00"> 

      <p align="right"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong><strong> 

        </strong></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFFFF"><div align="center"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"><font size="5" face="Garamond"><strong>Online 

        Grade Card</strong></font></strong></div></td>

  </tr>

  <tr> 

    <td bgcolor="#FFFF00"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="15"></strong></td>

  </tr>

</table>



<table border="0" width="700" cellspacing="0" cellpadding="5">

  <tr>

    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td bgcolor="#FFFFFF"><strong><img src="../images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="5"></strong></td>

          <td><font size="4" face="Garamond"><strong> Administrator: <em>Edit 

            a Grade Sheet</em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><form name="form1">

              <select name="id">

                <option selected><font size="3"face="Garamond">Choose a Student </font></option>

<?PHP

$result = mysql_query("select * from `students`");

 while ($line = mysql_fetch_array($result)) {

    $firstname = $line['FIRSTNAME'];

    $lastname = $line['LASTNAME'];

    $id = $line['ID'];

    print "<option value='" . $id ."'>" . $lastname . ", " . $firstname . "</option>";

  };

?>              

            </select>

      <input type=submit name="edit" value="Edit Student">

            </form>

            <font size="3" face="Garamond">&nbsp; </font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td> <p><br>

            </p>

            </td>

        </tr>

        <tr>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td></td>

        </tr>

      </table>

      <p><strong><br>

        <br>

        </strong><font face="Garamond"><br>

        <strong><br>

        </strong></font></p>

      </td>

  </tr>

</table>



<table border="0" width="100%" cellspacing="3" cellpadding="3">

  <tr>

    <td width="100%"><font face="arial, helvetica" color="#000000"><small><small><small>&copy;

      2006</small></small></small> <small><small><small><a href="http://www.studio13web.com" target="new">Studio13</a></small></small></small></font></td>

  </tr>

</table>

</body>

</html>



<?PHP endif; ?>

