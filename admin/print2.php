<?PHP

$dbh=mysql_connect ("updater.db.6526174.hostedresource.com", "updater", "Eddy1010") or die ('I cannot connect to the database because: ' . mysql_error());

mysql_select_db ("updater");

?>

<?PHP if ($_REQUEST["view"]) : 
$view = $_REQUEST["view"];
$resultnum = $_REQUEST["resultnum"];
$result = mysql_query("SELECT * from `students` LIMIT $resultnum,1")
      or die("Error");
    $line = mysql_fetch_array($result);
?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Hilger Higher Learning</title>
</head>

<body topmargin="0" leftmargin="0" bg color="#FFFFFF" marginwidth="0" maginheight="0" link="#000080" vlink="#000080" alink="#000080">

<table border="0" width="550" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="100%" colspan="2"><div align="center"><font size="5" face="Garamond"></font></div></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF"><p align="center"><img src="../images/grade_print_logo.jpg" width="193" height="173"></p>
      </td>
    <td bgcolor="#FFFFFF"><div align="center"><strong><font face="Garamond">Hilger 
      Higher Learning Report Card<br>
      </font></strong><font face="Garamond"><br>
      Hilger Higher Learning, Inc. <br>
        1121 Mountain Terrace <br>
        Lookout Mountain, GA 30750 <br>
    www.hhlearning.com</font></div></td>
  </tr>
</table>

<table border="0" width="550" cellspacing="0" cellpadding="5">
  <tr>
    <td width="100%"> <p>&nbsp;</p>
      <p><strong><b><?PHP print "$line[FIRSTNAME] $line[LASTNAME]";?></b></strong> has 
        received the following letter grade(s) for one semester of class(es) administered 
        by Hilger Higher Learning, Inc. All instructors contracted by Hilger Higher 
        Learning meet proper Certification and/or requirement standards as directed 
        by Tennessee, Georgia, and Alabama state law. Each semester of class is 
        worth &frac12; credit.</p>
      <p><strong>Course: <?PHP print"$line[C1COURSE]";?> <br>
        Grade: <?PHP print"$line[C1GRADE]";?> <br>
        Instructor: <?PHP print"$line[C1TEACHER]";?> </strong></p>
      <p><table width=550><tr><td><?PHP print"$line[C1FEEDBACK]";?></td></tr></table></p>

<?PHP if ($line[C2COURSE] != NULL) :?>
      <hr><p><strong>Course: <?PHP print"$line[C2COURSE]";?> <br>
        Grade: <?PHP print"$line[C2GRADE]";?> <br>
        Instructor: <?PHP print"$line[C2TEACHER]";?> </strong></p>
      <p><table width=550><tr><td><?PHP print"$line[C2FEEDBACK]";?></td></tr></table></p>
<?PHP endif;?>

<?PHP if ($line[C3COURSE] != NULL) :?>
      <hr><p><strong>Course: <?PHP print"$line[C3COURSE]";?> <br>
        Grade: <?PHP print"$line[C3GRADE]";?> <br>
        Instructor: <?PHP print"$line[C3TEACHER]";?> </strong></p>
      <p><table width=550><tr><td><?PHP print"$line[C3FEEDBACK]";?></td></tr></table></p>
<?PHP endif;?>

<?PHP if ($line[C4COURSE] != NULL) :?>
      <hr><p><strong>Course: <?PHP print"$line[C4COURSE]";?> <br>
        Grade: <?PHP print"$line[C4GRADE]";?> <br>
        Instructor: <?PHP print"$line[C4TEACHER]";?> </strong></p>
      <p><table width=550><tr><td><?PHP print"$line[C4FEEDBACK]";?></td></tr></table></p>
<?PHP endif;?>

<?PHP if ($line[C5COURSE] != NULL) :?>
      <hr><p><strong>Course: <?PHP print"$line[C5COURSE]";?> <br>
        Grade: <?PHP print"$line[C5GRADE]";?> <br>
        Instructor: <?PHP print"$line[C5TEACHER]";?> </strong></p>
      <p><table width=550><tr><td><?PHP print"$line[C5FEEDBACK]";?></td></tr></table></p>
<?PHP endif;?>

<?PHP if ($line[C6COURSE] != NULL) :?>
      <hr><p><strong>Course: <?PHP print"$line[C6COURSE]";?> <br>
        Grade: <?PHP print"$line[C6GRADE]";?> <br>
        Instructor: <?PHP print"$line[C6TEACHER]";?> </strong></p>
      <p><table width=550><tr><td><?PHP print"$line[C6FEEDBACK]";?></td></tr></table></p>
<?PHP endif;?>

<?PHP if ($line[C7COURSE] != NULL) :?>
      <hr><p><strong>Course: <?PHP print"$line[C7COURSE]";?> <br>
        Grade: <?PHP print"$line[C7GRADE]";?> <br>
        Instructor: <?PHP print"$line[C7TEACHER]";?> </strong></p>
      <p><table width=550><tr><td><?PHP print"$line[C7FEEDBACK]";?></td></tr></table></p>
<?PHP endif;?>

      <p><strong><br>
        <br>
        </strong><font face="Garamond">
<table><tr><td width=200 align=left>
<?PHP 
 if ($resultnum >0) :
$lastnum = $resultnum-1;
  print "<form name=form1 method=post action=$PHP_SELF>
	<input type=hidden name=maxnum value=$maxnum>
	<input type=hidden name=resultnum value=$lastnum>
	<input type=image src=trans.gif alt=\"Previous\">
	<input type=hidden name=view value=Previous>
	</form>
";
endif;
?>
</td><td width=200 align=center>

<A HREF="javascript:window.print()">Hilger Higher Learning</A>

</td><td width=200 align=right>

<?PHP 
 if ($resultnum<$maxnum-1) :
$nextnum = $resultnum+1;
  print "<form name=form1 method=post action=$PHP_SELF>
	<input type=hidden name=maxnum value=$maxnum>
	<input type=hidden name=resultnum value=$nextnum>
	<input type=image src=trans1.gif alt=\"Next\">
	<input type=hidden name=view value=Next>
	</form>";
endif;
?>
</td></tr></table>
<br>
        <strong><br>
        </strong></font></p>
      </td>
  </tr>
</table>


</body>
</html>





<?PHP else :?>
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

<body topmargin="0" leftmargin="0" bg color="#FFFFFF" marginwidth="0" maginheight="0" link="#000080" vlink="#000080" alink="#000080">

<table border="0" width="400" cellspacing="0" cellpadding="0">
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
          <td><font size="4" face="Garamond"><strong> Administrator: <em>Print 
            a Grade Sheet</em></strong></font></td>
        </tr>
        <tr> 
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td><form name="form1" method="post" action="<?PHP print "$PHP_SELF";?>">
              <select name="resultnum">
                <option selected><font size="3"face="Garamond">Choose a Student </font></option>
<?PHP
$result = mysql_query("select * from `students`");
    $resultnum = -1;
    $maxnum = mysql_num_rows($result);
 while ($line = mysql_fetch_array($result)) {
    $resultnum++;
    $firstname = $line[FIRSTNAME];
    $lastname = $line[LASTNAME];
    print "<option value='$resultnum'>$lastname, $firstname</option>";
  };
?> 

              </select><br>
	    <input type="hidden" name="maxnum" value="<?PHP print"$maxnum";?>">
            <input type="submit" name="view" value="Submit">
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
    <td width="100%"><font face="arial, helvetica" color="#000000"><small><small><small>© 
      2006</small></small></small> <small><small><small><a href="http://www.studio13web.com" target="new">Studio13</a></small></small></small></font></td>
  </tr>
</table>
</body>
</html>
<?PHP endif; ?>