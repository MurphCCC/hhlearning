<?PHP

$dbh=mysql_connect ("localhost", "updater", "Eddy1010") or die ('I cannot connect to the database because: ' . mysql_error());

mysql_select_db ("updater2");


if ($_REQUEST["add"]) :
    $lastname  = mysql_real_escape_string($_REQUEST["lastname"]);
	$firstname = mysql_real_escape_string($_REQUEST["firstname"]);

	$error_message = null;
	
	if (!$lastname || !$firstname) {
		$error_message = 'Please enter a first and last name';
	} 
	
	else {
		$query = mysql_query("SELECT * FROM `students` WHERE LASTNAME LIKE '" . $lastname . "' AND FIRSTNAME LIKE '" . $firstname . "'");

		$numrs = mysql_num_rows($query);
		
		if ($numrs == 1) {
			$error_message = "You have entered a name that is currently in the database. " . 
							 "You must add a middle initial to the end of the first name to create a new student entry.";
		}
	}
	
    //If the student's name already exists in the database
	if ($error_message) :

?>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Hilger Higher Learning</title>

</head>



<body topmargin="0" leftmargin="0" bg color="#FFFFFF" marginwidth="0" marginheight="0" link="#000080" vlink="#000080" alink="#000080">



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

          <td bgcolor="#FF0000"><font size="4" face="Garamond"><strong> <img src="/images/trans.gif" alt="trans.gif (45 bytes)" WIDTH="5" HEIGHT="5">Administrator: 

            <em>Add a Student </em><font size="5" face="Arial, Helvetica, sans-serif"> 

            FAILURE</font></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><font size="3" face="Garamond"><br>

            <?php print $error_message; ?><br><br>

            </font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td> <p> <form><input type="button" value="CHANGE" onClick="history.back()"></form><br>

            </p>

            </td>

        </tr>

        <tr>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr> 

                <td width="220">&nbsp;</td>

                <td>&nbsp;</td>

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



<?PHP



else :



 $result = MYSQL_QUERY("INSERT INTO `students` (`LASTNAME`, `FIRSTNAME`) VALUES ('" . $lastname . "', '" . $firstname . "')") or die ("Could not Add Student");

    $sql = MYSQL_QUERY("ALTER TABLE `students` ORDER BY `LASTNAME`") or die ("Could not sort Students");

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

              You have successfully Added a Student to the database.<br>

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


<?PHP

endif;

else: 
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

          <td><font size="4" face="Garamond"><strong> Administrator: <em>Add a 

            Student</em></strong></font></td>

        </tr>

        <tr> 

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td bgcolor="#FFFFFF">&nbsp;</td>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr> 

                <td valign="top"width="80">Last Name</td>

                <td><form name="form1" method="post" action="<?PHP print $PHP_SELF;?>">

                    <input type="text" name="lastname">

                  </td>

              </tr>

              <tr>

                <td valign="top"width="80">First Name</td>

                <td>

                    <input type="text" name="firstname">

                 </td>

              </tr>

            </table>

              <input type="submit" name="add" value="Submit">

            </form>

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

<?PHP endif; ?>
