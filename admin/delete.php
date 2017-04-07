<?PHP

$dbh=mysql_connect ("localhost", "updater", "Eddy1010") or die ('I cannot connect to the database because: ' . mysql_error());

mysql_select_db ("updater2");

if ($_REQUEST["deleteconf"]) :

$id = mysql_real_escape_string($_REQUEST["id"]);

$sql = mysql_query("DELETE FROM `students` WHERE `ID` = '" . $id . "' LIMIT 1") or die ("Could not delete student");



?>



<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<META HTTP-EQUIV="Refresh"

      CONTENT="5; URL=index.php">

<title>Hilger Higher Learning</title>

</head>



<body topmargin="0" leftmargin="0" bgcolor="#FFFFFF" marginwidth="0" marginheight="0" link="#000080" vlink="#000080" alink="#000080">



<table border="0" width="700" cellspacing="0" cellpadding="0">

  <tr> 

    <td width="100%"><div align="center"><font size="5" face="Garamond"></font></div></td>

  </tr>

  <tr> 

    <td width="100%" bgcolor="#FFFF00"> 

      <p align="right"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong><strong> 

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

          <td><font size="4" face="Garamond"><strong> Administrator: <em>Success</em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><p><br>

              You have successfully deleted all records for this student.<br>

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











<?PHP elseIf ($_REQUEST["delete"]) :
$id = mysql_real_escape_string($_REQUEST["id"]);

  $result = mysql_query("SELECT * FROM `students` WHERE ID = '" . $id . "'")

      or die("Couldn't execute query");

    $line = mysql_fetch_array($result);

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

          <td><font size="4" face="Garamond"><strong> Administrator: <em>Student 

            Deletion Confirmation</em></strong></font></td>

        </tr>

    <tr><td></td><td><strong><em>Delete: <?PHP print "$line[LASTNAME], $line[FIRSTNAME]";?>?</em></strong></td></tr>



        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><font size="3" face="Garamond"><br>

            By selecting the "DELETE" button below you will DELETE the student.<br>

            If you wish not to delete this student, please select the "NO" button below.</font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td> <p><br>

            </p>

            </td>

        </tr>

        <tr>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="220"><form name="form1" method="post" action="<?PHP print $PHP_SELF ;?>">

                <input type="hidden" name="id" value="<?PHP print  $id ;?>">    

    	<input type="submit" name="deleteconf" value="DELETE">

                  </form></td>

                <td> <form><input type="button" value="NO" onClick="history.back()"></form></td>

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





<?PHP else: ?>

<html>





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

      <p align="right"><strong><img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="25" HEIGHT="10"></strong><strong> 

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

          <td><font size="4" face="Garamond"><strong> Administrator: <em>Delete 

            a Student</em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td>



<form name="studentselect" method="post" action="<?PHP print $PHP_SELF;?>">

              <select name="id">

                <option selected><font size="3"face="Garamond">Choose a Student </font></option>

<?PHP

$result = mysql_query("Select * from `students`");

 while ($line  = mysql_fetch_array($result)) {

    $firstname = mysql_real_escape_string($line['FIRSTNAME']);

    $lastname  = mysql_real_escape_string($line['LASTNAME']);

    $id        = mysql_real_escape_string($line['ID']);

    print "<option value='" . $id . "'>" . $lastname . ", " . $firstname . "</option>";

  };

?>

              </select>

<input type="submit" name="delete" value="Remove Student" />



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



<?PHP endif;?>
